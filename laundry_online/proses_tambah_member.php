<?php
if ($_POST) {
    $nama = $_POST['nama_member'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $telepon = $_POST['telepon'];

    if (empty($nama)) {
        echo "<script>alert('nama member tidak boleh kosong');location.href='tambah_member.php';</script>";
    } elseif (empty($alamat)) {
        echo "<script>alert('alamat tidak boleh kosong');location.href='tambah_member.php';</script>";
    } elseif (empty($jenis_kelamin)) {
        echo "<script>alert('jenis kelamin tidak boleh kosong');location.href='tambah_member.php';</script>";
    } elseif (empty($telepon)) {
        echo "<script>alert('nomor telepon tidak boleh kosong');location.href='tambah_member.php';</script>";
    } else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "insert into member (nama_member, alamat, jenis_kelamin, telepon) value ('" . $nama . "','" . $alamat . "','" . $jenis_kelamin . "','" . $telepon . "')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan member');location.href='tampil_member.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan member');location.href='tambah_member.php';</script>";
        }
    }
}
