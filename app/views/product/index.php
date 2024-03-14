<div class="">
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Menambahkan Produk
  </button>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              1
            </td>
            <td>
              nct 127 the link lanyard
            </td>
            <td>
              cocok untuk konseran
            </td>
            <td>
              505000
            </td>
            <td>
              20
            </td>
            <td>
              lanyard
            </td>
            <td>
              <a style="margin-bottom: 2px;" class="btn btn-success btn-sm py-1 px-2" href="<?= BASEURL; ?>/product/edit">Edit</a>
              <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="">Delete</a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/product/add" method="post">
          <div class=" mb-2">
            <label class="form-label required">Nama Produk</label>
            <input type="text" name="name" class="form-control" placeholder="Masukkan Nama Produk" required>
          </div>
          <div class=" mb-2">
            <label class="form-label required">Deksripsi Produk</label>
            <input type="text" name="description" class="form-control" placeholder="Masukkan Deskripsi Produk" required>
          </div>
          <div class=" mb-2">
            <label class="form-label required">Kategori Produk</label>
            <select class="form-select" name="id_product" required>
              <option value="1">T-shirt</option>
              <option value="2">Tas</option>
              <option value="2">Topi</option>
            </select>
          </div>
          <div class=" mb-2">
            <label class="form-label required">Harga</label>
            <input type="number" class="form-control" name="price" placeholder="Masukkan Harga Produk" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
      </div>
      </form>
    </div>
  </div>