<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="icon" href="../../favicon.ico">

    <title><?= $this->title ?></title>
	<link rel="image_src" href="<?= $this->image ?>" />

	<meta property="og:url" content="<?= current_url() ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?= $this->title ?>" />
	<meta property="og:site_name" content="PONPES TAHFIDZ UMMAHATUL MU'MININ" />
	<meta property="og:description" content="<?= $this->description ?>" />
	<meta property="og:image" content="<?= $this->image ?>" />

	<!-- for Twitter -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="<?= $this->title ?>" />
	<meta name="twitter:description" content="<?= $this->description ?>" />
	<meta name="twitter:image" content="<?= $this->image ?>" />

	<meta name="author" content="POLRES KATINGAN KALTENG" />
	<meta name="description" content="<?= $this->description ?>" />
	<meta name="keyword" content="anggaran, dana, desa, anggaran dana desa, dana desa, add, katingan, kalteng, kalimantan, kalimantan tengah" />
	<meta name="copyright" content="Copyright <?= date('Y') ?> by edd-polreskatingan.com" />
	<meta name="language" content="id" />
	<meta name="distribution" content="Global" />
	<meta name="rating" content="General" />
	<meta name="robots" content="index,follow" />
	<meta name="googlebot" content="index,follow" />

	<meta name="revisit-after" content="1 days" />
	<meta name="expires" content="never" />
	<meta name="dc.title" content="edd-polreskatingan.com" />
	<meta name="dc.creator.e-mail" content="udibagas@gmail.com" />
	<meta name="dc.creator.name" content="Bagas Udi Sahsangka" />
	<meta name="dc.creator.website" content="http://edd-polreskatingan.com" />
	<meta name="tgn.name" content="Katingan" />
	<meta name="tgn.nation" content="Indonesia" />

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url() ?>assets/css/ie10.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/main.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/galeri.css" rel="stylesheet">

    <script src="<?= base_url('assets/hc/code/highcharts.js') ?>"></script>
    <script src="<?= base_url('assets/hc/code/modules/exporting.js') ?>"></script>

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
          <a class="navbar-brand" href="<?= site_url() ?>">EDD KABUPATEN KATINGAN</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?= site_url() ?>"><i class="glyphicon glyphicon-home"></i> BERANDA</a></li>
            <li><a href="<?= site_url('galeri') ?>">GALERI</a></li>
            <li><a href="<?= site_url('about') ?>">TENTANG KAMI</a></li>
            <li><a href="<?= site_url('contact') ?>">HUBUNGI KAMI</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

        <ol class="breadcrumb">
            <li><a href="<?= site_url() ?>"><i class="glyphicon glyphicon-home"></i></a></li>
            <?php foreach ($this->breadcrumbs as $url => $label) : ?>
            <li><a href="<?= site_url($url) ?>"><?= $label ?></a></li>
            <?php endforeach ?>
        </ol>

        <?= $content ?>

        <hr>
        <p class="text-muted text-right">
            &copy; <?= date('Y') ?> - POLRES KATINGAN
        </p>
        <br>
        <br>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?= base_url('assets/js/vendor/jquery.min.js') ?>"><\/script>')</script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>
