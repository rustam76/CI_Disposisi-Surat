<div id="layoutSidenav_content">
	<main>
		<div class="container-fluid px-4">
			<h1 class="mt-4">Kirim</h1>
			<ol class="breadcrumb mb-4">
				<li class="breadcrumb-item active">Form Kirim Data Surat</li>
			</ol>
			<div class="card mb-4">
				<div class="card-header">
					<i class="fas fa-table me-1"></i>
					Data Surat
				</div>
				<div class="card-body">
					<?= form_open('Dinas/pegawai'); ?>
					<div class="card-body">
						<div class="form-group">
							<input type="hidden" name="kd_surat" value="<?= $this->uri->segment(4) ?>">
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<select name="nip_sub" class="form-control">
								<option value="">--Pilih Tujuan --</option>
								<?php foreach ($pegawai as $row) { ?>
									<option value="<?= $row->nip_sub ?>"><?= $row->nama_sub ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<textarea name="ket" class="form-control"></textarea>
						</div>
					</div>
					<div class="card-body">
						<button type="submit" class="btn btn-success mt-3">Kirim</button>
					</div>

					<?= form_close(); ?>

				</div>
			</div>
	</main>