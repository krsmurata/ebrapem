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
        if ($this->input->post('password') == 'culturaescolar!' && $this->input->post('login') == 'kakau')
        {
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
