<?php

require("../../../model/account/function.php");

$registered = register($_POST);
if ($registered > 0) {
    echo "
    <script>
        alert('Register Succesful!!!');
        document.location.href= '../../../view/account/login/';
    </script>";
} else {
    echo "
    <script>
        alert('Register Unsuccesful!!!');
        document.location.href= '../../../view/account/register';
    </script>";
}

?>