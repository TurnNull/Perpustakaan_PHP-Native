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

    function getKategori() {
        global $conn;
        $kategori = mysqli_query($conn, "SELECT * FROM kategori");
    
        if (!$kategori) {
            echo mysqli_error($conn);
        }

        return $kategori;
    }

    function createKategori($data) {
        global $conn;
        $kategori = htmlspecialchars($data["kategori"]);

        $query = "INSERT INTO kategori VALUES('', '$kategori')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    function ubahKategori($data, $id) {
        global $conn;
        $kategori = htmlspecialchars($data["kategori"]);

        $query = "UPDATE kategori SET kategori='$kategori'
                 WHERE id_kategori=$id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function deleteKategori($id) {
        global $conn;
        $query = "DELETE FROM kategori WHERE id_kategori = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>