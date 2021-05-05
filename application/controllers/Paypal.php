<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Paypal extends CI_Controller{ 
     
     function  __construct(){ 
        parent::__construct(); 
         
        
        $this->load->database(); 
        $this->load->library('paypal_lib');  
          
        $this->load->model('product'); 
          
        $this->load->model('payment'); 
     } 
      
    function success(){  

        // $paypalInfo = $this->input->get(); 
 

        $paypalInfo = $this->input->post();     
        
     
        if(!empty($paypalInfo)) {
            
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);
            if($ipnCheck) {
                $prevPayment = $this->payment->getPayment(array('txn_id' => $paypalInfo["txn_id"]));

                
                if(!$prevPayment) {
                    $data['user_id']    = $paypalInfo["quantity1"]; 
                    $data['product_id']    = $paypalInfo["item_number1"]; 
                    $data['txn_id']    = $paypalInfo["txn_id"]; 
                    $data['payment_gross']    = $paypalInfo["mc_gross"]; 
                    $data['currency_code']    = $paypalInfo["mc_currency"]; 
                    $data['payer_name']    = trim($paypalInfo["first_name"].' '.$paypalInfo["last_name"], ' '); 
                    $data['payer_email']    = $paypalInfo["payer_email"]; 
                    $data['status'] = $paypalInfo["payment_status"]; 

                   $insert = $this->payment->insertTransaction($data); 
                  
                   $que = $this->db->query("select * from products");
                   $products = $que->result(); 

                   $result = $this->db->query("select * from payments full join products on txn_id where txn_id = '".$paypalInfo["txn_id"]."' ");
                   $final = $result->result();

                   if ($final) {
                       $this->load->view('paypal/success', ['final' => $final ?? null]);
                    } 
                }
            }
        } 
    } 
    
    function cancel(){  
        $this->load->view('paypal/cancel');
    }
}
//    select * from payments full join products on txn_id where txn_id = '06P94192X74348117'