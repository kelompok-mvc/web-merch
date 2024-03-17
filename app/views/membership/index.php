<div class="">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Menambahkan Membership
            </button>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipe Membership</th>
                        <th>Diskon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['membership'] as $key => $membership) : ?>
                        <tr>
                            <th scope="row"><?= ($key + 1); ?></th>
                            <td><?= $membership['type']; ?></td>
                            <td><?= $membership['discon']; ?></td>
                            <td>
                                <a style="margin-bottom: 2px;" class="btn btn-success btn-sm py-1 px-2 halUpdate" href="<?= BASEURL; ?>/membership/edit/<?= $membership['id_membership']; ?>" data-id="<?= $membership['id_membership'] ?>">Edit</a>

                                <a style="margin-bottom: 2px;" class="btn btn-danger btn-sm py-1 px-2" href="<?= BASEURL; ?>/membership/delete/<?= $membership['id_membership']; ?>" onclick="return confirm('Apakah Kamu Yakin Menghapus Data <?= $membership['type']; ?>')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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

                <form action="<?= BASEURL; ?>/membership/add" method="post">

                    <div class=" mb-2">
                        <label class="form-label required" for="type">Tipe membership</label>
                        <input type="text" id="type" name="type" class="form-control" placeholder="Masukkan Membership" required>
                    </div>

                    <div class=" mb-2">
                        <label class="form-label required" for="discon">Diskon</label>
                        <input type="text" id="discon" name="discon" class="form-control" placeholder="Masukkan Diskon" required>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Membership</button>
            </div>

            </form>
        </div>
    </div>