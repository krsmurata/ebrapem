<?php

class Inscricao_model extends Model {

    function get_records($condition = '')
    {
        if (empty($condition)) {
            $this->db->order_by('nome', 'asc');
            $query = $this->db->get('inscricoes');
        } else {
            $this->db->group_by(array('nome', 'gt'));
            $this->db->order_by('gt, nome', 'asc');
            $query = $this->db->get_where('inscricoes', $condition);
        }

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
        $this->db->where('cpf', $data['cpf']);
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
    
    function valor()
    {
        $data_final1 = '2010-07-06';
        $data_final2 = '2010-08-05';
        $data_hoje = date("Y-m-d");
        
        $hoje = strtotime($data_hoje);
        $final1 = strtotime($data_final1);
        $final2 = strtotime($data_final2);

        if ($hoje <= $final1) {
            return 70;
        }
        elseif ($hoje > $final1 && $hoje <= $final2) {
            return 80;
        } else {
            return 100;
        }
    }

    function confirmar_inscricao($cpf) {
        $data['pag_confirmado'] = 1;
        $data['pag_data_conf'] = date("Y-m-d H:i:s", time());
        $this->db->where('cpf', $cpf);
        return $this->db->update('inscricoes', $data); 
    }
    
    function aprovar_trabalho($cpf) {
        $data['trabalho_aprovado'] = 1;
        $data['trabalho_data_aprovacao'] = date("Y-m-d H:i:s", time());
        $this->db->where('cpf', $cpf);
        return $this->db->update('inscricoes', $data); 
    }

    function enviar_email($tipo, $data) {
        
        $this->email->from('xivebrapem.inscricoes@gmail.com', 'Inscrições - XIV EBRAPEM');
        $this->email->to($data->email); 
        $this->email->cc('xivebrapem.inscricoes@gmail.com');

        $texto = "Olá {$data->nome},\n\n";

        switch ($tipo) {
            case 'inscricao':
                $assunto = "[EBRAPEM #{$data->id}] Solicitação de Inscrição - Aguardando Comprovante de Pagamento";
                $texto .= "Sua inscrição foi enviada e está aguardando o envio do Comprovante de Pagamento.\n\n";
                $texto .= "Visite o endereço abaixo para consultar informações de pagamento e enviar o comprovante:\n\n";
                $texto .= "http://ebrapem.mat.br/inscricoes/index.php/inscricao/confirmar_pagamento/{$data->cpf}\n\n";
                break;
            case 'comprovante':
                $assunto = "[EBRAPEM #{$data->id}] Comprovante Enviado - Aguardando Confirmação da Organização";
                $texto .= "Obrigado por enviar o Comprovante de Pagamento.\n\n";
                $texto .= "A organização irá confirmar o pagamento e será enviado um email avisando a aprovação.\n\n";
                $texto .= "Caso não receba nenhum email nos próximos dias, você pode consultar no endereço abaixo o status da sua inscrição:\n\n";
                $texto .= "http://ebrapem.mat.br/inscricoes/index.php/inscricao/status/{$data->cpf}\n\n";
                break;
            case 'trabalho':
                $assunto = "[EBRAPEM #{$data->id}] Trabalho Enviado";
                $texto .= "Obrigado por enviar o seu trabalho \"$data->trabalho_titulo\".\n\n";
                $texto .= "Se ainda não efetuou o pagamento ou envio do comprovante, visite o endereço abaixo:\n\n";
                $texto .= "http://ebrapem.mat.br/inscricoes/index.php/inscricao/confirmar_pagamento/{$data->cpf}\n\n";
                $texto .= "Caso não receba nenhum email nos próximos dias, você pode consultar no endereço abaixo o status da sua inscrição:\n\n";
                $texto .= "http://ebrapem.mat.br/inscricoes/index.php/inscricao/status/{$data->cpf}\n\n";
                break;
            case 'confirmada':
                $assunto = "[EBRAPEM #{$data->id}] Inscrição Confirmada!";
                $texto .= "Muito obrigado por participar do XIV EBRAPEM, sua inscrição foi confirmada com sucesso.\n\n";
                $texto .= "Você pode consultar no endereço abaixo mais detalhes da sua inscrição:\n\n";
                $texto .= "http://ebrapem.mat.br/inscricoes/index.php/inscricao/status/{$data->cpf}\n\n";
                break;
            case 'trabalho_aprovado':
                $assunto = "[EBRAPEM #{$data->id}] Trabalho Aprovado!";
                $texto .= "Prezado participante, seu trabalho com o título \"{$data->trabalho_titulo}\" foi aceito no XIV EBRAPEM.\n\n";
                $texto .= "No dia 09 de Agosto de 2010 será divulgada a lista de trabalhos aprovados oficialmente juntamente com os trabalhos completos.\n";
                $texto .= "Assim você poderá fazer o download dos trabalhos relativos ao seu Grupo de Trabalho (GT) para discussão dos mesmos.\n\n";
                $texto .= "Você pode consultar no endereço abaixo mais detalhes da sua inscrição:\n\n";
                $texto .= "http://ebrapem.mat.br/inscricoes/index.php/inscricao/status/{$data->cpf}\n\n";
                break;
       }
        
        $texto .= "Atenciosamente,\n\n"; 
        $texto .= "Equipe de Inscrições XIV EBRAPEM\n";
        $texto .= "http://ebrapem.com.br/inscricoes/\n";
        $texto .= "xivebrapem.inscricoes@gmail.com\n";

        $this->email->subject($assunto);
        $this->email->message($texto);	
        
        $this->email->send();
    }

}

?>
