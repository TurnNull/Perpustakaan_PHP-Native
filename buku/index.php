<?php
    require 'model.php';

    $buku = getBuku();
?>

<?php include('../layouts/header/header.php'); ?>
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2>Buku</h2>
            <a href="create.php"><button class="btn btn-primary">Buat Buku</button></a>
        </div>
        <table class="table table-bordered border-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pengarang</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($buku as $key => $bk): ?>
                    <tr>
                        <td class="text-center"><?= $key+1; ?>.</td>
                        <td><?= $bk["judul"]; ?></td>
                        <td><?= $bk["pengarang"]; ?></td>
                        <td><?= $bk["penerbit"]; ?></td>
                        <td><?= date('Y', strtotime($bk["tahun_terbit"])); ?></td>
                        <td><?= $bk["kategori"]; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="update.php?id_buku=<?= $bk["id_buku"]; ?>">
                                <button class="btn btn-secondary"><i class="bi bi-pencil"></i> Edit</button>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $bk["id_buku"]; ?>"
                            ><i class="bi bi-trash"></i> Hapus</button>
                        </td>
                    </tr>

                    <!-- Modal Hapus -->
                    <div class="modal fade" id="modalHapus<?= $bk["id_buku"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-4" id="modalHapus">Apakah anda yakin ingin menghapus <?= $bk['judul']; ?>?</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-5">Data yang dihapus tidak dapat dikembalikan, apakah anda yakin?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus.php?id_buku=<?= $bk['id_buku']; ?>">
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