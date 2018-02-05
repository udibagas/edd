<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline pull-right" action="<?= site_url('anggaran/admin') ?>" method="get">
            <a href="<?= site_url('anggaran/create')?>" class="btn btn-primary">TAMBAH ANGGARAN</a>
            <input type="text" name="q" value="<?= $this->input->get('q') ?>" class="form-control" placeholder="Cari anggaran">
            <a href="<?= site_url('anggaran/admin')?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></a>
        </form>
        <h3>ANGGARAN <small>Kelola</small></h3>
        <div class="clearfix"> </div>
        <hr>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tahun</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $this->uri->segment(3); foreach ($anggaran as $d) : $i++ ?>
                <tr>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $d->tahun ?></td>
                    <td><?= $d->desa ?></td>
                    <td><?= $d->kecamatan ?></td>
                    <td class="text-left">Rp <?= number_format($d->jumlah, '0', ',', '.') ?></td>
                    <td class="text-center">
                        <a href="<?= site_url('anggaran/edit/'. $d->id) ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="<?= site_url('anggaran/delete/'. $d->id) ?>" class="confirm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>

        <?= $this->pagination->create_links(); ?>

    </div>
</div>
