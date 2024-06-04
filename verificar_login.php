<?php
session_start();

$timeout = 1800;

if (!isset($_SESSION['userID'])) {
    header("Location: ../TelaLogin/telalogin.html");
    exit();
}

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout) {
    session_unset();
    session_destroy();
    echo "<script>";
    echo "alert('Sua sessão expirou!');";
    echo "</script>";
    header("Location: ../TelaLogin/telalogin.html");
    exit();
}

$_SESSION['last_activity'] = time();
?>
