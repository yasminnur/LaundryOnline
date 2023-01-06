<?php
include "koneksi.php";
$update_status = mysqli_query($conn, "update transaksi set dibayar = 'sudah bayar', tanggal_bayar= '".date('Y-m-d')."' where id_transaksi = '".$_GET['id_transaksi']."'");
if($update_status){
    echo "<script>alert('Sukses mengupdate pembayaran');location.href='histori.php';</script>";
} else{
    echo "<script>alert('Gagal mengupdate pembayaran');location.href='histori.php';</script>";
}
?>