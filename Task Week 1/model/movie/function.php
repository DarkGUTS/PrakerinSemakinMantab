<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "db_mmovdb";
    $conn = mysqli_connect($host, $user, $pass, $db);

    function takeAllData($sql) {
        global $conn;
        $query  = mysqli_query($conn, $sql);
        while ( $row = mysqli_fetch_assoc($query) ) {
            $allRow[] = $row;
        }
        return $allRow;
    }

    function takeOneData($sql) {
        global $conn;
        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
        return $result;
    }


    function checkID($id) {
        global $conn;
        $sql = "SELECT * FROM mov_lib WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
        return mysqli_num_rows($query);
    }

?>