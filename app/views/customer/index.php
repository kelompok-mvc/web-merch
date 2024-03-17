<div class="">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash() ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Menambahkan Customer
      </button>
    </div>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Alamat</th>
            <th>Membership</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1;
          foreach ($data['customers'] as $customer) : ?>
            <tr>
              <td><?= $number ?></td>
              <td>
                <?= $customer['name_customer'] ?>
              </td>
              <td>
                <?= $customer['address'] ?>
              </td>
              <td>
                <?= $customer['type'] ?>
              </td>
              <td>
                <a style="margin-bottom: 2px;" class="btn btn-success btn-sm py-1 px-2 halUpdate" href="<?= BASEURL; ?>/customer/edit/<?= $customer['id_customer']; ?>" data-id="<?= $customer['id_customer'] ?>">Edit</a>
                <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="<?= BASEURL; ?>/customer/delete/<?= $customer['id_customer']; ?>" onclick="return confirm('Apakah Kamu Yakin Menghapus Data <?= $customer['name_customer']; ?>')">Delete</a>
              </td>
            </tr>
          <?php $number++;
          endforeach; ?>

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
        <h5 class="modal-title" id="judulModal">Tambah Customer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/customer/add" method="post">
          <div class=" mb-2">
            <label class="form-label required" for="name_customer">Nama Customer</label>
            <input type="text" id="name_customer" name="name_customer" class="form-control" placeholder="Masukkan Nama Customer" required>
          </div>

          <div class=" mb-2">
            <label class="form-label required" for="membership">Kategori Produk</label>
            <select class="form-select" id="id_membership" name="id_membership" required>
              <?php foreach ($data['membership'] as $customer) : ?>
                <option value='<?= $customer['id_membership'] ?>'><?= $customer['type'] ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class=" mb-2">
            <label class="form-label required" for="address">Alamat</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Masukkan Alamat Customer" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Customer</button>
      </div>
      </form>
    </div>
  </div>