<?php
session_start();
if ($_POST) {
    include "koneksi.php";
    $qry_get_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_GET['id_paket'] . "'");
    $dt_paket = mysqli_fetch_array($qry_get_paket);
    $qry_get_member=mysqli_query($conn,"select * from member where nama_member='".$nama_member."'");
    $dt_member=mysqli_fetch_array($qry_get_member);

    $_SESSION['keranjang'][] = array(
        'id_member'=>$dt_member['id_member'],
        'nama_member'=>$dt_member['nama_member'],
        'id_paket' => $dt_paket['id_paket'],
        'nama_paket' => $dt_paket['nama_paket'],
        'harga' => $dt_paket['harga'],
        'qty' => $_POST['jumlah_beli']
        
    );
}
header('location: keranjang.php');