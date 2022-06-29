<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welco   me/index
	 *	- or -d q 
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		// if($this->session->userdata('role') != 'admin' || $this->session->userdata('role') != 'company'){
		//     redirect(base_url());
		// }
	}
	public function index()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/index');
		$this->load->view('admin/template/footer');
	}

	public function job()
	{
		$userId = $this->session->userdata('id');
		$data['data'] = $this->db->get_where('job', ['publisher_id' => $userId])->result_array();
		$this->load->view('admin/template/header');
		$this->load->view('admin/job', $data);
		$this->load->view('admin/template/footer');
	}

	public function job_applicant()
	{
		$get = $this->input->get();

		$data['action_list'] = $this->db->get_where('applicant_progress')->result_array();

		$userId = $this->session->userdata('id');
		$data['data'] = $this->db->get_where('job', ['publisher_id' => $userId])->result_array();

		$data['applicants'] = array();
		$data['selectedJob'] = 0;

		if (!empty($get)) {
			$data['applicants'] = $this->db->get_where('job_apply', ['job_id' => $get['job_id'], 'is_removed' => 0])->result_array();

			foreach ($data['applicants'] as $key => $value) {
				$data['applicants'][$key]['user_detail'] = $this->db->get_where('user', ['id' => $data['applicants'][$key]['user_id']])->row_array();
			}

			$data['selectedJob'] = $get['job_id'];
		}


		$this->load->view('admin/template/header');
		$this->load->view('admin/job_applicant', $data);
		$this->load->view('admin/template/footer');
	}

	public function add_job()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/job_add');
		$this->load->view('admin/template/footer');
	}


	public function insertjob()
	{
		$post = $this->input->post();

		$this->form_validation->set_rules('title', 'Title', 'required|trim');
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
		$this->form_validation->set_rules('contact', 'Contact', 'required|trim');
		$this->form_validation->set_rules('salary', 'Salary', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->add_job();
		}

		$data = array(
			'title' => $post['title'],
			'description' => $post['description'],
			'contact'   => $post['contact'],
			'salary' => $post['salary'],
			'publisher_id'  => $this->session->userdata('id'),
		);

		$this->db->insert('job', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
		Congratulation! your job has been submitted.
		</div>');

		redirect(base_url('admin/add_job'));
	}
}
