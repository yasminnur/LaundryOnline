<?php
session_start();
unset($_SESSION['keranjang'][$_GET['id_paket']]);
header('location: keranjang.php');
