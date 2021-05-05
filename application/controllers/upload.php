

<?php

class Upload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    

    public function index() {
        $this->load->view('upload_view'); 
    }

    public function do_upload() { 

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|png|jpeg';
        
        $this->load->library('upload',$config);

        if (! $this->upload->do_upload('customFile')) { 
            $this->session->set_flashdata('message', $this->upload->display_errors());  
        }else { 
            $this->session->set_flashdata('message', '<h3 style = "color:green">upload Successfully..!!</h3>');  
        }
        redirect(base_url('upload'));
    }


}


?>