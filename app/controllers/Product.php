<?php

class Product extends Controller
{
  public function index()
  {
    $data['judul'] = 'Product';
    $this->view('components/header', $data);
    $this->view('product/index', $data);
    $this->view('components/footer');
  }
  public function edit()
  {
    $data['judul'] = 'Edit Product';
    $this->view('components/header', $data);
    $this->view('product/edit', $data);
  }
}
