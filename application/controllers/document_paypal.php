<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Document_paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        $this->load->library('paypal_lib');  
          
        $this->load->model('document_model');
          
        $this->load->model('payment'); 
     } 
      
    function success(){
        $paypalInfo = $this->input->post();     
        
        if(!empty($paypalInfo)) {    
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
            if($ipnCheck) {
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"])); 
                if(!$prevPayment) {
                    
                    $data['user_id']    = $paypalInfo["custom"]; 
                    $data['product_id']    = $paypalInfo["item_number"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 
                    
                    $insert = $this->payment->insertTransaction($data); 
                    
                    $que = $this->db->query("select * from document" );
                    $products = $que->result(); 
                    
                    $result = $this->db->query("select * from payments full join document on txn_id where txn_id = '".$paypalInfo["txn_id"]."' ");
                    $final = $result->result(); 
                    
                    $data = $this->document_model->doc_type();
                    if ($data == 0){ 
                        $update = $this->db->query('update document set doc_type = true');     
                    }  
                    
                    if ($final) {     
                        $this->load->view('paypal/document_success',['final' => $final ?? null]);
                    } 
                }
            }
        } 
    }
    function cancel(){  
        $this->load->view('paypal/document_cancel');
    }
}