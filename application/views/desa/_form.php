<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Desa[kecamatan_id]') ? 'has-error' : '' ?>">
        <label for="Desa[kecamatan_id]" class="control-label col-md-3">Kecamatan</label>
        <div class="col-md-9">
            <select class="form-control" name="Desa[kecamatan_id]">
                <option value="">-- Pilih Kecamatan --</option>
                <?php foreach($kecamatan as $k) : ?>
                    <option value="<?= $k->id ?>" <?= set_select('Desa[kecamatan_id]', $k->id, isset($desa) ? $desa->kecamatan_id == $k->id : FALSE) ?>>
                        <?= $k->nama ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?= form_error('Desa[kecamatan_id]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('Desa[nama]') ? 'has-error' : '' ?>">
        <label for="Desa[nama]" class="control-label col-md-3">Nama Desa</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Desa[nama]"
            value="<?= set_value('Desa[nama]', isset($desa) ? $desa->nama : '') ?>"
            class="form-control"
            placeholder="Nama Desa">

            <?= form_error('Desa[nama]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('Desa[kode]') ? 'has-error' : '' ?>">
        <label for="Desa[kode]" class="control-label col-md-3">Kode</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Desa[kode]"
            value="<?= set_value('Desa[kode]', isset($desa) ? $desa->kode : '') ?>"
            class="form-control"
            placeholder="Kode Desa">

            <?= form_error('Desa[kode]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Desa[kades_id]') ? 'has-error' : '' ?>">
        <label for="Desa[kades_id]" class="control-label col-md-3">Kades</label>
        <div class="col-md-9">
            <select class="form-control" name="Desa[kades_id]">
                <option value="">-- Pilih Kades --</option>
                <?php foreach($kades as $k) : ?>
                    <option value="<?= $k->id ?>" <?= set_select('Desa[kades_id]', $k->id, isset($desa) ? $desa->kades_id == $k->id : FALSE) ?>>
                        <?= $k->nama ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?= form_error('Desa[kades_id]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('Desa[babin_id]') ? 'has-error' : '' ?>">
        <label for="Desa[babin_id]" class="control-label col-md-3">Bhabinkamtibnas</label>
        <div class="col-md-9">
            <select class="form-control" name="Desa[babin_id]">
                <option value="">-- Pilih Bhabinkamtibnas --</option>
                <?php foreach($babin as $k) : ?>
                    <option value="<?= $k->id ?>" <?= set_select('Desa[babin_id]', $k->id, isset($desa) ? $desa->babin_id == $k->id : FALSE) ?>>
                        <?= $k->label ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?= form_error('Desa[babin_id]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('desa/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
