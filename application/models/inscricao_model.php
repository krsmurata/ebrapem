<?php

class Inscricao_model extends Model {

    function get_records()
    {
        $query = $this->db->get('inscricoes');
        return $query->result();
    }
    
    function find_by_cpf($cpf)
    {
        $this->db->where('cpf', $cpf);
        $query = $this->db->get('inscricoes');
        return $query->result();
    }

    function add_record($data)
    {
        $this->db->insert('inscricoes', $data);
        return;
    }

    function update_record($data)
    {
        $this->db->where('id', $data->id);
        $this->db->update('inscricoes', $data);
    }

    function delete_record()
    {
        $this->db->where('id', $this->uri->segment(3));
        $this->db->delete('inscricoes');
    }

    function ultimo_nome($nome)
    {
        $str_Pattern = '/[^ ]*$/';
        
        preg_match($str_Pattern, $nome, $results);
        
        return $results[0];        
    }
}

?>
