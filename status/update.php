<?php 
    require 'model.php';

    $id = $_GET['id_status'];
    $status = query("SELECT * FROM status WHERE id_status=$id")[0];

    if (isset($_POST["submit"])) {
        if (ubahStatus($_POST, $id) > 0 ) {
            echo "<script>
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
                <label for="status" class="form-label">Status</label>
                <input type="text" name="status" class="form-control" id="status" placeholder="Masukan status Buku" value="<?= $status["status"]; ?>">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
<?php include('../layouts/footer/footer.php'); ?>
