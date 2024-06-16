<?php 
    require 'model.php';

    $id = $_GET["id_anggota"];
    
    $mahasiswa = query("SELECT * FROM anggota WHERE id_anggota = $id")[0];
    
    if (isset($_POST["submit"])) {
        if (ubahAnggota($_POST, $id) > 0 ) {
            echo "<script>
                    alert('data berhasil diubah!');
                    document.location.href = 'index.php';
                </script>";
        } else {
            echo "<script>
                    alert('data gagal diubah!');
                    document.location.href = 'index.php';
                </script>";
        }
    }
?>
<?php include('../layouts/header/header.php'); ?>
    <div class="container mt-4">
        <form action="" method="post">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Anggota" value="<?= $mahasiswa["nama"]; ?>" required>
            </div>
            <div class="mb-3 col-6">
                <label for="email" class="form-label">Emali</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" value="<?= $mahasiswa["email"]; ?>" required>
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukan Alamat" value="<?= $mahasiswa["alamat"]; ?>" required>
            </div>
            <div class="mb-3 col-6">
                <label for="notelp" class="form-label">Nomor Telpon</label>
                <input type="text" class="form-control" name="notelp" id="notelp" placeholder="Masukan Nomor Telpon" value="<?= $mahasiswa["no_telp"]; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
<?php include('../layouts/footer/footer.php'); ?>