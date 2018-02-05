<h3>HUBUNGI KAMI</h3>
<hr>

<div class="alert alert-info">
    <p>
        Untuk kritik dan saran mengenai aplikasi ini silakan kirimkan email ke <a href="mailto:admin@edd-polreskatingan.com">admin@edd-polreskatingan.com</a> atau dengan mengisi form di bawah ini.
    </p>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-body">
                <h4>KIRIM PESAN</h4>
                <hr>
				<?php if ($this->session->flashdata('sukses')) : ?>
					<div class="alert alert-info text-center">
						<strong><?= $this->session->flashdata('sukses') ?></strong>
					</div>
				<?php else : ?>
					<?php $this->load->view('pesan/_form') ?>
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
            <div class="panel-body">
                <h4>POLRES KATINGAN</h4>
                <hr>
                Jln Bhayangkara No.01
            </div>
		</div>
	</div>
</div>
