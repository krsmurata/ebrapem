<?php

class Atividade_model extends Model {

    function get_records()
    {
        $query = $this->db->get('atividades');
        return $query->result();
    }

    function add_record($data)
    {
        $this->db->insert('atividades', $data);
        return;
    }

    function update_record($data)
    {
        $this->db->where('id', $data->id);
        $this->db->update('atividades', $data);
    }

    function delete_record()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('atividades');
    }
}

?>
