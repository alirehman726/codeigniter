

<?php
 

class Excel_import extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if($_SESSION['user']['user_type'] != 1){
			redirect(base_url(), 'refresh');
		}

		$this->load->model('excel_import_model');
		$this->load->library('excel');
	}

	function index()
	{
		$this->load->view('excel_import', ['data' =>  null]);
	}
	
	function fetch()
	{
		// pre($_FILES);
		if(isset($_FILES['file'])){

			$path = $_FILES["file"]["tmp_name"];
				$object = PHPExcel_IOFactory::load($path);
				foreach($object->getWorksheetIterator() as $worksheet)
				{
					$highestRow = $worksheet->getHighestRow();
					$highestColumn = $worksheet->getHighestColumn();
					for($row=2; $row<=$highestRow; $row++)
					{
						$customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$data[] = array(
							'CustomerName'		=>	$customer_name,
							'Address'			=>	$address,
							'City'				=>	$city,
							'PostalCode'		=>	$postal_code,
							'Country'			=>	$country
						);
					}
				} 
		}
			$this->load->view('excel_import', ['data' => $data ?? null]);
			return;
	}

	function import() {
		if(isset($_FILES["file"]["name"]))
		{
			$path = $_FILES["file"]["temp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row = 2; $row <= $highestRow; $row++)
				{
					$customer_name = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$city = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$postal_code = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$country = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$data = array(
						'CustomerName'		=>	$customer_name,
						'Address'			=>	$address,
						'City'				=>	$city,
						'PostalCode'		=>	$postal_code,
						'Country'			=>	$country
					);
				}
			}
			$this->excel_import_model->insert($data);
			echo 'Data Imported successfully';
		}	
	}
}
 
?>