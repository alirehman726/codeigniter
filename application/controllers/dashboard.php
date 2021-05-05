<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function index() {
        $this->load->view('dashboard');
        
    }
    function change_password() {
        $this->load->view('change_password');
    }
    
    function change_pass_submit() { 
        $this->form_validation->set_rules('newpass','New Password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confpassword','Confirm Password', 'required|min_length[6]|max_length[20]');
        if ($this->form_validation->run()) {   
            $new_password = $this->input->post('newpass');
            $conf_password = $this->input->post('confpassword');
            $this->load->model('queries');
            $userid = $this->session->userdata['user']['id'];
            $passwd = $this->queries->getCurrPassword($userid);
            // pre($passwd);
            // exit(); 
                if ($new_password == $conf_password) {
                    if ($this->queries->updatePassword($new_password, $userid)) { 
                        $this->session->set_flashdata('message','<h3 style = "color:green">Password Update Successfullly...</h3>');
                        redirect(base_url('dashboard'));
                    }else {  
                        $this->session->set_flashdata('message','<h3 style = "color:red">Failed to Update Password...</h3>');
                    }
                }else { 
                    $this->session->set_flashdata('message','<h3 style = "color:red">New password & Confirm Password is not matching...</h3>');
                } 
            redirect(base_url('dashboard/change_password'));
        } else {
            $this->session->set_flashdata('validation_error', $this->form_validation->error_array());
            redirect(base_url('dashboard/change_password'));
        }
     
    }

}

?>

    


 