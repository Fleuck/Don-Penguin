<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: ../TelaLogin/telalogin.html");
    exit();
}
?>
