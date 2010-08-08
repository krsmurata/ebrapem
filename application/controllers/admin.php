<?php

class Admin extends MY_Controller {

    function Admin()
    {
        parent::MY_Controller();
    }
    
    function index()
    {
        $data['query'] = $this->inscricao_model->get_records();
        $total = count($data['query']);
        $confirmadas = $this->confirmadas($data['query']);
        $data['heading'] = "Admin Inscrições. TOTAL: $total - CONFIRMADAS: $confirmadas";
        $this->load->view('admin_index', $data);
    }

    function confirmar_inscricao($cpf)
    {
        if ($this->inscricao_model->confirmar_inscricao($cpf))
        {
            $inscricao = $this->inscricao_model->find_by_cpf($cpf);            
            $this->inscricao_model->enviar_email('confirmada', $inscricao[0]);
            redirect('admin', 'refresh');
        }
        else
        {
            $data['error'] = 'ERRO!';
            $this->index();
        }
    }

    function trabalhos($filtro = '', $val = '')
    {
        $condition = "trabalho_enviado = 1";
        
        switch ($filtro) {
            case 'carta':
                if ($val == 'sim') {
                    $condition .= " AND trabalho_carta != ''";
                } elseif ($val == 'nao') {
                    $condition .= " AND (trabalho_carta = '' OR trabalho_carta IS NULL)";
                }
                break;
            case 'gt':
                if ($val != 'todos') {
                    $condition .= " AND gt = '$val'";
                }
                break;
        }
        
        $data['filtro'] = $filtro;
        $data['val'] = $val;
        $data['query'] = $this->inscricao_model->get_records($condition);
        $total = count($data['query']);
        $trabalhos_aprovados = $this->trabalhos_aprovados($data['query']);
        $data['heading'] = "Admin Trabalhos. TOTAL: $total - APROVADOS: $trabalhos_aprovados";
        $this->load->view('admin_trabalhos', $data);
    }
    
    function aprovar_trabalho($cpf)
    {
        if ($this->inscricao_model->aprovar_trabalho($cpf))
        {
            $inscricao = $this->inscricao_model->find_by_cpf($cpf);            
            $this->inscricao_model->enviar_email('trabalho_aprovado', $inscricao[0]);
            redirect('admin/trabalhos', 'refresh');
        }
        else
        {
            $data['error'] = 'ERRO!';
            $this->index();
        }
    }

    private function confirmadas($inscricoes)
    {
        $x = 0;
        foreach ($inscricoes as $i) {
            if ($i->pag_confirmado == 1) {
                $x++;
            }
        }
        return $x;
    }
    
    private function trabalhos_aprovados($inscricoes)
    {
        $x = 0;
        foreach ($inscricoes as $i) {
            if ($i->trabalho_aprovado == 1) {
                $x++;
            }
        }
        return $x;
    }

}
