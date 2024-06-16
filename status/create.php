<?php 
    require 'model.php';

    if (isset($_POST["submit"])) {
        if (createStatus($_POST) > 0 ) {
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
                <input type="text" name="status" class="form-control" id="status" placeholder="Masukan status Buku">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
<?php include('../layouts/footer/footer.php'); ?>
