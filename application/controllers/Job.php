<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

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
		if ($this->session->userdata('is_login') != 1) {
			redirect(base_url().'auth/login');
		}
		
        if($this->session->userdata('role') == 'admin' || $this->session->userdata('role') == 'company'){
            redirect(base_url());
        } 
    }
	// public function index()
	// {
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/index');
	// 	$this->load->view('admin/template/footer');
	// }

    public function apply_job($job_id)
	{
        $userId = $this->session->userdata('id');
        $data = [
            'job_id' => $job_id,
            'user_id' => $userId,
			'status' => 'Pending Review',
        ];

        $this->db->insert('job_apply',$data);

        redirect(base_url() . 'home');
	}

	public function my_application()
	{
		$userId = $this->session->userdata('id');

		
        $this->db->select('*');
        $this->db->from('job_apply');
        $this->db->where('job_apply.user_id',$userId);
        // $this->db->join('job', 'job.id = job_apply.job_id');
        $query = $this->db->get();


        $data['data'] = $query->result_array();


		foreach ($data['data'] as $key => $value){
			$data['data'][$key]['job_detail'] = $this->db->get_where('job',['id' => $data['data'][$key]['job_id']])->row_array();
			$data['data'][$key]['employer'] = $this->db->get_where('user',['id' => $data['data'][$key]['job_detail']['publisher_id']])->row_array();
			
			if ($value['is_removed'] == 1 ){
				$data['data'][$key]['status'] = 'Did not Pass!';
			}
		}


		$this->load->view('template/header_view');
		$this->load->view('home/my_job',$data);
		$this->load->view('template/footer_view');
	}


	public function update_job_status()
	{
        $post = $this->input->post();

		print_r($post);
	}

 
}
