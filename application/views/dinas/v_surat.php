<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">SIMASDIK Kepala Dinas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">()Sistem Informasi Manajemen Surat Dinas Kesehatan)</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Table Data Surat Masuk
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Nama Instansi</th>
                                <th>Perihal</th>
                                <th>Tanggal Masuk</th>
                                <th>File Surat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Nama Instansi</th>
                                <th>Perihal</th>
                                <th>Tanggal Masuk</th>
                                <th>File Surat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $nomor = 1;
                            foreach ($surat as $row) : ?>
                                <tr>
                                    <td><?= $nomor; ?></td>
                                    <td><?= $row->kd_surat; ?></td>
                                    <td><?= $row->nm_surat; ?></td>
                                    <td><?= $row->perihal; ?></td>
                                    <td><?= $row->tgl_surat; ?></td>
                                    <td><?= $row->file; ?></td>
                                    <td>Proses</td>
                                    <td class="text-center" style="vertical-align: middle;">
                                        <a href="<?= base_url('assets/file/' . $row->file) ?>" class="btn btn-sm btn-info">Lihat</a>
                                        <a href="<?= base_url('user/Home/kirim/' . $row->kd_surat) ?>" class="btn btn-sm btn-success">Disposisi</a>
                                    </td>
                                </tr>
                            <?php $nomor++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>