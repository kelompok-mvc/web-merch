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
    $data['admin'] = $this->model('AdminModel')->getAllAdmin();
    $this->view('components/header', $data);
    $this->view('admin/index', $data);
    $this->view('components/footer');
  }

  public function add()
  {
    if ($this->model('AdminModel')->addAdmin($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/admin');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/admin');
      exit;
    }
  }

  public function tryLogin()
  {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data['login'] = $this->model('AdminModel')->getUser($username, $password);
    
    session_start();
    if ($data['login'] == NULL) {
      header("Location:" . BASEURL . "/404");
    } else {
      foreach ($data['login'] as $row) :
        $_SESSION['name_admin'] = $row['name_admin'];
        header("Location:" . BASEURL);
      endforeach;
    }
  }

  public function edit($id)
  {
    $data['judul'] = 'Edit Admin';
    $data['admin'] = $this->model('AdminModel')->getAdminById($id);    
    $this->view('components/header', $data);
    $this->view('admin/edit', $data);
  }

  public function update()
{
    $_POST['id'] = $_POST['id_admin']; // Tambahkan id_product ke $_POST untuk update
    if ($this->model('AdminModel')->updateAdmin($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diperbarui', 'success');
        header('Location: ' . BASEURL . '/admin');
        exit;
    } else {
        Flasher::setFlash('gagal', 'diperbarui', 'danger');
        header('Location: ' . BASEURL . '/admin');
        exit;
    }
}

  public function delete($id)
  {
    if ($this->model('AdminModel')->deleteAdmin($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/admin');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/admin');
      exit;
    }
  }

  public function logout(){
    session_start();
    unset($_SESSION['name_admin']);
    session_destroy();
    header('Location: ' . BASEURL );
  }
}
