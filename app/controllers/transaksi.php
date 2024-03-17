<?php

class Transaksi extends Controller
{
  public function index()
  {
    // Generate a new code
    $urlParams = $this->parseURL();
    // Mengambil parameter dari URL
    $kode = isset($urlParams[1]) ? $urlParams[1] : null;
    $data['kode'] = $kode;
    

    $data['judul'] = 'Transaksi';
    $data['product'] = $this->model('TransaksiModel')->getAllProduct();
    $data['orders'] = $this->model('TransaksiModel')->getAllOrderDetail($kode);
    $data['customers'] = $this->model('TransaksiModel')->getAllCustomer();
    
    $this->view('components/header', $data);
    $this->view('transaksi/index', $data);
    $this->view('components/footer');
  }

  public function add()
  {
    $kode = $_POST['kode_penjualan'];
    
    if ($this->model('TransaksiModel')->addOrderList($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/transaksi/' . $kode);
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/transaksi');
      exit;
    }
  }
  
  public function addTransaction()
  {
    $kode = kode_random(10);
    
    if ($this->model('TransaksiModel')->addTransaction($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/transaksi/' . $kode);
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/transaksi');
      exit;
    }
  }



  public function delete($id)
{    
    $kode = $_GET['kode_penjualan']; // Ambil kode_penjualan dari URL

    if ($this->model('TransaksiModel')->deleteOrder($id) > 0) {
        Flasher::setFlash('berhasil', 'dihapus', 'success');
        header('Location: ' . BASEURL . '/transaksi/' . $kode); // Redirect ke halaman transaksi dengan kode
        exit;
    } else {
        Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/transaksi');
        exit;
    }
}

  private function parseURL()
  {
    $url = isset($_GET['url']) ? $_GET['url'] : '/';
    $url = rtrim($url, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    return explode('/', $url);
  }
}
