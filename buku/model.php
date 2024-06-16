<?php 
    require '../koneksi.php';

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        
        while($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    function getBuku() {
        global $conn;
        $buku = mysqli_query($conn, "SELECT buku.id_buku, buku.judul, buku.pengarang,
                                     buku.penerbit, buku.tahun_terbit, kategori.kategori 
                                     FROM buku
                                     LEFT JOIN kategori
                                     ON buku.id_kategori = kategori.id_kategori
                                     ORDER BY buku.judul");
    
        if (!$buku) {
            echo mysqli_error($conn);
        }

        return $buku;
    }

    function createBuku($data) {
        global $conn;
        $judul = htmlspecialchars($data["judul"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
        $id_kategori = htmlspecialchars($data["id_kategori"]);

        $query = "INSERT INTO buku
                VALUES('', '$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$id_kategori')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    function ubahBuku($data, $id) {
        global $conn;
        $judul = htmlspecialchars($data["judul"]);
        $pengarang = htmlspecialchars($data["pengarang"]);
        $penerbit = htmlspecialchars($data["penerbit"]);
        $tahun_terbit = htmlspecialchars($data["tahun_terbit"]);
        $id_kategori = htmlspecialchars($data["id_kategori"]);

        $query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit',
                 tahun_terbit='$tahun_terbit', id_kategori='$id_kategori'
                 WHERE id_buku=$id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function deleteBuku($id) {
        global $conn;
        $query = "DELETE FROM buku WHERE id_buku = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>