<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jobcompany extends CI_Controller
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
        if ($this->session->userdata('is_login') != 1) {
            redirect(base_url() . 'auth/login');
        }
    }
    // public function index()
    // {
    // 	$this->load->view('admin/template/header');
    // 	$this->load->view('admin/index');
    // 	$this->load->view('admin/template/footer');
    // }


    public function update_job_status()
    {
        $post = $this->input->post();
        // print_r($post);

        $progressId = $post['progressId'];
        $userId = $post['userId'];

        $newStatus = $this->db->get_where('applicant_progress', ['id' => $progressId])->row_array()['description'];

        $data = array(
            'status' => $newStatus,
        );

        $this->db->where('user_id', $userId);
        $this->db->update('job_apply', $data);
    }

    public function delete_applicant()
    {
        $post = $this->input->post();
        $jobId = $post['jobId'];
        $userId = $post['userId'];

        $data = array(
            'is_removed' => 1,
        );

        $this->db->where('user_id', $userId);
        $this->db->where('job_id', $jobId);
        $this->db->update('job_apply', $data);
    }
}
