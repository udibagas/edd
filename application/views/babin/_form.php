<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Babin[nama]') ? 'has-error' : '' ?>">
        <label for="Babin[nama]" class="control-label col-md-3">Nama</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Babin[nama]"
            value="<?= set_value('Babin[nama]', isset($babin) ? $babin->nama : '') ?>"
            class="form-control"
            placeholder="Nama">

            <?= form_error('Babin[nama]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Babin[pangkat]') ? 'has-error' : '' ?>">
        <label for="Babin[pangkat]" class="control-label col-md-3">Pangkat</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Babin[pangkat]"
            value="<?= set_value('Babin[pangkat]', isset($babin) ? $babin->pangkat : '') ?>"
            class="form-control"
            placeholder="Pangkat">

            <?= form_error('Babin[pangkat]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Babin[nrp]') ? 'has-error' : '' ?>">
        <label for="Babin[nrp]" class="control-label col-md-3">NRP</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Babin[nrp]"
            value="<?= set_value('Babin[nrp]', isset($babin) ? $babin->nrp : '') ?>"
            class="form-control"
            placeholder="NRP">

            <?= form_error('Babin[nrp]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Babin[no_hp]') ? 'has-error' : '' ?>">
        <label for="Babin[no_hp]" class="control-label col-md-3">No HP</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Babin[no_hp]"
            value="<?= set_value('Babin[no_hp]', isset($babin) ? $babin->no_hp : '') ?>"
            class="form-control"
            placeholder="No HP">

            <?= form_error('Babin[no_hp]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('babin/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
