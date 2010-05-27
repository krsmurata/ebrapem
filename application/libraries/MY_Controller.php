<?php

class MY_Controller extends Controller
{
    function MY_Controller()
    {
        parent::Controller();
        $this->load->library('session');
        if (!$this->session->userdata('loggedin'))
        {
            redirect('/sessions/login', 'refresh');
        }
    }
}
?>
