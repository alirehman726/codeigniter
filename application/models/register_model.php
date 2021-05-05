<?php

class Register_model extends CI_Model {

    function savedata($data) {

        $result = $this->db->insert('user', $data);
        return $result;
    }
}

?>