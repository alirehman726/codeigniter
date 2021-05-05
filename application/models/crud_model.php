
<?php
class Crud_model extends CI_Model 
{
	function saverecords($data)
	{
          $result = $this->db->insert('emp_tabl',$data);
          return $result;
    }
    
    function display_records() {
        $query = $this->db->get('emp_tabl');
        return $query->result();
    }

    function displayrecordsById($id) {  
        $query = $this->db->query("select * from emp_tabl where id = {$id}");
        return $query->result();
    }

    function update_records($data) {
        $result = $this->db->where('id', $data['id'])->update('emp_tabl', $data);
        return $result;
    }

    function deleterecords($id) {
        $result = $this->db->where('id',$id)->delete('emp_tabl');
        return $result;
    }
}