<?php 
    require 'model.php';

    if (isset($_POST["submit"])) {
        if (createAnggota($_POST) > 0 ) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo "<script>
                    alert('data gagal ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
        }
    }
?>

<?php include('../layouts/header/header.php'); ?>

    <div class="container mt-4">
        <form method="post">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Anggota" required>
            </div>
            <div class="mb-3 col-6">
                <label for="email" class="form-label">Emali</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email" required>
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat" required>
            </div>
            <div class="mb-3 col-6">
                <label for="notelp" class="form-label">Nomor Telpon</label>
                <input type="text" name="notelp" class="form-control" id="notelp" placeholder="Masukan Nomor Telpon" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary"><i  class="bi bi-check-lg"></i> Kirim</button>
        </form>
    </div>

<?php include('../layouts/footer/footer.php'); ?>