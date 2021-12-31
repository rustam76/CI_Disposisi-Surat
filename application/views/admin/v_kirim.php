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
					<?= form_open('Dinas/tambah'); ?>
					<div class="card-body">
						<div class="form-group">
							<input type="hidden" name="kd_surat" value="<?= $this->uri->segment(3) ?>">
						</div>
					</div>
					<div class="card-body">
						<div class="form-group">
							<select name="nip_dinas" class="form-control">
								<option value="">--Pilih Tujuan --</option>
								<?php foreach ($dinas as $baris) { ?>
									<option value="<?= $baris->nip_dinas ?>"><?= $baris->nama_dinas ?></option>
								<?php } ?>
							</select>
						</div>

					</div>
					<div class="card-body">
						<button type="submit" class="btn btn-success mt-3">Kirim</button>
					</div>

					<?= form_close(); ?>

				</div>
			</div>
	</main>