<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="DetailAnggaran[anggaran_id]" value="<?= $anggaran->id ?>">
    <div class="form-group">
        <label for="" class="control-label col-md-3">Tahun</label>
        <div class="col-md-9">
            <input type="text" name="tahun" value="<?= $anggaran->tahun ?>" class="form-control" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label col-md-3">Desa</label>
        <div class="col-md-9">
            <input type="text" name="desa" value="<?= $anggaran->desa ?>" class="form-control" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="control-label col-md-3">Kecamatan</label>
        <div class="col-md-9">
            <input type="text" name="kecamatan" value="<?= $anggaran->kecamatan ?>" class="form-control" disabled>
        </div>
    </div>
    <div class="form-group <?= form_error('DetailAnggaran[bentuk_fisik_bangunan]') ? 'has-error' : '' ?>">
        <label for="DetailAnggaran[bentuk_fisik_bangunan]" class="control-label col-md-3">Bentuk Fisik Bangunan</label>
        <div class="col-md-9">
            <input
            type="text"
            name="DetailAnggaran[bentuk_fisik_bangunan]"
            value="<?= set_value('DetailAnggaran[bentuk_fisik_bangunan]', isset($detail_anggaran) ? $detail_anggaran->bentuk_fisik_bangunan : '') ?>"
            class="form-control"
            placeholder="Bentuk Fisik Bangunan">

            <?= form_error('DetailAnggaran[bentuk_fisik_bangunan]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('DetailAnggaran[anggaran_biaya]') ? 'has-error' : '' ?>">
        <label for="DetailAnggaran[anggaran_biaya]" class="control-label col-md-3">Anggaran Biaya</label>
        <div class="col-md-9">
            <input
            type="text"
            name="DetailAnggaran[anggaran_biaya]"
            value="<?= set_value('DetailAnggaran[anggaran_biaya]', isset($detail_anggaran) ? $detail_anggaran->anggaran_biaya : '') ?>"
            class="form-control"
            placeholder="Anggaran Biaya">

            <?= form_error('DetailAnggaran[anggaran_biaya]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('DetailAnggaran[realisasi_biaya]') ? 'has-error' : '' ?>">
        <label for="DetailAnggaran[realisasi_biaya]" class="control-label col-md-3">Realisasi Biaya</label>
        <div class="col-md-9">
            <input
            type="text"
            name="DetailAnggaran[realisasi_biaya]"
            value="<?= set_value('DetailAnggaran[realisasi_biaya]', isset($detail_anggaran) ? $detail_anggaran->realisasi_biaya : '') ?>"
            class="form-control"
            placeholder="Realisasi Biaya">

            <?= form_error('DetailAnggaran[realisasi_biaya]', '<span class="text-danger">', '</span>') ?>
        </div>
    </div>
    <div class="form-group <?= form_error('DetailAnggaran[keterangan]') ? 'has-error' : '' ?>">
        <label for="DetailAnggaran[keterangan]" class="control-label col-md-3">Keterangan</label>
        <div class="col-md-9">
            <input
            type="text"
            name="DetailAnggaran[keterangan]"
            value="<?= set_value('DetailAnggaran[keterangan]', isset($detail_anggaran) ? $detail_anggaran->keterangan : '') ?>"
            class="form-control"
            placeholder="Keterangan">
        </div>
    </div>

    <div class="form-group <?= form_error('DetailAnggaran[foto]') ? 'has-error' : '' ?>">
        <label for="DetailAnggaran[foto]" class="control-label col-md-3">Foto</label>
        <div class="col-md-9">
            <input
            type="file"
            name="foto"
            class="form-control">
            <?php if (isset($detail_anggaran) && $detail_anggaran->foto) : ?>
                <div style="height:300px;margin:15px 0;">
                    <img src="<?= base_url($detail_anggaran->foto) ?>" alt="<?= $detail_anggaran->bentuk_fisik_bangunan ?>" class="thumbnail cover" />
                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <?php if (isset($detail_anggaran) && $detail_anggaran->foto) : ?>
                <a href="<?= site_url('detailAnggaran/hapus_foto/'.$detail_anggaran->id) ?>" class="confirm btn btn-danger">HAPUS FOTO</a>
            <?php endif ?>
            <a href="<?= site_url('anggaran/edit/'.$anggaran->id) ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
