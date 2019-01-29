<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "db_mmovdb";

$conn = mysqli_connect($host, $user, $pass, $db);

function register($data) {
    global $conn;

    $id = "acc-".substr(uniqid(), 3);
    $user = strtolower(htmlspecialchars($data["username"]));
    $pass = $data["password"];
    $date = $data["date"];
    
    $result = mysqli_query($conn, "SELECT * FROM account WHERE username = '$user' ");
    if ( mysqli_fetch_assoc($result) ) {
        echo "
        <script>
            alert('Username Already Taken!!');
            document.location.href= '../../../view/account/register';
        </script>";
        return false;
    }


    $sql = "INSERT INTO account VALUES ('$id','$user','$pass','$date')";
    $result = mysqli_query($conn, $sql);
    
    return mysqli_affected_rows($conn);
}

?>