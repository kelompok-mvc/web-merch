<?php

class membership extends Controller
{
  public function index()
  {
    $data['judul'] = 'Membership';
    $data['membership'] = $this->model('membershipModel')->getAllMembership();
    $this->view('components/header', $data);
    $this->view('membership/index', $data);
    $this->view('components/footer');
  }

  public function edit($id)
  {
    $data['judul'] = 'Edit Membership';
    $data['membership'] = $this->model('membershipModel')->getMembershipById($id);
    $this->view('components/header', $data);
    $this->view('membership/edit', $data);
  }

  public function update()
{
    $_POST['id'] = $_POST['id_membership']; // Tambahkan id_product ke $_POST untuk update
    if ($this->model('membershipModel')->updateMembership($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diperbarui', 'success');
        header('Location: ' . BASEURL . '/membership');
        exit;
    } else {
        Flasher::setFlash('gagal', 'diperbarui', 'danger');
        header('Location: ' . BASEURL . '/membership');
        exit;
    }
}


  public function add()
  {
    if ($this->model('membershipModel')->addMembership($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/membership');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/membership');
      exit;
    }
  }

  public function delete($id)
  {
    if ($this->model('membershipModel')->deleteMembership($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/membership');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/product');
      exit;
    }
  }
}
  ?>