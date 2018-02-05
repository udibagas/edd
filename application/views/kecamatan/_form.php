<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Kecamatan[nama]') ? 'has-error' : '' ?>">
        <label for="Kecamatan[nama]" class="control-label col-md-3">Nama</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kecamatan[nama]"
            value="<?= set_value('Kecamatan[nama]', isset($kecamatan) ? $kecamatan->nama : '') ?>"
            class="form-control"
            placeholder="Nama Kecamatan">

            <?= form_error('Kecamatan[nama]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('Kecamatan[kode]') ? 'has-error' : '' ?>">
        <label for="Kecamatan[kode]" class="control-label col-md-3">Kode</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Kecamatan[kode]"
            value="<?= set_value('Kecamatan[kode]', isset($kecamatan) ? $kecamatan->kode : '') ?>"
            class="form-control"
            placeholder="Kode Kecamatan">

            <?= form_error('Kecamatan[kode]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kecamatan[camat_id]') ? 'has-error' : '' ?>">
        <label for="Kecamatan[camat_id]" class="control-label col-md-3">Camat</label>
        <div class="col-md-9">
            <select class="form-control" name="Kecamatan[camat_id]">
                <option value="">-- Pilih Camat --</option>
                <?php foreach($camat as $k) : ?>
                    <option value="<?= $k->id ?>" <?= set_select('Kecamatan[camat_id]', $k->id, isset($kecamatan) ? $kecamatan->camat_id == $k->id : FALSE) ?>>
                        <?= $k->nama ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?= form_error('Kecamatan[camat_id]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Kecamatan[kapolsek_id]') ? 'has-error' : '' ?>">
        <label for="Kecamatan[kapolsek_id]" class="control-label col-md-3">Kapolsek</label>
        <div class="col-md-9">
            <select class="form-control" name="Kecamatan[kapolsek_id]">
                <option value="">-- Pilih Kapolsek --</option>
                <?php foreach($babin as $k) : ?>
                    <option value="<?= $k->id ?>" <?= set_select('Kecamatan[kapolsek_id]', $k->id, isset($kecamatan) ? $kecamatan->kapolsek_id == $k->id : FALSE) ?>>
                        <?= $k->label ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?= form_error('Kecamatan[kapolsek_id]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('kecamatan/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
