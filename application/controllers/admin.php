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
}
