<form class="form-vertical" action="" method="post">
    <div class="form-group">
        <input type="text" name="Pesan[nama]" value="<?= set_value('Pesan[nama]') ?>" class="form-control" placeholder="Nama">
        <?= form_error('Pesan[nama]', '<span class="text-danger text-italic">', '</span>') ?>
    </div>
    <div class="form-group">
        <input type="email" name="Pesan[email]" value="<?= set_value('Pesan[email]') ?>" class="form-control" placeholder="Email">
        <?= form_error('Pesan[email]', '<span class="text-danger text-italic">', '</span>') ?>
    </div>
    <div class="form-group">
        <input type="text" name="Pesan[no_hp]" value="<?= set_value('Pesan[no_hp]') ?>" class="form-control" placeholder="Nomor telepon yang bisa dihubungi">
        <?= form_error('Pesan[no_hp]', '<span class="text-danger text-italic">', '</span>') ?>
    </div>
    <div class="form-group">
        <input type="text" name="Pesan[subyek]" value="<?= set_value('Pesan[subyek]') ?>" class="form-control" placeholder="Subyek Pesan">
        <?= form_error('Pesan[subyek]', '<span class="text-danger text-italic">', '</span>') ?>
    </div>
    <div class="form-group">
        <textarea name="Pesan[pesan]" rows="8" class="form-control" placeholder="Isi Pesan"><?= set_value('Pesan[pesan]') ?></textarea>
        <?= form_error('Pesan[pesan]', '<span class="text-danger text-italic">', '</span>') ?>
    </div>
    <div class="form-group">
        <button type="submit" name="send" class="btn btn-primary">
            <i class="fa fa-send"></i> KIRIM PESAN
        </button>
    </div>
</form>
