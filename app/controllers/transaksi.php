<?php

class Transaksi extends Controller
{
  public function index()
  {
    // Check if the session is not started, then start it
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the code is already generated and stored in the session
    if (!isset($_SESSION['kode_random'])) {
        // If not, generate a new code and store it in the session
        $_SESSION['kode_random'] = kode_random(10);
    }    
    $kode = $_SESSION['kode_random'];
    $data['kode'] = $_SESSION['kode_random'];

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

    if ($this->model('TransaksiModel')->addOrderList($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/transaksi');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/transaksi');
      exit;
    }
  }

  public function delete($id)
  {
    if ($this->model('TransaksiModel')->deleteOrder($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/transaksi');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/transaksi');
      exit;
    }
  }
}
