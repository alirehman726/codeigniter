

<?php

  
class Crud extends CI_Controller {

    public function __construct() {

        parent::__construct();
        
        $this->load->database();
        $this->load->model('Crud_model');
    }

    public function index() {
        $user_type = $this->input->post('user_type');
        $que = $this->db->query("select * from user where user_type = '".$user_type."' ");
        $row = $que->num_rows();
        if ($row > 0) {            
            $result['data'] = $this->Crud_model->display_records();
            $this->load->view('insert',$result);
            $this->load->view('change_password');
        }else {
            $this->load->view('');
        }
    }

    // Insert Data
    public function savedata() {
    
        if ($this->input->post('save')) {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email'); 
            $status = $this->Crud_model->saverecords($data);

            if ($status) {
                $this->session->set_flashdata('message','<h3 style = "color:green">Recode Inserted Successfully..!</h3>');
            }else {
                $this->session->set_flashdata('message','<h3 style = "color:red">Cannot insert data.</h3>');
            }
        }
        redirect(base_url(), 'refresh');
    } 
    
    public function updatedata() {
        
        if (isset($_POST)) {
            $data['first_name'] = $this->input->post('first_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['email'] = $this->input->post('email');
            $data['id'] = $this->input->post('id');
            $result =  $this->Crud_model->update_records($data);
            if ($result){
                $this->session->set_flashdata('message','<h3 style = "color:green">Recode updated Successfully</h3>');
            }else {
                    $this->session->set_flashdata('message','<h3 style = "color:red">Cannot updated data</h3>');
            }
            
        }
        redirect(base_url(), 'refresh');
    }

    public function getEditData($id){
        $result = $this->Crud_model->displayrecordsById($id); 
        $this->load->view('insert',['result' => $result]);  
    }
     

    function deletedata($id){
        // $id=$this->input->get('id');
        $result = $this->Crud_model->deleterecords($id);
        if ($result > 0) {
            $this->session->set_flashdata('message','<h3 style = "color:green">Recode Delete Successfully</h3>');
        }else { 
            $this->session->set_flashdata('message','<h3 style = "color:red">Cannot Delete Data!</h3>');
        }
        redirect(base_url(), 'refresh');
    }
}
?>