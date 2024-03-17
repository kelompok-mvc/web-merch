<?php

class Laporan extends Controller
{
    public function index()
    {
        $data['judul'] = 'Laporan';
        $data['laporan'] = $this->model('LaporanModel')->getAllLaporan();
        $this->view('components/header', $data);
        $this->view('laporan/index', $data);
        $this->view('components/footer');
    }
}
