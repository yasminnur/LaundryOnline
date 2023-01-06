<?php
if ($_POST) {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $role = $_POST['role'];
    $nama = $_POST['nama'];
    if (empty($username)) {
        echo "<script> alert('Username tidak boleh kosong'); location.href='login.php'; </script>";
    } elseif (empty($pass)) {
        echo "<script> alert('Password tidak boleh kosong'); location.href='login.php'; </script>";
    } elseif (empty($role)) {
        echo "<script> alert('Role tidak boleh kosong'); location.href='login.php'; </script>";
    } else {
        include "koneksi.php";
        $qry_login = mysqli_query($conn, "select * from user where username = '" . $username . "' and password = '" . md5($username) . "'");
        if (mysqli_num_rows($qry_login) > 0) {
            $dt_login = mysqli_fetch_array($qry_login);
            if ($role == $dt_login['role']) {
                session_start();
                $_SESSION['id_user'] = $dt_login['id_user'];
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['role'] = $dt_login['role'];
                $_SESSION['status_login'] = true;
                header("location: home.php");
            } else {
                echo "<script>alert('Akun tidak ada');location.href='login.php';</script>";
            }
        } else {
            echo "<script>alert('Username dan Password tidak benar');location.href='login.php';</script>";
        }
    }
}
