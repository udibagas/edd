<div class="panel panel-default">
    <div class="panel-body">
        <h4 class="text-center">LOGIN</h4>
        <hr>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger text-center">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif ?>
        <form class="form-vertical" action="" method="post">
            <div class="form-group">
                <input type="text" name="username" value="<?= set_value('useraname') ?>" class="form-control" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <button type="submit" name="login" class="btn btn-primary form-control">LOGIN</button>
            </div>
        </form>
    </div>
</div>
