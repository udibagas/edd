<form class="form-horizontal" action="" method="post">
    <div class="form-group <?= form_error('Anggaran[tahun]') ? 'has-error' : '' ?>">
        <label for="Anggaran[tahun]" class="control-label col-md-3">Tahun</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Anggaran[tahun]"
            value="<?= set_value('Anggaran[tahun]', isset($anggaran) ? $anggaran->tahun : '') ?>"
            class="form-control"
            placeholder="Tahun">

            <?= form_error('Anggaran[tahun]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('Anggaran[desa_id]') ? 'has-error' : '' ?>">
        <label for="Anggaran[desa_id]" class="control-label col-md-3">Desa</label>
        <div class="col-md-9">
            <select class="form-control" name="Anggaran[desa_id]">
                <option value="">-- Pilih Desa --</option>
                <?php foreach($desa as $k) : ?>
                    <option value="<?= $k->id ?>" <?= set_select('Anggaran[desa_id]', $k->id, isset($anggaran) ? $anggaran->desa_id == $k->id : FALSE) ?>>
                        <?= $k->nama ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?= form_error('Anggaran[desa_id]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('Anggaran[jumlah]') ? 'has-error' : '' ?>">
        <label for="Anggaran[jumlah]" class="control-label col-md-3">Jumlah</label>
        <div class="col-md-9">
            <input
            type="text"
            name="Anggaran[jumlah]"
            value="<?= set_value('Anggaran[jumlah]', isset($anggaran) ? $anggaran->jumlah : '') ?>"
            class="form-control"
            placeholder="Jumlah">

            <?= form_error('Anggaran[jumlah]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <?php if (isset($anggaran)) : ?>
                <a href="<?= site_url('detailAnggaran/create?anggaran_id='.$anggaran->id)?>" class="btn btn-info">
                    TAMBAH DETAIL ANGGARAN
                </a>
            <?php endif ?>
            <a href="<?= site_url('anggaran/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
