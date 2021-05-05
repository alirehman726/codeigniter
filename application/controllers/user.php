<?php
class User extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('Register_model');  
    }

    public function index() {
        $this->load->view('register');
        
        $i = 20;

        for($i=0;$i<50;$i++) {
            if (i / 2 == 0) {
                $i++;
            }
        }
    }
    
    public function sign_up() {
        $keySecret = '6LejkWUaAAAAAJj5n87cISU7ld2qWUYK2pinpNwr';
        $check = array(
            'secret'		=>	$keySecret,
            'response'		=>	$this->input->post('g-recaptcha-response')
        );

        $startProcess = curl_init();
        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

        curl_setopt($startProcess, CURLOPT_POST, true);

        curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));

        curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);

        $receiveData = curl_exec($startProcess);

        $finalResponse = json_decode($receiveData, true);

        if ($finalResponse['success']) {
            if ($this->input->post('save')) {    
                $this->form_validation->set_rules('name','Name', 'required');
                $this->form_validation->set_rules('email','Email', 'required');
                $this->form_validation->set_rules('password',' Password', 'required');
                $this->form_validation->set_rules('conf_password','Confirm Password', 'required|matches[password]');
                $this->form_validation->set_rules('phone','Phone', 'required');
                if($this->form_validation->run()) {
                    $data['name'] = $this->input->post('name');
                    $data['email'] = $this->input->post('email');
                    $data['password'] = $this->input->post('password');
                    $data['conf_password'] = $this->input->post('conf_password');
                    $data['phone'] = $this->input->post('phone');
                    $data['token'] = $this->input->post('token');
                    $email = $this->input->post('email');
                    $password = $this->input->post('passwprd');
                    $conf_password = $this->input->post('conf_passwprd');

                    $result=$this->db->query("select * from user where email='".$email."'");
                    $row = $result->num_rows();  
                    if ($row > 0) {
                        $this->session->set_flashdata('message', '<h3 style = "color:red">Email are Already Exist..!</h3>'); 
                    }else { 
                        $result = $this->Register_model->savedata($data);
                        redirect(base_url('admin'), 'refresh');
                        $this->session->set_flashdata('message', '<h3 style = "color:green">Your Account Created Successfully..!</h3>');     
                    }
                }else {
                    $this->session->set_flashdata('validation_error', $this->form_validation->error_array());
                    redirect(base_url('user'));
                }
            }
        }
        redirect(base_url('user'), 'refresh');
    }
    public function login() {
        if ($this->input->post('save1')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $result = $this->db->query("select * from user where email = '".$email."' and password = '".$password."'"); 
            $row = $result->num_rows();
            if ($row > 0) {
                
                $data = $result->result();
                $this->session->set_userdata('user', [
                    'id' => $data[0]->id,
                    'name'=> $data[0]->name,
                    'user_type'=> $data[0]->user_type
                ]);  
                redirect(base_url(), 'refresh');
                return;
            }else {
                $this->session->set_flashdata('message', '<h3 style = "color:red">Invalid Email and Password</h3>');
            }
        }
        $this->load->view('login'); 
    }
    
    public function forgot() {
        if ($this->input->post('save')) {
            $token = generateRandomString(10);
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            
            if ($this->form_validation->run()) { 
                $email = $this->input->post('email');
                $result=$this->db->query("select * from user where email='".$email."'");
                $row = $result->num_rows(); 
                
                if ($row > 0) {
                    $this->load->config('email');
                    $this->load->library('email');
                    $email = $this->input->post('email');
                    $que=$this->db->query("update user set token = '".$token."' where id = 38");    
                    $from = $this->config->item('smtp_user');
                    $to = $email;
                    $subject ='subject';
                    $message = "message <a href='".base_url('dashboard/change_password')."?token=".$token."&email=".$email."'>click here</a>";
                    
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    
                    if ($this->email->send()) {
                        $this->session->set_flashdata('message', '<h3 style = "color:green">Your Email has Successfully been sent..!!</h3>'); 
                        
                    } else {
                        $this->session->set_flashdata('message', '<h3 style = "color:red">Your Email Invalid..!!</h3>'); 
                        show_error($this->email->print_debugger());
                    }
                } else{
                    $this->session->set_flashdata('message', '<h3 style = "color:red">Your Email Not valid..!!</h3>'); 
                }
            } else{
                $this->session->set_flashdata('validation_error', $this->form_validation->error_array());
            }  
        }
        $this->load->view('forgot'); 
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('user/login'));
    }
} 
?>

 