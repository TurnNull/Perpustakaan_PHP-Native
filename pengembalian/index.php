<?php
    require 'model.php';
    
    $pengembalian = getPengembalian();
?>

<?php include('../layouts/header/header.php'); ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2>Pengembalian</h2>
            <a href="create.php"><button class="btn btn-primary">Buat Pengembalian</button></a>
        </div>
        <table class="table table-bordered border-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Tanggal Kembali Awal</th>
                    <th scope="col">Tanggal Kembali</th>
                    <th scope="col">Status</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pengembalian as $key => $kembali): ?>
                    <tr>
                        <th class="text-center"><?= $key+1; ?>.</th>
                        <td><?= $kembali["judul"]; ?></td>
                        <td><?= $kembali["nama"]; ?></td>
                        <td><?= $kembali["no_telp"]; ?></td>
                        <td class="text-center"><?= date_format(date_create($kembali["tgl_kembali"]),"l, d-M-Y"); ?></td>
                        <td class="text-center"><?= date_format(date_create($kembali["tgl_pengembalian"]),"l, d-M-Y"); ?></td>
                        <td><?= $kembali["status"]; ?></td>
                        <td><?= $kembali["denda"]; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="update.php?id_pengembalian=<?= $kembali["id_pengembalian"]; ?>">
                                <button class="btn btn-secondary"><i class="bi bi-pencil"></i> Ubah</button>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $kembali["id_pengembalian"]; ?>"
                            ><i class="bi bi-trash"></i> Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $kembali["id_pengembalian"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-4" id="modalHapus">Apakah anda yakin ingin menghapus <?= $kembali['nama']; ?>?</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-5">Data yang dihapus tidak dapat dikembalikan, apakah anda yakin?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus.php?id_pengembalian=<?= $kembali['id_pengembalian']; ?>">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </tbody>
        </table>
    </div>
<?php include('../layouts/footer/footer.php'); ?>
