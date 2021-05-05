

<?php

class Queries extends CI_Model {
    public function getCurrPassword($userid) {
        $query = $this->db->where(['id' =>$userid])->get('user');
        if ($query->num_rows() > 0 ) {
            return $query->row();
        }
    }

    public function updatePassword($new_password, $userid) {
        $data = array('password ' => $new_password);
        return $this->db->where('id', $userid)->update('user',$data);
    }
}


?>