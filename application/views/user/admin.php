<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-inline pull-right" action="<?= site_url('user/admin') ?>" method="get">
            <a href="<?= site_url('user/create') ?>" class="btn btn-primary" title="Tambah User">
                Tambah User
            </a>
            <input type="text" name="q" placeholder="Cari User" class="form-control" value="<?= $this->input->get('q') ?>">
            <a href="<?= site_url('user/admin') ?>" class="btn btn-primary"><i class="glyphicon glyphicon-refresh"></i></a>
        </form>
        <h3>USER</h3>
        <hr>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Username</th>
                    <th class="text-center">Aktif</th>
                    <th class="text-center" style="width:100px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $this->uri->segment(3); foreach($users as $p) : $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $p->username ?></td>
                    <td class="text-center"><?= $p->active ? 'Y' : 'T' ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="<?= site_url('user/edit/'.$p->id) ?>" title="edit"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="<?= site_url('user/delete/'.$p->id) ?>" class="confirm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
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
