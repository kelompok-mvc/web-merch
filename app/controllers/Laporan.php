<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Laporan';
        $this->view('components/header', $data);
        $this->view('laporan/index', $data);
        $this->view('components/footer');
    }
}
