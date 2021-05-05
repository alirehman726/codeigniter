
<?php 
//pom das
//resha antony
class Company extends CI_Controller {

    function index(){
        $this->load->view('company_view');
    }

    function fetch() {
            $output = '';
            $query = '';
            $this->load->model('company_model');
            if($this->input->post('query')) {

            $query = $this->input->post('query');
        }
        $data = $this->company_model->fetch_data($query);
        $output .= '
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                <th>Comoany Name</th>
                <th>Company Code</th>
                <th>Status</th>
                </tr>
        ';
        if($data->num_rows() > 0) {
            foreach($data->result() as $row) {
                $output .= '
                <tr>
                <td>'.$row->company_name.'</td>
                <td>'.$row->company_code.'</td>
                <td>'.$row->status.'</td>
                </tr>
                ';
            }
        }else {
            $output .= '<tr>
                <td colspan="5">No Data Found</td>
                </tr>';
        }
            $output .= '</table>';
            echo $output;
    }
}

