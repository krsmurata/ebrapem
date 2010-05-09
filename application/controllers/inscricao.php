<?php

class Inscricao extends Controller {
    
    function Inscricao()
    {
        parent::Controller();
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
        $data = array();

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            
            if ($this->input->post('enviar_trabalho')) {
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
                'atividade_id' => $this->input->post('atividade')
                )
            );
            
	    	if ( ! isset($data['error']))
	    	{
                $this->inscricao_model->add_record($data);
                $this->sucesso();
                return;
            }
        }
        
        $data['heading'] = 'Nova Inscrição';
        
        $this->load->view('cabecalho', $data);
        $this->load->view('inscricao_adicionar', $data);
        $this->load->view('rodape', $data);
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
