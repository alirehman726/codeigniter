


<?php 


class Document_model extends ci_model {

    function insert($data) {
        $query =  $this->db->insert('document', $data);      
        return $query;
    }

    function display_records() {
        $query = $this->db->get('document');
        return $query->result();
    }
    
    function deleterecords($id) { 
        $result = $this->db->where('id',$id)->delete('document');
        return $result;
    }

    function doc_type() {

        $result = $this->db->get_where('document');
        foreach ($result->result() as $row) {
            return $row->doc_type;
        } 
    }

    public function get_document($id = ''){ 
        $this->db->select('*'); 
        $this->db->from('document');  
        if($id != '') {
            $this->db->where('id', $id); 
        }
        $query = $this->db->get(); 
        $result = $query->row_array();
        return $result; 
    }
}
   
?>