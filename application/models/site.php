<?php
class Site extends CI_Model{
	
	public function getProduct($id = ''){
		$this->db->select('*');
		$this->db->from('document');
		if($id != ''){
			$this->db->where('id',$id);
		}
		return $this->db->get()->result_array();
	}
}
?>