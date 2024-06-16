<?php 
    require '../koneksi.php';   
    require 'model.php';   

    $kategori = getKategori();
?>


<?php include('../layouts/header/header.php'); ?>
    <div class="container mt-4 col-5">
        <div class="d-flex justify-content-between">
            <h2>Kategori</h2>
            <a href="create.php"><button class="btn btn-primary">Buat Kategori</button></a>
        </div>
        <table class="table table-bordered border-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($kategori as $key => $ktgr) : ?>
                    <tr>
                        <th><?= $key+1; ?></th>
                        <td><?= $ktgr["kategori"]; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="update.php?id_kategori=<?= $ktgr["id_kategori"]; ?>">
                                <button class="btn btn-secondary"><i class="bi bi-pencil"></i> Edit</button>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $ktgr["id_kategori"]; ?>"><i class="bi bi-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    
                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalHapus<?= $ktgr["id_kategori"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-4" id="modalHapus">Apakah anda yakin ingin menghapus <?= $ktgr['kategori']; ?>?</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-5">Data yang dihapus tidak dapat dikembalikan, apakan anda yakin?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus.php?id_kategori=<?= $ktgr['id_kategori']; ?>">
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
