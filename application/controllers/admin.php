<?php

class Admin extends MY_Controller {

    function Admin()
    {
        parent::MY_Controller();
    }
    
    function index()
    {
        $this->load->view('admin_index', $data);
    }
}
