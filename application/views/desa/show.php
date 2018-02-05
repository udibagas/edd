<h3 class="text-center">LAPORAN ANGGARAN DANA DESA <?= strtoupper($desa->nama) ?> TAHUN <?= $anggaran ? $anggaran->tahun : '' ?></h3>
<hr>

<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th style="width:250px;">NAMA KECAMATAN</th>
            <td><?= strtoupper($desa->kecamatan) ?></td>
        </tr>
        <tr>
            <th style="width:250px;">NAMA DESA</th>
            <td><?= strtoupper($desa->nama) ?></td>
        </tr>
        <tr>
            <th>NAMA KADES</th>
            <td><?= $desa->kades ?></td>
        </tr>
        <tr>
            <th>NAMA BHABINKAMTIBNAS</th>
            <td><?= $desa->babin ?></td>
        </tr>
        <tr>
            <th>TAHUN ANGGARAN</th>
            <td>
                <form class="form-inline" action="" method="get">
                    <select class="form-control" name="tahun">
                        <?php foreach ($tahun_anggaran as $t) : ?>
                        <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
                        <?php endforeach ?>
                    </select>
                    <button type="submit" name="show" class="btn btn-primary">TAMPILKAN</button>
                </form>
            </td>
        </tr>
        <tr>
            <th>JUMLAH ANGGARAN</th>
            <td><?= $anggaran ? 'Rp '.number_format($anggaran->jumlah, 0, ',', '.') : '' ?></td>
        </tr>
    </tbody>
</table>

<div class="panel panel-default">
    <div class="panel-body" id="chart" style="height:300px;">
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-body" id="chart1" style="height:300px;">
    </div>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Bentuk Fisik Bangunan</th>
            <th>Anggaran Biaya</th>
            <th>Realisasi Biaya</th>
            <th>Sisa</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total_anggaran = 0;
            $total_realisasi = 0;
        ?>
        <?php $i = 1; foreach ($detail_anggaran as $d) : ?>
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
        </tr>
    </tfoot>
</table>

<div class="row">
    <?php foreach ($detail_anggaran as $d) : if (!$d->foto) continue; ?>
    <div class="col-md-3 col-sm-4 col-xs-6 gal-item">
        <div class="box">
            <a href="#" data-toggle="modal" data-target="#<?= $d->id ?>">
                <img src="<?= base_url($d->foto) ?>" alt="<?= $d->bentuk_fisik_bangunan ?>" />
                <h3 class="text-center"><?= $d->bentuk_fisik_bangunan ?></h3>
            </a>
            <div class="modal fade" id="<?= $d->id ?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <div class="modal-body">
                            <img src="<?= base_url($d->foto) ?>" alt="<?= $d->bentuk_fisik_bangunan ?>" />
                            <h3 class="text-center"><?= $d->bentuk_fisik_bangunan ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>

<script type="text/javascript">

Highcharts.chart('chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: null
        // text: 'ANGGARAN DANA DESA KABUPATEN KATINGAN TAHUN <?= $tahun ?>',
    },
    // subtitle: {
    //     text: 'Source: WorldClimate.com'
    // },
    xAxis: {
        categories: [
            <?php foreach ($detail_anggaran as $k) : ?>
            '<?= $k->bentuk_fisik_bangunan ?>',
            <?php endforeach ?>
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Biaya (Rp)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp {point.y:,.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        type: 'column',
        name: 'Anggaran',
        data: [
            <?php foreach ($detail_anggaran as $k) : ?>
            <?= $k->anggaran_biaya ?>,
            <?php endforeach ?>
        ]

    }, {
        type: 'column',
        name: 'Realisasi',
        data: [
            <?php foreach ($detail_anggaran as $k) : ?>
            <?= $k->realisasi_biaya ?>,
            <?php endforeach ?>
        ]

    },/* {
        type: 'column',
        name: 'Sisa',
        data: [
            <?php foreach ($detail_anggaran as $k) : ?>
            <?= $k->anggaran_biaya - $k->realisasi_biaya ?>,
            <?php endforeach ?>
        ]

    },*/]
});

Highcharts.chart('chart1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Penyerapan Dana Desa Kabupaten Katingan Tahun <?= $tahun ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Dana Desa',
        colorByPoint: true,
        data: [{
            name: 'Realisasi Anggaran',
            y: <?= $total_realisasi / $total_anggaran ?>,
            // sliced: true,
            // selected: true
        }, {
            name: 'Sisa Anggaran',
            y: <?= ($total_anggaran - $total_realisasi) / $total_anggaran ?>,
        }]
    }]
});

</script>
