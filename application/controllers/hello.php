<?php

class hello extends CI_Controller {

    public function index()
    {
        $data['nama'] = "Gina";
        $this->load->view('hello_view', $data);
    }
    
}