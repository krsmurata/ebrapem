<?php

class Usuario_model extends Model {

    function get_records()
    {
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    function find_by_login($login)
    {
        $this->db->where('login', $login);
        $query = $this->db->get('usuarios');
        return $query->result();
    }
    
    function update_record($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->update('usuarios', $data);
    }

}

?>
