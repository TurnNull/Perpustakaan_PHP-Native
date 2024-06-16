<?php 
    $conn = mysqli_connect('localhost', 'root', 'root', 'perpustakaan');

    if ($conn->connect_errno) {
        echo "Koneksi Error";
        exit;
    }
?>