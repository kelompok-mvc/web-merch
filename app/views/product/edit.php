<form class="card" action="<?= BASEURL; ?>/product/edit ?>" method="post">
  <div class="card-body">
    <div class="row">

      <div class="mb-3">
        <label class="form-label required">Nama Produk</label>
        <input type="text" name="name" class="form-control" value="nct 127 the link lanyard" required>
      </div>
      <div class="mb-3">
        <label class="form-label required">Deskripsi</label>
        <textarea class="form-control" name="description" id="floatingTextarea" required>cocok untuk konseran</textarea>
      </div>
      <div class="mb-3">
        <label class="form-label required">Stok Produk</label>
        <input type="text" name="stock" class="form-control" value="20" required>
      </div>
      <div class="mb-3">
        <label class="form-label required">Kategori Produk</label>
        <select class="form-select" name="id_product" required>
          <option value="1">T-shirt</option>
          <option value="2">Tas</option>
          <option value="2">Topi</option>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label required">Harga</label>
        <input type="number" class="form-control" name="price" placeholder="Masukkan No HP Orang Tua" value="0898754231" required>
      </div>
    </div>
  </div>

  <div class="card-footer text-end">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
</form>