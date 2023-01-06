<?php
include "header.php";
include "koneksi.php";
$qry_detail_paket = mysqli_query($conn, "select * from paket where id_paket = '" . $_GET['id_paket'] . "'");
$dt_paket = mysqli_fetch_array($qry_detail_paket);
?>
<h2 align="center">Beli paket</h2>
<div class="container">
<div class="row">
    <div class="col-md-4" align="center" style="padding: 10px; width:200px; height:200px">
        <img src="gambar/<?= $dt_paket['foto'] ?>" class="card-img-top">
    </div>
    <div class="col-md-8">
        <form action="masukkankeranjang.php?id_paket=<?= $dt_paket['id_paket'] ?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nama Buku</td>
                        <td><?= $dt_paket['nama_paket'] ?></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><?= $dt_paket['harga'] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Laundry (Kg)</td>
                        <td><input type="number" name="jumlah_beli" value="1" min="0" /></td>
                    </tr>
                    <tr>

                        <td colspan="2"><input class="btn btn-success" type="submit" value="Beli"></td>
                    </tr>
                </thead>
            </table>


        </form>
    </div>
</div>
</div>
<?php
include "footer.php";
?>