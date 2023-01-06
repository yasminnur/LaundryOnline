<?php 
if($_GET['id']){
    include "koneksi.php";
    $id_transaksi=$_GET['id'];
   // $cek_bayar=mysqli_query($conn, "select * from transaksi where id_transaksi = '".$id_transaksi."' ");
  // mssql_query(“UPDATE torder   SET         status_order      = ‘$_POST[status_order]’WHERE id_order = ‘$_POST[id]’”);
   mysqli_query($conn, "update transaksi set dibayar = ‘$_POST[dibayar]’ WHERE id_transaksi = ‘$_POST[id]’”");
  // (id_member, tanggal, batas_waktu, status, dibayar, id_user) value('" . $id_member . "', '" . date('Y-m-d') . "','" . $batas_waktu . "','" . $status . "', '" . $dibayar . "','" . $id_user . "')");
   // mysqli_query($conn, "insert into transaksi(id_member, tanggal, batas_waktu, status, dibayar, id_user) value('" . $id_member . "', '" . date('Y-m-d') . "','" . $batas_waktu . "','" . $status . "', '" . $dibayar . "','" . $id_user . "')");
    header('location: histori.php');
}
?>
