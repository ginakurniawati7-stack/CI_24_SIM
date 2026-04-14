<?php

class hello extends CI_Controller {

  public function index()
{
  $data['nama'] = "Haechan";
  $this->load->view('hello',$data);
}
public function namasaya()
{
  $data['nama'] = "Ginaaaa";
  $this->load->view('hello',$data);
}

}