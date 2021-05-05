



<?php



class Excel_export extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        if($_SESSION['user']['user_type'] != 1){
			redirect(base_url(), 'refresh');
		}
        $this->load->model('excel_export_model');

    }

    function index() {
        $data["employee_data"] = $this->excel_export_model->fetch_data(); 
        $this->load->view("excel_export_view", $data);
    }
    
    function action() {
        $this->load->model("excel_export_model");
        $this->load->library('excel');
        $object = new PHPExcel();
        $object->setActiveSheetIndex(0);

        $table_columns = array("Name", "Address", "Gender", "Designation", "Age");
        $column = 0;

        foreach($table_columns as $field){
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;

        }

        $employee_data = $this->excel_export_model->fetch_data();

        $excel_row = 2;
        foreach($employee_data as $row) {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->address);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->gender);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->designation);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->age);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="EmployeeData.xlsx"');
        $object_writer->save('php://output');
    
    }

    
}

?>