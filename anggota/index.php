<?php 
    require 'model.php';   

    $mahasiswa = getAnggota();
?>

<?php include('../layouts/header/header.php'); ?>
    <div class="container my-4">
        <div class="d-flex justify-content-between">
            <h2>Anggota</h2>
            <a href="create.php"><button class="btn btn-primary">Buat Anggota</button></a>
        </div>
        <table class="table table-bordered border-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $key => $Msiswa): ?>
                    <tr>
                        <td class="text-center"><?= $key+1; ?>.</td>
                        <td><?= $Msiswa["nama"]; ?></td>
                        <td><?= $Msiswa["email"]; ?></td>
                        <td><?= $Msiswa["alamat"]; ?></td>
                        <td><?= $Msiswa["no_telp"]; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="update.php?id_anggota=<?= $Msiswa["id_anggota"]; ?>">
                                <button class="btn btn-secondary"><i class="bi bi-pencil"></i> Edit</button>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $Msiswa["id_anggota"]; ?>"
                            ><i class="bi bi-trash"></i> Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $Msiswa["id_anggota"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-4" id="modalHapus">Apakah anda yakin ingin menghapus <?= $Msiswa['nama']; ?>?</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-5">Data yang dihapus tidak dapat dikembalikan, apakan anda yakin?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus.php?id_anggota=<?= $Msiswa['id_anggota']; ?>">
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
