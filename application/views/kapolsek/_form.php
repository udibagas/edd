<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Kapolsek[nama]') ? 'has-error' : '' ?>">
        <label for="Kapolsek[nama]" class="control-label col-md-3">Nama</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kapolsek[nama]"
            value="<?= set_value('Kapolsek[nama]', isset($kapolsek) ? $kapolsek->nama : '') ?>"
            class="form-control"
            placeholder="Nama">

            <?= form_error('Kapolsek[nama]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kapolsek[pangkat]') ? 'has-error' : '' ?>">
        <label for="Kapolsek[pangkat]" class="control-label col-md-3">Pangkat</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kapolsek[pangkat]"
            value="<?= set_value('Kapolsek[pangkat]', isset($kapolsek) ? $kapolsek->pangkat : '') ?>"
            class="form-control"
            placeholder="Pangkat">

            <?= form_error('Kapolsek[pangkat]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kapolsek[nrp]') ? 'has-error' : '' ?>">
        <label for="Kapolsek[nrp]" class="control-label col-md-3">NRP</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kapolsek[nrp]"
            value="<?= set_value('Kapolsek[nrp]', isset($kapolsek) ? $kapolsek->nrp : '') ?>"
            class="form-control"
            placeholder="NRP">

            <?= form_error('Kapolsek[nrp]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kapolsek[no_hp]') ? 'has-error' : '' ?>">
        <label for="Kapolsek[no_hp]" class="control-label col-md-3">No HP</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kapolsek[no_hp]"
            value="<?= set_value('Kapolsek[no_hp]', isset($kapolsek) ? $kapolsek->no_hp : '') ?>"
            class="form-control"
            placeholder="No HP">

            <?= form_error('Kapolsek[no_hp]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('kapolsek/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
