
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha284-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Penambahan Pelanggan</title>
</head>

<body>
    <!DOCTYPE html>
    <!-- Created By CodingLab - www.codinglabweb.com -->
    <html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <title>Login Form | CodingLab</title> -->
        <link rel="stylesheet" href="tambah_paket.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    </head>

    <body>
        <div class="container">
            <div class="wrapper">
            <?php
    include "koneksi.php";
    $qry_get_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_GET['id_paket'] . "'");
    $dt_paket = mysqli_fetch_array($qry_get_paket);
    ?>
                <div class="title">
                    <h2>Ubah Paket</h2>
                </div>
                <form action="proses_ubah_paket.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_paket" value="<?= $dt_paket['id_paket'] ?>">
                    <div class="row">
                    <i class="fas fa-box"></i>
                    <input type="text" name="nama_paket" value="<?= $dt_paket['nama_paket'] ?>" class="form-control">
                    </div>
                    <div class="row">
                    <i class="fas fa-dollar-sign"></i>
                    <input type="text" name="harga" value="<?= $dt_paket['harga'] ?>" class="form-control">
                    </div>
                    <div class="row">
                    <input type="file" name="file" value="<?= $dt_paket['foto'] ?>" class="form-control">
                    </div>
                    <div class="row button">
                    <input type="submit" name="simpan" value="Ubah paket" class="btn btn-primary">

                    </div>

                    <left><a href="paket.php" class="btn btn-dark">Kembali</a></left>
                </form>
            </div>
        </div>

    </body>

    </html>

  