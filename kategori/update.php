<?php 
    require 'model.php';

    $id = $_GET["id_kategori"];
    
    $kategori = query("SELECT * FROM kategori WHERE id_kategori = $id")[0];
    
    if (isset($_POST["submit"])) {
        if (ubahKategori($_POST, $id) > 0 ) {
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
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" id="kategori" placeholder="Masukan kategori Buku" value="<?= $kategori["kategori"]; ?>" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
<?php include('../layouts/footer/footer.php'); ?>
