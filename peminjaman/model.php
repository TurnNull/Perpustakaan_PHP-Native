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

    function getPeminjaman() {
        global $conn;
        $peminjaman = mysqli_query($conn, "SELECT peminjaman.id_peminjam, buku.judul, buku.pengarang, anggota.nama,
                                           anggota.no_telp, peminjaman.tgl_pinjam, peminjaman.tgl_kembali
                                           FROM peminjaman
                                           JOIN buku
                                           ON peminjaman.id_buku = buku.id_buku
                                           JOIN anggota
                                           ON peminjaman.id_anggota = anggota.id_anggota
                                           ORDER BY buku.judul");
    
        if (!$peminjaman) {
            echo mysqli_error($conn);
        }

        return $peminjaman;
    }

    function createPeminjaman($data) {
        global $conn;
        $id_buku = htmlspecialchars($data["id_buku"]);
        $id_anggota = htmlspecialchars($data["id_anggota"]);
        $tgl_pinjam = htmlspecialchars($data["tgl_pinjam"]);
        $tgl_kembali = htmlspecialchars($data["tgl_kembali"]);

        $query = "INSERT INTO peminjaman
                VALUES('', '$id_buku', '$id_anggota', '$tgl_pinjam', '$tgl_kembali')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    function ubahPeminjaman($data, $id) {
        global $conn;
        $id_buku = htmlspecialchars($data["id_buku"]);
        $id_anggota = htmlspecialchars($data["id_anggota"]);
        $tgl_pinjam = htmlspecialchars($data["tgl_pinjam"]);
        $tgl_kembali = htmlspecialchars($data["tgl_kembali"]);

        $query = "UPDATE peminjaman SET id_buku='$id_buku', id_anggota='$id_anggota', tgl_pinjam='$tgl_pinjam',
                 tgl_kembali='$tgl_kembali'
                 WHERE id_peminjam=$id";
        mysqli_query($conn, $query);    

        return mysqli_affected_rows($conn);
    }


    function deletePeminjaman($id) {
        global $conn;
        $query = "DELETE FROM peminjaman WHERE id_peminjam = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>