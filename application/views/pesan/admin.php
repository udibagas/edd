<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline pull-right" action="<?= site_url('pesan/admin') ?>" method="get">
            <input type="text" name="q" placeholder="Cari Pesan" class="form-control" value="<?= $this->input->get('q') ?>">
            <a href="<?= site_url('pesan/admin') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="<?= site_url('/pesan/setting') ?>" class="btn btn-primary" title="Setting">
                <i class="glyphicon glyphicon-wrench"></i>
            </a>
        </form>
        <h3>PESAN MASUK <small>Kelola</small></h3>
        <hr>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subyek</th>
                    <th>Pesan</th>
                    <th>Pengirim</th>
                    <th>Email/No HP</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $this->uri->segment(3); foreach($pesans as $p) : $i++; ?>
                <tr class="<?= $p->view ? '' : 'info' ?>">
                    <td><?= $i ?></td>
                    <td>
                        <a href="/pesan/show/<?= $p->id ?>">
                            <?= $p->subyek ?>
                        </a>
                    </td>
                    <td><?= word_limiter($p->pesan, 10) ?></td>
                    <td><?= $p->nama ?></td>
                    <td>
                        <a href="mailto:<?= $p->email ?>"><?= $p->email ?></a><br>
                        <?= $p->phone ?>
                    </td>
                    <td><?= date('d-M-Y H:i', strtotime($p->waktu)) ?></td>
                    <td>
                        <div class="btn-group">
                            <a href="/pesan/balas/<?= $p->id ?>" class="btn btn-primary btn-sm" title="Balas">
                                <i class="fa fa-reply"></i>
                            </a>
                            <a href="/pesan/delete/<?= $p->id ?>" class="confirm btn btn-danger btn-sm" title="Hapus">
                                <i class="fa fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <?= $this->pagination->create_links(); ?>
    </div>
</div>
