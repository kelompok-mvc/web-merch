
<div class="">
  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash() ?>
    </div>
  </div>
  <div class="mb-4">
    <form action="<?= BASEURL; ?>/transaksi/add" method="post" class="row">
      <label class="form-label required"><?= $data['kode'] ?></label>
      <div class="col-md-6 mb-2">
        <label class="form-label required">Barang</label>
        <select class="form-select" name="id_product" required>
          <?php foreach ($data['product'] as $product) : ?>
            <option value='<?= $product['id_product'] ?>'><?= $product['name_product'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="col-md-6 mb-2">
        <label class="form-label required">Qty</label>
        <input type="number" name="qty" class="form-control" required>
      </div>
      <div class="col-md-6 mb-2">
        <label for="totalHarga" class="form-label">Total Harga</label>
        <input type="text" class="form-control" id="totalHarga" value="" readonly>
      </div>
      <input type="hidden" name="kode_penjualan" value="<?= $data['kode'] ?>">
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
            <th>Nama Barang</th>
            <th>Jumlah barang</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $number = 1;
          foreach ($data['orders'] as $order) : ?>
            <tr>
              <td>
                <?= $number ?>
              </td>
              <td>
                <?= $order['name_product'] ?>
              </td>
              <td>
                <?= $order['qty'] ?>
              </td>
              <td>
                <?= $order['price'] ?>
              </td>
              <td>
                <?= $order['price'] * $order['qty'] ?>
              </td>

              <td>
                <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="<?= BASEURL; ?>/transaksi/delete/<?= $order['id_order']; ?>" onclick="deleteOrder(<?= $order['id_order']; ?>, '<?= $data['kode']; ?>', '<?= $order['name_product']; ?>'); return false;">Delete</a>
              </td>
            </tr>
          <?php $number++;
          endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" style="text-align: right;">Total Harga:</td>
            <td id="totalHargaFooter" colspan="2"></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

  <form action="<?= BASEURL; ?>/transaksi/addTransaction" method="post" class="row">
    <div class="container mt-5">
      <h1>Form Pembayaran</h1>
      <div class="row">
        <div class="col-md-6">
          <div class="mb-3">
            <label for="namaMember" class="form-label">Nama Member</label>
            <select class="form-select" name="id_customer" required>
              <?php foreach ($data['customers'] as $customer) : ?>
                <option value='<?= $customer['id_customer'] ?>'><?= $customer['name_customer'] ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="totalHargaPayment" class="form-label">Total Harga</label>
            <input type="text" class="form-control" id="totalHargaPayment" name="total" value="" readonly>
          </div>
          <input type="hidden" name="kode_penjualan" value="<?= $data['kode'] ?>">
          <input type="hidden" name="id_admin" value="<?= $data['login']; ?>">
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" id="btnBayar">Bayar</button>
          </div>
        </div>

      </div>
    </div>

  </form>

  <script>
    // Fungsi untuk menghitung total harga
    function hitungTotalHarga() {
      var totalHarga = 0;
      // Loop melalui setiap baris dalam tabel
      var rows = document.querySelectorAll("tbody tr");
      rows.forEach(function(row) {
        var hargaSatuan = parseFloat(row.cells[3].textContent); // Harga satuan
        var jumlah = parseFloat(row.cells[2].textContent); // Jumlah barang
        var total = hargaSatuan * jumlah; // Total harga untuk produk ini
        totalHarga += total; // Menambahkan total harga produk ini ke totalHarga
      });
      // Mengatur nilai total harga pada input dengan id totalHarga
      document.getElementById("totalHarga").value = totalHarga;
      // Mengatur nilai total harga pada td dengan id totalHargaFooter
      document.getElementById("totalHargaFooter").textContent = totalHarga;
      // Mengatur nilai total harga pada input dengan id totalHargaPayment
      document.getElementById("totalHargaPayment").value = totalHarga;
    }

    // Panggil fungsi hitungTotalHarga saat halaman dimuat
    window.onload = hitungTotalHarga;

    // Panggil fungsi hitungTotalHarga saat pengguna mengubah jumlah barang
    document.querySelectorAll("input[name='qty']").forEach(function(input) {
      input.addEventListener("change", hitungTotalHarga);
    });
  </script>
  <script>
    function deleteOrder(orderId, kodePenjualan, productName) {
      if (confirm(`Apakah Kamu Yakin Menghapus Product ${productName}`)) {
        fetch(`<?= BASEURL; ?>/transaksi/delete/${orderId}?kode_penjualan=${kodePenjualan}`, {
            method: 'GET',
          })
          .then(response => {
            if (response.ok) {
              location.reload(); // Reload halaman setelah penghapusan berhasil
            } else {
              alert('Gagal menghapus product.');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat menghapus product.');
          });
      }
    }
  </script>