<form class="card" action="<?= BASEURL; ?>/product/update" method="post">
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="id_product" value="<?= $data['product']['id_product']; ?>"> <!-- Tambahkan input tersembunyi untuk id_product -->
            <div class="mb-3">
                <label class="form-label required">Nama Produk</label>
                <input type="text" id="name_product" name="name_product" class="form-control" value="<?= $data['product']['name_product']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Deskripsi</label>
                <input type="text" id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi Produk" value="<?= $data['product']['description']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Stok Produk</label>
                <input type="text" name="stock" class="form-control" value="<?= $data['product']['stock']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Kategori Produk</label>
                <select class="form-select" name="id_category" required>
                    <?php foreach ($data['category'] as $category) : ?>
                        <option value="<?= $category['id_category'] ?>" <?= $category['id_category'] == $data['product']['id_category'] ? 'selected' : '' ?>>
                            <?= $category['name_category'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label required">Harga</label>
                <input type="number" class="form-control" name="price" placeholder="Masukkan Harga Produk" value="<?= $data['product']['price']; ?>" required>
            </div>
        </div>
    </div>

    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
