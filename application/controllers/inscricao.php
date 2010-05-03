<?php

class Inscricao extends Controller {
    
    function Inscricao()
    {
       parent::Controller(); 
    }
    
    function index()
    {
       $this->load->view('inscricao_index');
    }
}

?>
