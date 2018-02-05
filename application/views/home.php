<div class="alert alert-info">
    <p>Pilih kecamatan untuk melihat detail laporan Anggaran Dana Desa di kecamatan terkait.</p>
</div>
<hr>

<div class="list-group">
    <?php foreach ($kecamatan as $k): ?>
        <a href="<?= site_url("kecamatan/show/".$k->id) ?>" class="list-group-item">
            <h4><?= $k->nama ?></h4>
        </a>
    <?php endforeach ?>
</div>
