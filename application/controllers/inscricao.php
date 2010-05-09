<?php

class Inscricao extends Controller {
    
    function Inscricao()
    {
        parent::Controller();
        $this->load->model('Atividade_model');
    }
    
    function index()
    {
        $data['heading'] = 'Faça sua inscrição agora!';

        $this->load->view('cabecalho', $data);
        $this->load->view('inscricao_index', $data);
        $this->load->view('rodape', $data);
    }

    function adicionar()
    {       
        $data['heading'] = 'Nova Inscrição';
        $data['atividades'] = $this->Atividade_model->get_records();

        $this->load->view('cabecalho', $data);
        $this->load->view('inscricao_adicionar', $data);
        $this->load->view('rodape', $data);
    }

    function processa_adicionar()
    {
        $data = array();
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('cpf', 'CPF', 'required|is_numeric|exact_length[11]|matches[cpf_conf]');
        $this->form_validation->set_rules('cpf_conf', 'Confirmar CPF', 'required');
        $this->form_validation->set_rules('nasc_dia', 'Data de Nascimento Dia', 'required|is_numeric|mac_length[2]');
        $this->form_validation->set_rules('nasc_mes', 'Data de Nascimento Mês', 'required|is_numeric|max_length[2]');
        $this->form_validation->set_rules('nasc_ano', 'Data de Nascimento Ano', 'required|is_numeric|exact_length[4]');
        $this->form_validation->set_rules('endereco', 'Endereço', 'required');
        $this->form_validation->set_rules('cidade', 'Cidade', 'required');
        $this->form_validation->set_rules('estado', 'Estado', 'required');
        $this->form_validation->set_rules('cep', 'CEP', 'required|is_numeric|exact_length[8]');
        $this->form_validation->set_rules('pais', 'País', 'required');
        $this->form_validation->set_rules('tel_ddd', 'Telefone DDD', 'required|is_numeric|exact_length[2]');
        $this->form_validation->set_rules('tel_fone', 'Telefone Número', 'required|is_numeric|max_length[8]|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|matches[email_conf]');
        $this->form_validation->set_rules('email_conf', 'Confirmar Email', 'required');
        $this->form_validation->set_rules('atividade', 'Atividade', 'required|integer');
        $this->form_validation->set_rules('enviar_trabalho', 'Enviar Trabalho', 'required|integer');

        if ($this->input->post('enviar_trabalho') == 1) {
            $this->form_validation->set_rules('gt', 'Grupo de Trabalho', 'required');
            $this->form_validation->set_rules('trabalho_siucacao', 'Trabalho Situação', 'required');
            $this->form_validation->set_rules('trabalho_titulo', 'Trabalho Título', 'required');
            $this->form_validation->set_rules('trabalho_arquivo', 'Trabalho Arquivo', 'required');
            
            if ($this->form_validation->run() == TRUE) {
                $ultimo_nome = $this->inscricao_model->ultimo_nome($this->input->post('nome'));
           
                $config['upload_path'] = './trabalhos/';
                $config['allowed_types'] = 'pdf';
   	            $config['file_name'] = "{$this->input->post('gt')}_{$ultimo_nome}_{$this->input->post('trabalho_situacao')}";
   	    
                $this->load->library('upload', $config);
   
   	            if ( ! $this->upload->do_upload('trabalho_arquivo'))
   	            {
   		            $data['error'] = $this->upload->display_errors();
                }
                else
                {
                    $upload_data_trabalho = $this->upload->data();
                    
                    if ( !empty($_FILES['trabalho_carta']['name'])) {
                        $config['file_name'] = "{$config['file_name']}_carta";
                         
                        $this->upload->initialize($config);
                       
                        if ( ! $this->upload->do_upload('trabalho_carta'))
                        {
                            $data['error'] = $this->upload->display_errors();
                        }
                        else
                        {
                            $upload_data_carta = $this->upload->data();
                            $data['trabalho_carta'] = $upload_data_carta['file_name'];
                        }
                    }
                    
                    $data = array_merge ( $data,
                        array(
                        'gt' => $this->input->post('gt'),
                        'trabalho_situacao' => $this->input->post('trabalho_situacao'),
                        'trabalho_titulo' => $this->input->post('trabalho_titulo'),
                        'trabalho_arquivo' => $upload_data_trabalho['file_name']
                        )
                    );
                }
            }
       }
       
        $data = array_merge( $data,
            array(
            'nome' => $this->input->post('nome'),
            'cpf' => $this->input->post('cpf'),
            'data_nascimento' => "{$this->input->post('nasc_ano')}-{$this->input->post('nasc_mes')}-{$this->input->post('nasc_dia')}",
            'endereco' => $this->input->post('endereco'),
            'cidade' => $this->input->post('cidade'),
            'estado' => $this->input->post('estado'),
            'cep' => $this->input->post('cep'),
            'pais' => $this->input->post('pais'),
            'telefone' => "{$this->input->post('tel_ddd')}{$this->input->post('tel_fone')}",
            'email' => $this->input->post('email'),
            'atividade_id' => $this->input->post('atividade'),
            'trabalho_enviado' => $this->input->post('enviar_trabalho')
            )
        );
        
   	    if (isset($data['error']) || ($this->form_validation->run() == FALSE))
        {
            $this->adicionar();
        }
        else
        {
            $this->inscricao_model->add_record($data);
            $this->sucesso();
        }
    }

    function sucesso()
    {

        $data['heading'] = 'Inscrição efetuada com sucesso!';
        
        $this->load->view('cabecalho', $data);
        $this->load->view('inscricao_sucesso', $data);
        $this->load->view('rodape', $data);
    }

}

?>
