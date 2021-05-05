<?php

class Admin extends CI_Controller {
    public function __construct()   {
        parent::__construct();
        if($_SESSION['user']['user_type'] != 1){
			redirect(base_url(), 'refresh');
		}
        $this->load->database();
        $this->load->model('Admin_model');
    }
    public function index() {
        $result['data'] = $this->Admin_model->display_records();
        $this->load->view('admin', $result);
    }

    public function savedata() {
        if ($this->input->post('save')) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['phone'] = $this->input->post('phone');
            $data['token'] = $this->input->post('token');
            $email = $this->input->post('email');
            
            $result1 = $this->db->query("select * from user where email = '". $email ."' ");
            $row = $result1->num_rows(); 

            if ($row > 0) {
                $this->session->flashdata('message' , '<h3 style = "color:red">Email Already Exist..!</h3>');
            }else {
                $status = $this->Admin_model->saverecords($data); 
                if($status) {
                    $this->session->flashdata('message' , '<h3 style = "color:green">Add User Successfully..!</h3>');
                }else {
                    $this->session->flashdata('message' , '<h3 style = "color:red">Cannot Inserted Data..!</h3>');   
                }
            }
        }
        redirect(base_url('admin'), 'refresh');                                                                                                                                                                                                                                                                                                         
    }
    
    public function update() {
        
        if (isset($_POST)) {
            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');
            $data['phone'] = $this->input->post('phone');
            $data['user_type'] = $this->input->post('user_type');
            $data['id'] = $this->input->post('id');
            $result =  $this->Admin_model->update_records($data); 

            if ($result){
                $this->session->set_flashdata('message','<h3 style = "color:green">Recode updated Successfully</h3>');
            }else {
                    $this->session->set_flashdata('message','<h3 style = "color:red">Cannot updated data</h3>');
            }
        }
        redirect(base_url('admin'), 'refresh');
    }

    public function getEditdata($id) { 
        $result = $this->Admin_model->displayrecordsById($id);
        $this->load->view('admin', ['result' => $result]);
    }

    function deletedata1($id){
        // $id=$this->input->get('id');
        $result = $this->Admin_model->deleterecords($id);
        if ($result > 0) {
            $this->session->set_flashdata('message','<h3 style = "color:green">Recode Delete Successfully</h3>');
        }else { 
            $this->session->set_flashdata('message','<h3 style = "color:red">Cannot Delete Data!</h3>');
        }
        redirect(base_url('admin'), 'refresh');
    }

}


?>