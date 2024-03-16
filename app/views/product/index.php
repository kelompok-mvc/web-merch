<div class="">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash()?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Menambahkan Produk
      </button>      
    </div>
  </div>
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
          <?php $number = 1; foreach($data['products'] as $product) : ?>
            <tr>
              <td><?= $number?></td>
              <td>
                <?= $product['name_product']?>
              </td>
              <td>
                <?= $product['description']?>
              </td>
              <td>
                <?= $product['price']?>
              </td>
              <td>
                <?= $product['stock']?>
              </td>
              <td>
                <?= $product['name_category']?>
              </td>
              <td>
              <a style="margin-bottom: 2px;" class="btn btn-success btn-sm py-1 px-2 halUpdate" href="<?= BASEURL; ?>/product/edit/<?= $product['id_product']; ?>" data-id="<?= $product['id_product']?>">Edit</a>
              <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="<?= BASEURL; ?>/product/delete/<?= $product['id_product']; ?>" onclick="return confirm('Apakah Kamu Yakin Menghapus Data <?= $product['name_product']; ?>')">Delete</a>
            </td>
              </tr>
          <?php $number++; endforeach; ?>          

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
        <h5 class="modal-title" id="judulModal">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/product/add" method="post">
          <div class=" mb-2">
            <label class="form-label required" for="name_product">Nama Produk</label>
            <input type="text" id="name_product" name="name_product" class="form-control" placeholder="Masukkan Nama Produk" required>
          </div>
          
          <div class=" mb-2">
            <label class="form-label required" for="category">Kategori Produk</label>
            <select class="form-select" id="id_category" name="id_category" required>
            <?php foreach($data['category'] as $product) : ?>
              <option value='<?= $product['id_category']?>'><?= $product['name_category']?></option>              
            <?php endforeach ?>
            </select>
          </div>

          <div class=" mb-2">
            <label class="form-label required" for="description">Deksripsi Produk</label>
            <input type="text" id="description" name="description" class="form-control" placeholder="Masukkan Deskripsi Produk" required>
          </div>

          <div class=" mb-2">
            <label class="form-label required" for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan Harga Produk" required>
          </div>
          <div class=" mb-2">
            <label class="form-label required" for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Harga Produk" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Tambah Produk</button>
      </div>
      </form>
    </div>
  </div>