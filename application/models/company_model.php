 






<?php
class Company_model extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->select("*");
        $this->db->from("company");
        if($query != '')
        {
            $this->db->like('company_name', $query);
            $this->db->or_like('company_code', $query);
            // $this->db->or_like('status', $query);
        }
        $this->db->order_by('id', 'DESC'); 
        return $this->db->get();
    }
} 
?>