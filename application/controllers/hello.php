<?php

class hello extends C1_controller {
    public function index()
    {
        $data('nama') = "Triono";
        $this->load->view('hello_view',$data);
    }
    
}