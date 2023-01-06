<?php
if($_POST){
    $id_user=$_POST['id_user'];
    $nama_user = $_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    
    if(empty($nama_user)){
        echo "<script>alert('nama tidak boleh kosong');location.href='ubah_user.php?id_user=".$id_user."';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='ubah_user.php?id_user=".$id_user."';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='ubah_user.php?id_user=".$id_user."';</script>";
    }  elseif(empty($role)){
        echo "<script>alert('role tidak boleh kosong');location.href='ubah_user.php?id_user=".$id_user."';</script>";
    }else {
        include "koneksi.php";
        
        $update = mysqli_query($conn, "update user set nama='" . $nama_user . "', username='" . $username . "', password='" . md5($password) . "', role='" . $role . "' where id_user = '" . $id_user . "' ") or die(mysqli_error($conn));
        if($update){
            echo "<script>alert('Sukses update user');location.href='tampil_user.php';</script>";
        } else {
            echo "<script>alert('Gagal update user');location.href='ubah_user.php?id_user=".$id_user."';</script>";
        
    }
        
    } 
}
?>