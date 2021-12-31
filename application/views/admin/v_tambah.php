<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">ADMIN SIMASDIK</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">(Sistem Informasi Manajemen Surat Dinas Kesehatan)</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Input Surat Masuk
                </div>
                <div class="card-body">
                    <?= form_open_multipart('Home/simpan'); ?>
                    <div class="form-group">
                        <input type="text" name="kode" placeholder="Masukkan Nomor Surat" class="form-control">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="nama" placeholder="Masukkan Nama Instansi" class="form-control">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="perihal" placeholder="Masukkan Perihal" class="form-control">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="date" name="tgl" placeholder="Masukkan tanggal masuk surat" class="form-control">
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="file" placeholder="Masukkan file" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </main>