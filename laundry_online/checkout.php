<?php 
    session_start();
    include "koneksi.php";
    $keranjang=@$_SESSION['keranjang'];
    if(count($keranjang)>0){
        $status='baru';
        $pembayaran='belum bayar';
        $lama_laundry=3; //satuan hari
        $tgl_selesai=date('Y-m-d',mktime(0,0,0,date('m'),(date('d')+$lama_laundry),date('Y')));
        mysqli_query($conn,"insert into transaksi (id_member,tanggal,batas_waktu,status,dibayar,id_user) value('".$_SESSION['id_member']."','".date('Y-m-d')."','".$tgl_selesai."','".$status."','".$pembayaran."','".$_SESSION['id_user']."')");
         $id=mysqli_insert_id($conn);
        foreach ($keranjang as $key_paket => $val_paket) {
            $subtotal=$val_paket['qty'] * $val_paket['harga'];
            mysqli_query($conn,"insert into detail_transaksi (id_transaksi,id_paket,qty,subtotal) value('".$id."','".$val_paket['id_paket']."','".$val_paket['qty']."','".$subtotal."')");
        }
        unset($_SESSION['keranjang']);
        echo '<script>alert("Anda berhasil checkout");location.href="histori.php"</script>';
    }
?>