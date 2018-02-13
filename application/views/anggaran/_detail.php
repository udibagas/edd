<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Bentuk Fisik Bangunan</th>
            <th>Anggaran Biaya</th>
            <th>Realisasi Biaya</th>
            <th>Sisa</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total_anggaran = 0;
            $total_realisasi = 0;
        ?>
        <?php $i = 1; foreach ($detail as $d) : ?>
            <?php
                $total_anggaran += $d->anggaran_biaya;
                $total_realisasi += $d->realisasi_biaya;
            ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $d->bentuk_fisik_bangunan ?></td>
                <td class="text-right">Rp <?= number_format($d->anggaran_biaya, '0', ',', '.') ?></td>
                <td class="text-right">Rp <?= number_format($d->realisasi_biaya, '0', ',', '.') ?></td>
                <td class="text-right">Rp <?= number_format($d->sisa, '0', ',', '.') ?></td>
                <td><?= $d->keterangan ?></td>
                <td class="text-center">
                    <a href="<?= site_url('detailAnggaran/edit/'. $d->id) ?>" title="Edit"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="<?= site_url('detailAnggaran/delete/'. $d->id) ?>" class="confirm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>TOTAL</th>
            <th class="text-right">Rp <?= number_format($total_anggaran, '0', ',', '.') ?></th>
            <th class="text-right">Rp <?= number_format($total_realisasi, '0', ',', '.') ?></th>
            <th class="text-right">Rp <?= number_format($total_anggaran - $total_realisasi, '0', ',', '.') ?></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>

<div class="row">
    <?php foreach ($detail as $d) : if (!$d->foto) continue; ?>
        <?php $this->load->view('_galeri', ['d' => $d]) ?>
    <?php endforeach ?>
</div>
