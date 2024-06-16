<?php
    require 'model.php';

    $id = $_GET['id_kategori'];

    if (deleteKategori($id) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus!');
                document.location.href = 'index.php';
            </script>";
    } else {
        echo "<script>
                alert('data gagal dihapus!');
                document.location.href = 'index.php';
            </script>";
        
    }
?>