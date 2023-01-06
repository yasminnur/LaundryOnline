<?php
session_start();
if ($_SESSION['status_login'] == true) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <title>Home Page</title>
        <link rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <img src="gambar/logo fiks.png" width="80" height="100" class="d-inline-block align-text-top">
                <a class="navbar-brand" href="#">Laundry Online</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <?php
                        if ($_SESSION['role'] == 'owner') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="histori1.php">Laporan</a>
                            </li>
                        <?php
                        }
                        if ($_SESSION['role'] == 'admin') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="tampil_member.php">Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="data.php">Paket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="tampil_user.php">Pegawai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="histori.php">Histori</a>
                            </li>
                        <?php
                        }
                        if ($_SESSION['role'] == 'kasir') {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="tampil_member.php">Member</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="data.php">Paket</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="histori.php">Histori</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ms-auto">
                            <a href="logout.php" class="btn btn-outline-danger">Logout</a>
                        </ul>
                    </div>

                </div>
            </div>
        <?php
    } else {
        header('location: login.php');
    } ?>
        </nav>
        <div class="container bg-light rounded" style="margin-top:10px"></div>
        </div>
        </div>
        </nav>