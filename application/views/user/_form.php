<form class="form-horizontal" action="" method="post">

    <div class="form-group <?= form_error('User[username]') ? 'has-error' : '' ?>">
        <label for="User[username]" class="control-label col-md-3">Username</label>
        <div class="col-md-9">
            <input type="text" name="User[username]" value="<?= set_value('User[username]', isset($user) ? $user->username : '') ?>" class="form-control" placeholder="Username">
            <?= form_error('User[username]', '<span class="text-danger text-italic">', '</span>') ?>
        </div>
    </div>

    <?php /*
    <div class="form-group <?= form_error('User[display_name]') ? 'has-error' : '' ?>">
        <label for="User[display_name]" class="control-label col-md-3">Display Name</label>
        <div class="col-md-9">
            <input type="text" name="User[display_name]" value="<?= set_value('User[display_name]', isset($user) ? $user->display_name : '') ?>" class="form-control" placeholder="Display Name">
            <?= form_error('User[display_name]', '<span class="text-danger text-italic">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('User[email]') ? 'has-error' : '' ?>">
        <label for="User[email]" class="control-label col-md-3">Email</label>
        <div class="col-md-9">
            <input type="email" name="User[email]" value="<?= set_value('User[email]', isset($user) ? $user->email : '') ?>" class="form-control" placeholder="Email">
            <?= form_error('User[email]', '<span class="text-danger text-italic">', '</span>') ?>
        </div>
    </div>
    */ ?>

    <div class="form-group <?= form_error('password') ? 'has-error' : '' ?>">
        <label for="password" class="control-label col-md-3">Password</label>
        <div class="col-md-9">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <?= form_error('password', '<span class="text-danger text-italic">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('passconf') ? 'has-error' : '' ?>">
        <label for="passconf" class="control-label col-md-3">Confirm Password</label>
        <div class="col-md-9">
            <input type="password" name="passconf" class="form-control" placeholder="Confirm Password">
            <?= form_error('passconf', '<span class="text-danger text-italic">', '</span>') ?>
        </div>
    </div>

    <div class="form-group <?= form_error('User[active]') ? 'has-error' : '' ?>">
        <label for="User[active]" class="control-label col-md-3">Aktif</label>
        <div class="col-md-9">
            <input type="radio" name="User[active]" value="1" <?= set_radio('User[active]', '1', TRUE); ?>> Ya
            <input type="radio" name="User[active]" value="0" <?= set_radio('User[active]', '0'); ?>> Tidak
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" name="save" class="btn btn-primary">SIMPAN</button>
            <a href="<?= site_url('user/admin') ?>" class="btn btn-default">BATAL</a>
        </div>
    </div>
</form>
