<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/userguide3/general/urls.html
     */
    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/index');
        $this->load->view('admin/template/footer');
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    private function validateLogin($email, $password){
        $is_user =  $this->db->get_where('user',['email' => $email])->row_array();

        if($is_user){
             if($is_user['password'] == md5($password)){
                 return $is_user;
             }else{
                 return 0;
             }
        }else{
            return 0;
        }
    }

    public function login_process()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->login();
        } else {
            $post = $this->input->post();

            $email = $post['email'];
            $password = $post['password'];

            $validate = $this->validateLogin($email, $password);

            if ($validate) {
                $data = [
                    'name'     => $validate['user_name'],
                    'email'     => $validate['user_email'],
                    'id'     => $validate['id'],
                    'role'  => $validate['role'],
                    'is_login'  => 1
                ];

                $this->session->set_userdata($data);
                redirect(base_url() . 'home');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email / Password is Wrong.
            </div>');
                redirect('auth/login');
            }
        }
    }

    public function registration()
    {
        $this->load->view('auth/register');
    }

    public function register_process()
    {
        $post = $this->input->post();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|matches[password2]');
        $this->form_validation->set_rules('password2', 'Re-Type Password', 'required|matches[password1]');
        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == false) {
            $this->registration();
        } else {
            $data = [
                'name' => $post['name'],
                'email' => $post['email'],
                'password' => md5($post['password1']),
                'role' => $post['role']
            ];

            print_r($data);

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
					Congratulation! you successfully register. Go Login!.
					</div>');

            redirect(base_url('auth/login'));
        }
    }
}