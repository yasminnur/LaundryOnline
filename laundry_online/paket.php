<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

</head>

<body>
   <!-- <style>
        .container {
            background-image: url(gambar/pola1.png);
        }
    </style> -->
    <div class="tambah" align="right" style="padding:0 50px">
            Tambah Paket
            <a href="tambah_paket.php" target="">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </a>
        </div>
    <div class="container">

        <br>
        <h3 align="center">DAFTAR PAKET</h3>
        <br><br>
        <div class="row">
            <?php
            include "koneksi.php";
            $qry_paket = mysqli_query($conn, "select * from paket");
            while ($dt_paket = mysqli_fetch_array($qry_paket)) {
            ?>

                <div class="col-md-3">
                    <div class="container center">
                        <div class="card">
                            <br>
                            <center><img src="gambar/<?= $dt_paket['foto'] ?>" width=200px height=200px></center>
                            <div class="card-body">

                                <h5 class="card-title" style="display:inline-block;"><?= $dt_paket['nama_paket'] ?></h5>
                                <?php
                                if ($_SESSION['role'] == 'admin') {
                                ?>
                                    <div class="btn-group dropend" align="right">

                                        <div data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="ubah_paket.php?id_paket=<?= $dt_paket['id_paket'] ?>">Edit</a></li>
                                            <li><a class="dropdown-item" href="hapus_paket.php?id_paket=<?= $dt_paket['id_paket'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a></li>
                                        </ul>
                                    </div>
                                <?php
                                }
                                ?>
                                <p class="card-text"><?= $dt_paket['harga'] ?></p>
                                <a href="beli.php?id_paket=<?= $dt_paket['id_paket'] ?>" class="btn btn-primary">Beli</a>
                                </td>
                                </td>
                            </div>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>
<?php
include "footer.php";
?>