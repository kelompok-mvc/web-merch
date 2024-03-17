<form class="card" action="<?= BASEURL; ?>/membership/update" method="post">
    <div class="card-body">
        <div class="row">
            <input type="hidden" name="id_membership" value="<?= $data['membership']['id_membership']; ?>"> <!-- Tambahkan input tersembunyi untuk id_product -->
            <div class="mb-3">
                <label class="form-label required">Tipe Member</label>
                <input type="text" id="type" name="type" class="form-control" placeholder="Masukkan tipe member" value="<?= $data['membership']['type']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label required">Diskon</label>
                <input type="text" id="discon" name="discon" class="form-control" placeholder="Masukkan discon" value="<?= $data['membership']['discon']; ?>" required>
            </div>
        </div>
    </div>

    <div class="card-footer text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
