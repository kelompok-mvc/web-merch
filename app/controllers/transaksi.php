<?php

class Transaksi extends Controller {
    public function index()
    {
      $data['judul'] = 'Transaksi';
      $this->view('components/header', $data);
      $this->view('transaksi/index', $data);
      $this->view('components/footer');
    }
}