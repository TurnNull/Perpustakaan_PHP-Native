<?php 
    require 'model.php';   

    $status = getStatus();
?>

<?php include('../layouts/header/header.php'); ?>
    <div class="container mt-4 col-5">
        <div class="d-flex justify-content-between">
            <h2>Status</h2>
            <a href="create.php"><button class="btn btn-primary">Buat Status</button></a>
        </div>
        <table class="table table-bordered border-primary mt-3">
            <thead>
                <tr class="text-center">
                    <th scope="col">No.</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($status as $key => $sts) : ?>
                    <tr>
                        <th><?= $key+1; ?></th>
                        <td><?= $sts["status"]; ?></td>
                        <td class="d-flex justify-content-evenly">
                            <a href="update.php?id_status=<?= $sts["id_status"]; ?>">
                                <button class="btn btn-secondary"><i class="bi bi-pencil"></i> Edit</button>
                            </a>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $sts["id_status"]; ?>"><i class="bi bi-trash"></i> Hapus</button>
                        </td>
                    </tr>
                    
                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalHapus<?= $sts["id_status"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title fs-4" id="modalHapus">Apakah anda yakin ingin menghapus <?= $sts['status']; ?>?</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="fs-5">Data yang dihapus tidak dapat dikembalikan, apakan anda yakin?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <a href="hapus.php?id_status=<?= $sts['id_status']; ?>">
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
