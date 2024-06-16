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

    function getAnggota() {
        global $conn;
        $mahasiswa = mysqli_query($conn, "SELECT * FROM anggota");
    
        if (!$mahasiswa) {
            echo mysqli_error($conn);
        }

        return $mahasiswa;
    }

    function createAnggota($data) {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $notelp = htmlspecialchars($data["notelp"]);

        $query = "INSERT INTO anggota
                VALUES('', '$nama', '$email', '$alamat', '$notelp')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    function ubahAnggota($data, $id) {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $notelp = htmlspecialchars($data["notelp"]);

        $query = "UPDATE anggota SET nama='$nama', email='$email', alamat='$alamat', no_telp='$notelp'
                    WHERE id_anggota=$id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function deleteAnggota($id) {
        global $conn;
        $query = "DELETE FROM anggota WHERE id_anggota = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>