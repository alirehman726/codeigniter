

<?php

class Document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('document_model');
    }
    public function index()
    {
        $result = array();
        $result['data'] = $this->document_model->display_records();
        $this->load->view('document', $result);   
    }
    
    public function create()
    {
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 0;
        // $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('filename')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('document', $error);
        } else {
            $upload_data = $this->upload->data();
            
            $data = array('filename' => $upload_data['file_name'], 'doc_type' => $upload_data['file_type']);
            
            
            $this->document_model->insert($data);
            
            
            redirect('document');
        }
    }
    
    function deletedata1($id)
    {
        
        $result = $this->document_model->deleterecords($id);
        if ($result > 0) {
            $this->session->set_flashdata('message', '<h3 style = "color:green">Recode Delete Successfully</h3>');
        } else {
            $this->session->set_flashdata('message', '<h3 style = "color:red">Cannot Delete Data!</h3>');
        }
        redirect(base_url('document'), 'refresh');
    }
    
    
    function viewpdf($filename)
    {
        if (isset($_SESSION['document']) && $_SESSION['document']['doc_type'] == 1) {
            $file = $this->document_model->get_document($filename);
            
            $url = base_url() . 'uploads/' . $filename;
            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');
            @readfile($url);
        } else {
            echo 'pay for the payment';
        }
    }
    
    function exportpdf($id)
    {   
        $result = $this->document_model->get_document($id);
        $htmlContent = $this->load->view('document', $result, TRUE);
        $this->m_pdf->pdf->WriteHTML($htmlContent);
        $createPDFFile = time() . '.pdf';
        $this->m_pdf->pdf->Output($createPDFFile, 'D'); // 'D' for download, 'F' for save in root folder
    }
    
    
    function buy($id)
    {
        // Set variables for paypal form
        $returnURL = base_url() . 'document_paypal/success'; //payment success url
        $cancelURL = base_url() . 'document_paypal/cancel'; //payment cancel url                                                         
        
        // Get product data from the database
        $document_product = $this->document_model->display_records(['id' => $id ?? null]);
        
        // // Get current user ID from the session (optional) 
        // $userID = !empty($_SESSION['user']) ? $_SESSION['user']['id'] : 1;
        // $userID = $_SESSION['user']['id'];
        
        $userID = $this->session->userdata['user']['id']; 
        $demo = $this->db->get('document');
        $demo1 = $demo->result();
        $this->session->set_userdata('document', [
            'id' => $demo1[0]->id,
            'filename' => $demo1[0]->filename,
            'doc_type' => $demo1[0]->doc_type,
        ]);
        
        // pre($_SESSION); 
        
        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('item_name', $document_product[0]->filename);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number',  $document_product[0]->id);
        $this->paypal_lib->add_field('amount',  $document_product[0]->price);
        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }
}
?>
