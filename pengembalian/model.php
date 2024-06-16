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

    function getPengembalian() {
        global $conn;
        $pengembalian = mysqli_query($conn, "SELECT pengembalian.id_pengembalian, peminjaman.id_anggota, peminjaman.id_buku,
                                             buku.judul, anggota.nama, anggota.no_telp,
                                             peminjaman.tgl_kembali, pengembalian.tgl_kembali AS tgl_pengembalian, 
                                             status.status, pengembalian.denda
                                             FROM pengembalian
                                             JOIN peminjaman
                                             ON pengembalian.id_peminjaman = peminjaman.id_peminjam
                                             JOIN anggota
                                             ON peminjaman.id_anggota = anggota.id_anggota
                                             JOIN buku
                                             ON peminjaman.id_buku = buku.id_buku
                                             JOIN status
                                             ON pengembalian.id_status = status.id_status
                                             ORDER BY peminjaman.tgl_kembali DESC");

        if (!$pengembalian) {
            echo mysqli_error($conn);
        }

        return $pengembalian;
    }

    function createPengembalian($data) {
        global $conn;
        $id_peminjaman = htmlspecialchars($data["id_peminjaman"]);
        $tgl_kembali = htmlspecialchars($data["tgl_kembali"]);
        $id_status = htmlspecialchars($data["id_status"]);
        $denda = htmlspecialchars($data["denda"]);

        $query = "INSERT INTO pengembalian
                VALUES('', $id_peminjaman, '$tgl_kembali', $id_status, '$denda')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    function ubahPengembalian($data, $id) {
        global $conn;
        $id_peminjaman = htmlspecialchars($data["id_peminjaman"]);
        $tgl_kembali = htmlspecialchars($data["tgl_kembali"]);
        $id_status = htmlspecialchars($data["id_status"]);
        $denda = htmlspecialchars($data["denda"]);

        $query = "UPDATE pengembalian SET 
                  id_peminjaman=$id_peminjaman, tgl_kembali='$tgl_kembali',
                  id_status=$id_status, denda=$denda 
                  WHERE id_pengembalian=$id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function deletePengembalian($id) {
        global $conn;
        $query = "DELETE FROM pengembalian WHERE id_pengembalian=$id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>