<?php

class Admin extends Controller {

    function Admin()
    {        
        parent::Controller();
    }
    
    function inscricoes()
    {
        $this->load->view('admin_index', $data);
    }
}
