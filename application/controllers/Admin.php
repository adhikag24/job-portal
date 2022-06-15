<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
        if($this->session->userdata('role') != 'admin' || $this->session->userdata('role') != 'company'){
            redirect(base_url());
        }
    }
	public function index()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/index');
		$this->load->view('admin/template/footer');
	}

    public function job()
	{
		$this->load->view('admin/template/header');
		$this->load->view('admin/index');
		$this->load->view('admin/template/footer');
	}
 
}
