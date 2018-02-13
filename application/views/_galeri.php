<div class="col-md-3 col-sm-4 col-xs-6 gal-item">
    <div class="box">
        <a href="#" data-toggle="modal" data-target="#<?= $d->id ?>">
            <img src="<?= base_url($d->foto) ?>" alt="<?= $d->bentuk_fisik_bangunan ?>" />
        </a>
        <div class="modal fade" id="<?= $d->id ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <div class="modal-body">
                        <img src="<?= base_url($d->foto) ?>" alt="<?= $d->bentuk_fisik_bangunan ?>" />
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>: Kecamatan <?= $d->kecamatan ?>, Desa <?= $d->desa ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Bangunan</td>
                                    <td>: <?= $d->bentuk_fisik_bangunan ?></td>
                                </tr>
                                <tr>
                                    <td>Agggaran Biaya</td>
                                    <td>: Rp <?= number_format($d->anggaran_biaya, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Realisasi Biaya</td>
                                    <td>: Rp <?= number_format($d->realisasi_biaya, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Sisa Anggaran</td>
                                    <td>: Rp <?= number_format($d->anggaran_biaya - $d->realisasi_biaya, 0, ',', '.') ?></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>: <?= $d->keterangan ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p>
        <strong><?= $d->bentuk_fisik_bangunan ?></strong><br>
        <?= $d->kecamatan ?>, <?= $d->desa ?><br>
        <span class="label label-success">Rp <?= number_format($d->realisasi_biaya, 0, ',', '.') ?></span>
    </p>
</div>
