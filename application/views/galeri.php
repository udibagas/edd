<form class="form-inline pull-right" action="" method="get">
    <input type="hidden" name="kecamatan_id" value="<?= $this->input->get('kecamatan_id') ?>">
    <input type="text" name="q" value="<?= $this->input->get('q') ?>" class="form-control search-field" placeholder="Cari..."> &nbsp;
    <a href="<?= site_url('galeri') ?>" class="btn btn-primary search-field"><i class="glyphicon glyphicon-refresh"></i></a>
</form>

<h3>
    GALERI
    <small>Foto bangunan fisik pemanfaatan anggaran dana desa</small>
</h3>
<hr>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">KECAMATAN</h3>
            </div>
            <div class="list-group">
                <a href="<?= site_url('galeri') ?>" class="list-group-item <?= !$this->input->get('kecamatan_id') ? 'active' : '' ?>">
                    SEMUA KECAMATAN
                </a>
                <?php foreach ($kecamatan as $k) : ?>
                    <a href="<?= site_url('galeri?kecamatan_id='.$k->id.'&q='.$this->input->get('q')) ?>" class="list-group-item <?= $this->input->get('kecamatan_id') == $k->id ? 'active' : '' ?>">
                        <?= strtoupper($k->nama) ?>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <?php if ($filter_kecamatan || $this->input->get('q')) : ?>
            <div class="alert alert-info">
                Gambar untuk
                <?php if ($this->input->get('q')): ?>
                    kata kunci <strong><u><?= $this->input->get('q') ?></u></strong>
                <?php endif ?>
                <?php if ($filter_kecamatan): ?>
                    kecamatan <strong><u><?= $filter_kecamatan->nama ?></u></strong>
                <?php endif ?>
            </div>
        <?php endif ?>
        <div class="row">
            <?php foreach ($galeri as $d) : if (!$d->foto) continue; ?>
                <?php $this->load->view('_galeri', ['d' => $d]) ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
