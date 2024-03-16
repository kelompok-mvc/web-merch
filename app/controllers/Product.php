<?php

class Product extends Controller
{
  public function index()
  {
    $data['judul'] = 'Product';
    $data['products'] = $this->model('ProductModel')->getAllProduct();
    $data['category'] = $this->model('ProductModel')->getAllCategory();
    $this->view('components/header', $data);
    $this->view('product/index', $data);
    $this->view('components/footer');
  }
  public function edit($id)
  {
    $data['judul'] = 'Edit Product';
    $data['product'] = $this->model('ProductModel')->getProductById($id);
    $data['category'] = $this->model('ProductModel')->getAllCategory();
    $this->view('components/header', $data);
    $this->view('product/edit', $data);
  }

  public function update()
{
    $_POST['id'] = $_POST['id_product']; // Tambahkan id_product ke $_POST untuk update
    if ($this->model('ProductModel')->updateProduct($_POST) > 0) {
        Flasher::setFlash('berhasil', 'diperbarui', 'success');
        header('Location: ' . BASEURL . '/product');
        exit;
    } else {
        Flasher::setFlash('gagal', 'diperbarui', 'danger');
        header('Location: ' . BASEURL . '/product');
        exit;
    }
}


  public function add()
  {
    if ($this->model('productModel')->addProduct($_POST) > 0) {
      Flasher::setFlash('berhasil', 'ditambahkan', 'success');
      header('Location: ' . BASEURL . '/product');
      exit;
    } else {
      Flasher::setFlash('gagal', 'ditambahkan', 'danger');
      header('Location: ' . BASEURL . '/product');
      exit;
    }
  }

  public function delete($id)
  {
    if ($this->model('productModel')->deleteProduct($id) > 0) {
      Flasher::setFlash('berhasil', 'dihapus', 'success');
      header('Location: ' . BASEURL . '/product');
      exit;
    } else {
      Flasher::setFlash('gagal', 'dihapus', 'danger');
      header('Location: ' . BASEURL . '/product');
      exit;
    }
  }
}
