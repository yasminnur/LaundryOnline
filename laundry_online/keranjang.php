<?php
include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="histori.css">
    <title></title>
</head>
<body>
<div class="container">
<h2>Daftar Paket di Keranjang</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Paket</th>
            <th>Jumlah</th>
            <th>harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach (@$_SESSION['keranjang'] as $key_paket => $val_paket) : ?>

            <tr>
                <td><?= ($key_paket + 1) ?></td>
                <td><?= $val_paket['nama_paket'] ?></td>
                <td><?= $val_paket['qty'] ?></td>
                <td><?= $val_paket['harga'] ?></td>
                <td><a href="hapus_cart.php?id_paket=<?= $key_paket ?>" class="btn btn-danger"><strong>X</strong></a>
                
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<a href="paket.php" class="btn btn-primary">Tambah</a>
<a href="checkout.php" class="btn btn-primary">Check Out</a>
</div>
<?php
include "footer.php";
?>
</body>
</html>
