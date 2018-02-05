<h3>
    GALERI
    <small>Foto bangunan fisik pemanfaatan anggaran dana desa</small>
</h3>
<hr>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4>TAG</h4>
                <hr>

                <?php foreach ($galeri as $d) : if (!$d->foto) continue; ?>
                    <a href="<?= site_url('galeri?tag='.$d->bentuk_fisik_bangunan) ?>" class="btn btn-default">
                        <?= $d->desa ?>
                    </a>
                <?php endforeach ?>

            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            <?php foreach ($galeri as $d) : if (!$d->foto) continue; ?>
                <div class="col-md-3 col-sm-4 col-xs-6 gal-item">
                    <div class="box">
                        <a href="#" data-toggle="modal" data-target="#<?= $d->id ?>">
                            <img src="<?= base_url($d->foto) ?>" alt="<?= $d->bentuk_fisik_bangunan ?>" />
                            <h3 class="text-center"><?= $d->bentuk_fisik_bangunan ?></h3>
                        </a>
                        <div class="modal fade" id="<?= $d->id ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    <div class="modal-body">
                                        <img src="<?= base_url($d->foto) ?>" alt="<?= $d->bentuk_fisik_bangunan ?>" />
                                        <h3 class="text-center"><?= $d->bentuk_fisik_bangunan ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
