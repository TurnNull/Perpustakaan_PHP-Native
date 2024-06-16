<?php 
    require 'model.php';

    $id = $_GET['id_peminjam'];
    $peminjaman = query("SELECT * FROM peminjaman WHERE id_peminjam=$id")[0];
    $buku = query("SELECT * FROM buku");
    $anggota = query("SELECT * FROM anggota");

    if(isset($_POST["submit"])) {
        if(ubahPeminjaman($_POST, $id) > 0) {
            echo "
                <script>
                    alert('data berhasil ditambahkan!');
                    document.location.href = 'index.php';
                </script>";
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
        <form action="" method="post">
            <div class="mb-3 col-6">
                <label for="id_buku" class="form-label">Buku</label>
                <select class="form-select" name="id_buku" id="id_buku" required>
                    <option value="" selected>Pilih Buku</option>
                    <?php foreach($buku as $bk): ?>
                        <option value="<?= $bk["id_buku"]; ?>" <?= $peminjaman["id_buku"] === $bk["id_buku"] ? "selected" : '' ; ?>>
                            <?= $bk["judul"]; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="id_anggota" class="form-label">Anggota</label>
                <select class="form-select" name="id_anggota" id="id_anggota" required>
                    <option value="" selected>Pilih anggota</option>
                    <?php foreach($anggota as $agt): ?>
                        <option value="<?= $agt["id_anggota"]; ?>" <?= $peminjaman["id_anggota"] === $agt["id_anggota"] ? "selected" : ''; ?>>
                            <?= $agt["nama"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date"  name="tgl_pinjam" class="form-control" id="tgl_pinjam" value="<?= $peminjaman["tgl_pinjam"]; ?>" required>
            </div>
            <div class="mb-3 col-6">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date"  name="tgl_kembali" class="form-control" id="tgl_kembali" value="<?= $peminjaman["tgl_kembali"]; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
<?php include('../layouts/footer/footer.php'); ?>
