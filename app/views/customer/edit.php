<form class="card" action="<?= BASEURL; ?>/customer/update" method="post">
  <div class="card-body">
    <div class="row">
      <input type="hidden" name="id_customer" value="<?= $data['customer']['id_customer']; ?>"> <!-- Tambahkan input tersembunyi untuk id_customer -->
      <div class="mb-3">
        <label class="form-label required">Nama Produk</label>
        <input type="text" id="name_customer" name="name_customer" class="form-control" value="<?= $data['customer']['name_customer']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label required">Alamat</label>
        <input type="text" id="address" name="address" class="form-control" value="<?= $data['customer']['address']; ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label required">Kategori Produk</label>
        <select class="form-select" name="id_membership" required>
          <?php foreach ($data['membership'] as $membership) : ?>
            <option value="<?= $membership['id_membership'] ?>" <?= $membership['id_membership'] == $data['customer']['id_membership'] ? 'selected' : '' ?>>
              <?= $membership['type'] ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>

  <div class="card-footer text-end">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>