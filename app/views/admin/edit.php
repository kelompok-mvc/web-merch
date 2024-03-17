<div class="row">

  <form class="card" action="<?= BASEURL; ?>/admin/update" method="post">
    <div class="card-body">
      <div class="row">
        <input type="hidden" name="id_admin" value="<?= $data['admin']['id_admin']; ?>"> <!-- Tambahkan input tersembunyi untuk id_product -->
        <div class="mb-3">
          <label class="form-label required">Nama Admin</label>
          <input type="text" id="name_admin" name="name_admin" class="form-control" value="<?= $data['admin']['name_admin']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label required">Username</label>
          <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Deskripsi Produk" value="<?= $data['admin']['username']; ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label required">Password</label>
          <input type="password" name="password" class="form-control" value="<?= $data['admin']['password']; ?>" required>
        </div>
      </div>
    </div>

    <div class="card-footer text-end">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>