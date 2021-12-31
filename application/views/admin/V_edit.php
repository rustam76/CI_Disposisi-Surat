<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Siakad</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sistem Informasi Mahasiswa Akademik Kampus</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Input Surat Masuk
                            </div>
                            <?php foreach ($surat as $row) {?>
                            <div class="card-body">
                                <?= form_open_multipart('Surat/update'); ?>
                                <div class="form-group">
                                    <input type="text" name="kode" value="<?=$row->kd_surat?>"  class="form-control">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="nama" value="<?=$row->nm_surat;?>"  class="form-control">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" name="perihal" value="<?=$row->perihal;?>" class="form-control">
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <input type="date" name="tgl"  value="<?=$row->tgl_surat;?>"  class="form-control">
                                </div>
                            </div>

                            <div class="card-body">
                                
                                <button type="submit" class="btn btn-success mt-3">update</button>
                                <?= form_close(); ?>

                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </main>