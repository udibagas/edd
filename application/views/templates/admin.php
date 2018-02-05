<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>EDD KATINGAN</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url() ?>assets/css/ie10.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/galeri.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= site_url() ?>">ADMIN PANEL - EDD KABUPATEN KATINGAN</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?= site_url('logout') ?>">Logout (<?= $this->session->userdata('username') ?>)</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
        <ol class="breadcrumb">
            <li><a href="<?= site_url('dashboard') ?>"><i class="glyphicon glyphicon-home"></i></a></li>
            <?php foreach ($this->breadcrumbs as $url => $label) : ?>
            <li><a href="<?= site_url($url) ?>"><?= $label ?></a></li>
            <?php endforeach ?>
        </ol>

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="<?= site_url('admin') ?>" class="list-group-item">DASHBOARD</a>
                    <a href="<?= site_url('kecamatan/admin') ?>" class="list-group-item">KECAMATAN</a>
                    <a href="<?= site_url('desa/admin') ?>" class="list-group-item">DESA</a>
                    <a href="<?= site_url('kapolsek/admin') ?>" class="list-group-item">KAPOLSEK</a>
                    <a href="<?= site_url('camat/admin') ?>" class="list-group-item">CAMAT</a>
                    <a href="<?= site_url('babin/admin') ?>" class="list-group-item">BHABINKAMTIBNAS</a>
                    <a href="<?= site_url('kades/admin') ?>" class="list-group-item">KADES</a>
                    <a href="<?= site_url('anggaran/admin') ?>" class="list-group-item">ANGGARAN</a>
                    <a href="<?= site_url('user/admin') ?>" class="list-group-item">USER</a>
                    <a href="<?= site_url('pesan/admin') ?>" class="list-group-item">PESAN</a>
                </div>
            </div>
            <div class="col-md-9">
                <?php if ($this->session->flashdata('sukses')) : ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('sukses') ?>
                    </div>
                <?php endif ?>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>
                <?= $content ?>
            </div>
        </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url('assets/js/vendor/jquery.min.js') ?>"><\/script>')</script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

    <script type="text/javascript">
        $('.confirm').click(function() {
            return (confirm('Apakah anda yakin?'));
        });
    </script>
  </body>
</html>
