<?php
    require 'model.php';

    $id = $_GET["id_buku"];
    $kategori = query("SELECT * FROM kategori");
    $buku = query("SELECT * FROM buku WHERE id_buku = $id")[0];

    if (isset($_POST["submit"])) {
        if (ubahBuku($_POST, $id) > 0 ) {
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
                <label for="judul" class="form-label">Judul</label>
                <input type="text"  name="judul" class="form-control" id="judul" placeholder="Masukan Judul Buku" value="<?= $buku["judul"]; ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" name="pengarang"  class="form-control" id="pengarang" placeholder="Masukan Pengarang" value="<?= $buku["pengarang"]; ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text"  name="penerbit" class="form-control" id="penerbit" placeholder="Masukan Penerbit" value="<?= $buku["penerbit"]; ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="date" name="tahun_terbit"  class="form-control" id="tahun_terbit" placeholder="Masukan Tahun Terbit" value="<?= $buku["tahun_terbit"]; ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="id_kategori" class="form-label">Kategori</label>
                <select class="form-select" name="id_kategori" id="id_kategori" required>
                    <option value="">Pilih Kategori</option>
                    <?php foreach($kategori as $ktgr): ?>
                        <option value="<?= $ktgr["id_kategori"]; ?>" 
                        <?= $buku["id_kategori"] === $ktgr["id_kategori"] ? 'selected' : '' ?>>
                            <?= $ktgr["kategori"]; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
<?php include('../layouts/footer/footer.php'); ?>
