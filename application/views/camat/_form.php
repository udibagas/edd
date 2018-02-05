<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Camat[nama]') ? 'has-error' : '' ?>">
        <label for="Camat[nama]" class="control-label col-md-3">Nama</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Camat[nama]"
            value="<?= set_value('Camat[nama]', isset($camat) ? $camat->nama : '') ?>"
            class="form-control"
            placeholder="Nama">

            <?= form_error('Camat[nama]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Camat[nik]') ? 'has-error' : '' ?>">
        <label for="Camat[nik]" class="control-label col-md-3">NIK</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Camat[nik]"
            value="<?= set_value('Camat[nik]', isset($camat) ? $camat->nik : '') ?>"
            class="form-control"
            placeholder="NIK">

            <?= form_error('Camat[nik]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Camat[no_hp]') ? 'has-error' : '' ?>">
        <label for="Camat[no_hp]" class="control-label col-md-3">No HP</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Camat[no_hp]"
            value="<?= set_value('Camat[no_hp]', isset($camat) ? $camat->no_hp : '') ?>"
            class="form-control"
            placeholder="No HP">

            <?= form_error('Camat[no_hp]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Camat[alamat]') ? 'has-error' : '' ?>">
        <label for="Camat[alamat]" class="control-label col-md-3">Alamat</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Camat[alamat]"
            value="<?= set_value('Camat[alamat]', isset($camat) ? $camat->alamat : '') ?>"
            class="form-control"
            placeholder="Alamat">

            <?= form_error('Camat[alamat]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('camat/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
