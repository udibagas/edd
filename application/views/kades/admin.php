<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline pull-right" action="<?= site_url('kades/admin') ?>" method="get">
            <a href="<?= site_url('kades/create')?>" class="btn btn-primary">TAMBAH KADES</a>
            <input type="text" name="q" value="<?= $this->input->get('q') ?>" class="form-control" placeholder="Cari kades">
            <a href="<?= site_url('kades/admin') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></a>
        </form>
        <h3>KADES <small>Kelola</small></h3>
        <div class="clearfix"> </div>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $this->uri->segment(3); foreach ($kades as $d) : $i++ ?>
                <tr>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d->nama ?></td>
                    <td><?= $d->nik ?></td>
                    <td><?= $d->no_hp ?></td>
                    <td><?= $d->alamat ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('kades/edit/'. $d->id) ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= site_url('kades/delete/'. $d->id) ?>" class="confirm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?= $this->pagination->create_links(); ?>
    </div>
</div>
