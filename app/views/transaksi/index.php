<div class="">
  <div class="mb-4">
    <form action="<?= BASEURL; ?>/transaksi/add" method="post" class="row">
      <div class="col-md-6 mb-2">
        <label class="form-label required">Barcode Barang</label>
        <input type="text" class="form-control" name="Barcode_barang" placeholder="Masukkan Barcode Barang" required>
      </div>
      <div class="col-md-6 mb-2">
        <label class="form-label required">Barang</label>
        <input type="text" class="form-control" name="total" placeholder="Masukkan Nama Barang" required>
      </div>

      <div class="col-md-6 mb-2">
        <label class="form-label required">Nama Member</label>
        <select class="form-select" name="id_member" required>
          <option value="1">Salman</option>
          <option value="2">Ilmi</option>
          <option value="3">Azizi</option>
        </select>
      </div>
      <div class="col-md-6 mb-2">
        <label class="form-label required">Jumlah</label>
        <input type="number" name="qty" class="form-control" required>
      </div>
      <div class="col-md-6 mb-2">
        <label class="form-label required">Total</label>
        <input type="number" class="form-control" name="total_harga" placeholder="Masukkan Total Harga" required>
      </div>
      <div class="col-md-6 mb-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>


  <div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>No</th>
            <th>Id Transaksi</th>
            <th>Nama Barang</th>
            <th>Nama Member</th>
            <th>Jumlah</th>
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
              B2
            </td>
            <td>
              Baju
            </td>
            <td>
              Ilmi
            </td>
            <td>
              2
            </td>
            <td>
              200.000
            </td>
            <td>
              <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="">Delete</a>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>

  <div class="container mt-5">
    <h1>Form Pembayaran</h1>
    <div class="row">
      <div class="col-md-6">
        <div class="mb-3">
          <label for="namaMember" class="form-label">Nama Member</label>
          <input type="text" class="form-control" id="namaMember" placeholder="Masukkan nama member">
        </div>
        <div class="mb-3">
          <label for="totalHarga" class="form-label">Total Harga</label>
          <input type="text" class="form-control" id="totalHarga" placeholder="Masukkan total harga">
        </div>
        <div class="mb-3">
          <label for="totalBayar" class="form-label">Total Bayar</label>
          <input type="text" class="form-control" id="totalBayar" placeholder="Masukkan total bayar">
        </div>
        <div class="d-grid gap-2">
          <button type="button" class="btn btn-primary" id="btnBayar">Bayar</button>
        </div>
      </div>
      <div class="col-md-6">
        <div class="mb-3">
          <label for="kembalian" class="form-label">Kembalian</label>
          <input type="text" class="form-control" id="kembalian" readonly>
        </div>
      </div>
    </div>
  </div>

</div>