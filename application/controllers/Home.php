<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

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
        $data['section'] = 'home';
        $userId = $this->session->userdata('id');

        $this->db->select('*');
        $this->db->from('job');
        // $this->db->join('user', 'user.id = job.publisher_id', 'right');
        $query = $this->db->get();

        $data['data'] = $query->result_array();

        foreach($data['data'] as $key => $value) {
            $data['data'][$key]['employer'] = $this->db->get_where('user',['id'=>$value['publisher_id']])->row_array();
         
            $check = $this->db->get_where('job_apply',['user_id'=>$userId,'job_id' => $value['id']])->row_array();
            $data['data'][$key]['applicant'] = $this->db->get_where('job_apply',['job_id' => $value['id']])->num_rows();
            if (!empty($check)) {
                $data['data'][$key]['is_applied'] = true;
            }else{
                $data['data'][$key]['is_applied'] = false;
            }
        }

   


        $this->load->view('template/header_view.php', $data);
        $this->load->view('home/home.php', $data);
        $this->load->view('template/footer_view.php');
    }
}
