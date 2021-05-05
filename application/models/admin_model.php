


<?php 

class Admin_model extends CI_Model {

    function saverecords($data) {
        $result = $this->db->insert('user', $data);
        return $result;
    }

    function display_records() {
        $query = $this->db->get('user');
        return $query->result();
    }
   
    function displayrecordsById($id) {
        $query = $this->db->query("select * from user where id = {$id}");
        return $query->result();
    }

    function update_records($data) {
        $result = $this->db->where('id', $data['id'])->update('user', $data);
        return $result;
    } 

   

    function deleterecords($id) { 
        $result = $this->db->where('id',$id)->delete('user');
        return $result;
    }

}


?>