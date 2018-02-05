<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline pull-right" action="<?= site_url('babin/admin') ?>" method="get">
            <a href="<?= site_url('babin/create')?>" class="btn btn-primary">TAMBAH BABHINKAMTIBNAS</a>
            <input type="text" name="q" value="<?= $this->input->get('q') ?>" class="form-control" placeholder="Cari babin">
            <a href="<?= site_url('babin/admin') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></a>
        </form>
        <h3>BABHINKAMTIBNAS <small>Kelola</small></h3>
        <div class="clearfix"> </div>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Pangkat</th>
                    <th>NRP</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $this->uri->segment(3); foreach ($babin as $d) : $i++ ?>
                <tr>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d->nama ?></td>
                    <td><?= $d->pangkat ?></td>
                    <td><?= $d->nrp ?></td>
                    <td><?= $d->no_hp ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('babin/edit/'. $d->id) ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= site_url('babin/delete/'. $d->id) ?>" class="confirm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?= $this->pagination->create_links(); ?>
    </div>
</div>
