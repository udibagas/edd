<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-right btn-group">
            <!-- <a href="<?= site_url('pesan/balas/'.$pesan->id) ?>" class="btn btn-info btn-sm" title="Balas">
                <i class="fa fa-reply"></i>
            </a> -->
            <a href="<?= site_url('pesan/delete/'.$pesan->id) ?>" class="btn btn-danger btn-sm confirm" title="Hapus">
                <i class="glyphicon glyphicon-trash"></i>
            </a>
        </div>
        <h3><?= $pesan->subyek ?></h3>
    </div>
    <div class="panel-body">
        <strong><?= $pesan->nama ?></strong> <br>
        <span class="text-muted">
            Email : <a href="mailto:<?= $pesan->email ?>"><?= $pesan->email ?></a>, No HP: <?= $pesan->no_hp ?><br>
            <?= date('d-M-Y H:i', strtotime($pesan->waktu)) ?>
        </span>

        <hr>

        <p> <?= nl2br($pesan->pesan) ?> </p>
    </div>
</div>
