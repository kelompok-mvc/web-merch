<div class="">
  <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Menambahkan Transaksi
  </button>
  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Admin</th>
            <th>Nama Member</th>
            <th>Waktu</th>
            <th>Total Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              1
            </td>
            <td>
              Azizi
            </td>
            <td>
              Ilmi
            </td>
            <td>
              2024-03-16
            </td>
            <td>
              200.00
            </td>
            <td>
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
        <h5 class="modal-title" id="judulModal">Tambah Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/transaksi/add" method="post">
          <div class=" mb-2">
            <label class="form-label required">Nama Member</label>
            <select class="form-select" name="id_member" required>
              <option value="1">
                Salman
              </option>
              <option value="1">
                Ilmi
              </option>
              <option value="1">
                Azizi
              </option>
            </select>
          </div>
          <div class=" mb-2">
            <label class="form-label required">Nama Barang</label>
            <select class="form-select" name="id_product" required>
              <option value="1">
                Baju
              </option>
              <option value="1">
                Celana
              </option>
              <option value="1">
                Jaket
              </option>
            </select>
          </div>
          <div class=" mb-2">
            <label class="form-label required">qty</label>
            <input type="number" class="form-control" name="qty" placeholder="Masukkan Jumlah Produk" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Transaksi</button>
      </div>
      </form>
    </div>
  </div>