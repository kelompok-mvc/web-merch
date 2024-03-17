<div class="">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash() ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Menambahkan Admin
      </button>
    </div>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Admin</th>
            <th>Username</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1; foreach($data['admin'] as $admin) : ?>
            <tr>
              <td><?= $number?></td>
              <td>
                <?= $admin['name_admin']?>
              </td>
              <td>
                <?= $admin['username']?>
              </td>
              <td>
              <a style="margin-bottom: 2px;" class="btn btn-success btn-sm py-1 px-2 halUpdate" href="<?= BASEURL; ?>/admin/edit/<?= $admin['id_admin']; ?>" data-id="<?= $admin['id_admin'] ?>">Edit</a>
              <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="<?= BASEURL; ?>/admin/delete/<?= $admin['id_admin']; ?>" onclick="return confirm('Apakah Kamu Yakin Menghapus Admin <?= $admin['name_admin']?>')">Delete</a>
              </td>
            </tr>  
          <?php $number++; endforeach?>          
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/admin/add" method="post">
          <div class=" mb-2">
            <label class="form-label required" for="name_admin">Nama Admin</label>
            <input type="text" id="name_admin" name="name_admin" class="form-control" placeholder="Masukkan Nama Admin" required>
          </div>

          <div class=" mb-2">
            <label class="form-label required" for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan username" required>
          </div>

          <div class=" mb-2">
            <label class="form-label required" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Admin</button>
      </div>
      </form>
    </div>
  </div>