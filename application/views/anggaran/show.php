<h3 class="text-center">LAPORAN ANGGARAN DANA DESA <?= strtoupper($desa->nama) ?></h3>
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
            <td><?= $anggaran ? $anggaran->tahun : '' ?></td>
        </tr>
        <tr>
            <th>JUMLAH ANGGARAN</th>
            <td><?= $anggaran ? $anggaran->jumlah : '' ?></td>
        </tr>
    </tbody>
</table>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>BENTUK FISIK BANGUNAN</th>
            <th>REALISASI BIAYA</th>
            <th>SISA ANGGARAN</th>
            <th>KETERANGAN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th></th>
            <th>TOTAL</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>
