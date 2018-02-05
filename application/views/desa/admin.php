<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline pull-right" action="<?= site_url('desa/admin') ?>" method="get">
            <a href="<?= site_url('desa/create')?>" class="btn btn-primary">TAMBAH DESA</a>
            <input type="text" name="q" value="<?= $this->input->get('q') ?>" class="form-control" placeholder="Cari desa">
            <a href="<?= site_url('desa/admin')?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></a>
        </form>
        <h3>DESA <small>Kelola</small></h3>
        <div class="clearfix"> </div>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kades</th>
                    <th>Bhabinkamtibnas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $this->uri->segment(3); foreach ($desa as $d) : $i++ ?>
                <tr>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d->nama ?></td>
                    <td><?= $d->kecamatan ?></td>
                    <td><?= $d->kades ?></td>
                    <td><?= $d->babin ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('desa/edit/'. $d->id) ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= site_url('desa/delete/'. $d->id) ?>" class="confirm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?= $this->pagination->create_links(); ?>
    </div>
</div>
