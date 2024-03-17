<?php

class Customer extends Controller
{
  public function index()
  {
    $data['judul'] = 'Customer';
    $data['customers'] = $this->model('CustomerModel')->getAllCustomer();
    $data['membership'] = $this->model('CustomerModel')->getAllMembership();
    $this->view('components/header', $data);
    $this->view('customer/index', $data);
    $this->view('components/footer');
  }
  public function edit($id)
  {
    $data['judul'] = 'Edit customer';
    $data['customer'] = $this->model('CustomerModel')->getCustomerById($id);
    $data['membership'] = $this->model('CustomerModel')->getAllMembership();
    $this->view('components/header', $data);
    $this->view('customer/edit', $data);
  }

  public function update()
  {
    $_POST['id'] = $_POST['id_customer']; // Tambahkan id_customer ke $_POST untuk update
    if ($this->model('CustomerModel')->updateCustomer($_POST) > 0) {
      Flasher::setFlash('berhasil', 'diperbarui', 'success');
      header('Location: ' . BASEURL . '/customer');
      exit;
    } else {
      Flasher::setFlash('gagal', 'diperbarui', 'danger');
      header('Location: ' . BASEURL . '/customer');
      exit;
    }
  }


  public function add()
  {
    if ($this->model('CustomerModel')->addCustomer($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/customer');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/customer');
      exit;
    }
  }

  public function delete($id)
  {
    if ($this->model('customerModel')->deleteCustomer($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/customer');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/customer');
      exit;
    }
  }
}
