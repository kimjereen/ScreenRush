<?php
session_start();

if (isset($_POST['userLogout'])) {
    $_SESSION = array();

    session_unset();
    session_destroy();
    echo "<script> alert('Logout Successful'); </script>";
    exit;
}
?>
