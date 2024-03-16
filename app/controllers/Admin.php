<?php

class Admin extends Controller
{
  public function login()
  {
    $data['judul'] = 'Login';
    $this->view('admin/login', $data);
  }

  public function index()
  {
    $data['judul'] = 'Admin';
    $this->view('components/header', $data);
    $this->view('admin/index', $data);
    $this->view('components/footer');
  }
  public function edit()
  {
    $data['judul'] = 'Admin';
    $this->view('components/header', $data);
    $this->view('admin/edit', $data);
    $this->view('components/footer');
  }
}
