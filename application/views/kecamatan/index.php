<h3 class="text-center">
    LAPORAN ANGGARAN DANA DESA KABUPATEN KATINGAN TAHUN <?= $tahun ?>
</h3>
<hr>

<table class="table table-striped table-bordered">
    <tbody>
        <tr>
            <th style="width:250px;">TAHUN ANGGARAN</th>
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
            <th>TOTAL ANGGARAN</th>
            <td>Rp <?= number_format($total_anggaran->nilai, 0, ',', '.') ?></td>
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

<div class="alert alert-info">
    <p>Pilih kecamatan untuk melihat detail laporan Anggaran Dana Desa di kecamatan terkait.</p>
</div>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>NAMA KECAMATAN</th>
            <th>NAMA CAMAT</th>
            <th>NAMA KAPOLSEK</th>
            <th>JUMLAH ANGGARAN</th>
            <th>REALISASI BIAYA</th>
            <th>SISA ANGGARAN</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $total_anggaran = 0;
            $total_realisasi = 0;
        ?>
        <?php $i = 1; foreach ($kecamatan as $k): ?>
        <tr>
            <?php
                $total_anggaran += $k->anggaran;
                $total_realisasi += $k->realisasi;
            ?>
            <td><?= $i++ ?></td>
            <td>
                <a href="<?= site_url("kecamatan/show/".$k->id."?tahun=".$tahun) ?>"> <?= strtoupper($k->nama) ?> </a>
            </td>
            <td><?= $k->camat ?></td>
            <td><?= $k->kapolsek ?></td>
            <td class="text-right">Rp <?= number_format($k->anggaran, 0, ',', '.') ?></td>
            <td class="text-right">Rp <?= number_format($k->realisasi, 0, ',', '.') ?></td>
            <td class="text-right">Rp <?= number_format($k->anggaran - $k->realisasi, 0, ',', '.') ?></td>
        </tr>
        <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>TOTAL</th>
            <th></th>
            <th></th>
            <th class="text-right">Rp <?= number_format($total_anggaran, 0, ',', '.') ?></th>
            <th class="text-right">Rp <?= number_format($total_realisasi, 0, ',', '.') ?></th>
            <th class="text-right">Rp <?= number_format($total_anggaran - $total_realisasi, 0, ',', '.') ?></th>
        </tr>
    </tfoot>
</table>

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
            <?php foreach ($kecamatan as $k) : ?>
            '<?= $k->nama ?>',
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
            <?php foreach ($kecamatan as $k) : ?>
            <?= $k->anggaran ? $k->anggaran : 0 ?>,
            <?php endforeach ?>
        ]

    }, {
        type: 'column',
        name: 'Realisasi',
        data: [
            <?php foreach ($kecamatan as $k) : ?>
            <?= $k->realisasi ? $k->realisasi : 0 ?>,
            <?php endforeach ?>
        ]

    },/* {
        type: 'column',
        name: 'Sisa',
        data: [
            <?php foreach ($kecamatan as $k) : ?>
            <?= $k->anggaran - $k->realisasi ?>,
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
