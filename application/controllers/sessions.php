<?php

class Sessions extends Controller
{
    function Session()
    {
        parent::Controller();
    }

    function login($data = array())
    {
        $data['heading'] = 'Admin';

        $this->load->view('cabecalho', $data);
        $this->load->view('login');
        $this->load->view('rodape');
    }

    function authenticate()
    {

        $this->load->model('usuario_model');
        $usuario = $this->usuario_model->find_by_login($this->input->post('login'));
        if (!empty($usuario) && sha1($this->input->post('password')) == $usuario[0]->senha)
        {
            $data['id'] = $usuario[0]->id;
            $data['ultimo_login'] = date("Y-m-d H:i:s", time());
            $this->usuario_model->update_record($data);
            $this->session->set_userdata('loggedin', true);
            redirect('/admin', 'refresh');
        }
        else
        {
            $data['error'] = 'Login ou senha incorreto.';
            $this->login($data);
        }
    }

    function logout()
    {
        $this->session->unset_userdata('loggedin');
        redirect('/sessions/login', 'refresh');
    }
}

?>
