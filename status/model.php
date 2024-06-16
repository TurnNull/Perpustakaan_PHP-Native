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

    function getStatus() {
        global $conn;
        $status = mysqli_query($conn, "SELECT * FROM status");
    
        if (!$status) {
            echo mysqli_error($conn);
        }

        return $status;
    }

    function createStatus($data) {
        global $conn;
        $status = htmlspecialchars($data["status"]);

        $query = "INSERT INTO status VALUES('', '$status')";
        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);
    }

    function ubahStatus($data, $id) {
        global $conn;
        $status = htmlspecialchars($data["status"]);

        $query = "UPDATE status SET status='$status'
                 WHERE id_status=$id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }


    function deleteStatus($id) {
        global $conn;
        $query = "DELETE FROM status WHERE id_status = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>