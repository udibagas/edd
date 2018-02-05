<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Kades[nama]') ? 'has-error' : '' ?>">
        <label for="Kades[nama]" class="control-label col-md-3">Nama</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kades[nama]"
            value="<?= set_value('Kades[nama]', isset($kades) ? $kades->nama : '') ?>"
            class="form-control"
            placeholder="Nama">

            <?= form_error('Kades[nama]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kades[nik]') ? 'has-error' : '' ?>">
        <label for="Kades[nik]" class="control-label col-md-3">NIK</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kades[nik]"
            value="<?= set_value('Kades[nik]', isset($kades) ? $kades->nik : '') ?>"
            class="form-control"
            placeholder="NIK">

            <?= form_error('Kades[nik]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kades[no_hp]') ? 'has-error' : '' ?>">
        <label for="Kades[no_hp]" class="control-label col-md-3">No HP</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kades[no_hp]"
            value="<?= set_value('Kades[no_hp]', isset($kades) ? $kades->no_hp : '') ?>"
            class="form-control"
            placeholder="No HP">

            <?= form_error('Kades[no_hp]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kades[alamat]') ? 'has-error' : '' ?>">
        <label for="Kades[alamat]" class="control-label col-md-3">ALamat</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kades[alamat]"
            value="<?= set_value('Kades[alamat]', isset($kades) ? $kades->alamat : '') ?>"
            class="form-control"
            placeholder="Alamat">

            <?= form_error('Kades[alamat]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('kades/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
