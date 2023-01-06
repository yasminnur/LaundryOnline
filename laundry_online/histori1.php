<?php
include "header.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="histori.css">
    <title></title>
</head>
<body>
    <div class="container">


                <h2 align="center">HISTORI TRANSAKSI</h2>
                <form method="POST" action="histori.php" class="d-flex">
                </form>
       
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Nama Member</th>
                            <th scope="col">Paket</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">total</th>
                            <th scope="col">Tanggal laundry</th>
                            <th scope="col">Tanggal selesai</th>
                            <th scope="col">Tanggal bayar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Pembayaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $qry_histori = mysqli_query($conn, "select * from transaksi  join member on transaksi.id_member = member.id_member join user on transaksi.id_user = user.id_user order by id_transaksi desc");
                        $no = 0;
                        while ($dt_histori = mysqli_fetch_array($qry_histori)) {
                            $no++;

                            //menampilkan jenis laundry yang dipesan
                            $paket = "<ol>";
                            $subtotal = "<ol>";
                            $qty = "<ol>";
                            $qry_paket = mysqli_query($conn, "select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
                            while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                                $paket .= $dt_paket['nama_paket'] . "<br>";
                                $subtotal .= $dt_paket['subtotal'] . "<br>";
                                $qty .= $dt_paket['qty'] . "<br>";
                            }
                            $paket .= "</ol>";
                            $subtotal .= "</ol>";
                            $qty .= "</ol>";

                            $qry_total = mysqli_query($conn, "select sum(subtotal) from detail_transaksi where detail_transaksi.id_transaksi = '" . $dt_histori['id_transaksi'] . "' group by id_transaksi limit 1");
                            // if(
                            $dt_total = mysqli_fetch_array($qry_total);
                            // ){
                            // $total= implode($dt_total);
                            // }




                            //menampilkan status proses
                            $qry_cek_bayar = mysqli_query($conn, "select * from transaksi where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
                            if (mysqli_num_rows($qry_cek_bayar) > 0) {
                                $dt_bayar = mysqli_fetch_array($qry_cek_bayar);

                                $status = "<label class='alert alert-success'>" . $dt_histori['status'] . "</label>";
                                //$pembayaran = "<label class='alert alert-success'>" . $dt_histori['dibayar'] . "</label>";
                                // $button_update = "<a href='update.php?id_transaksi=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning'>Update</a>";
                            } else {
                            }

                            //menampilkan status pembayaran
                            $qry_cek_pembayaran = mysqli_query($conn, "select * from transaksi where id_transaksi = '" . $dt_histori['id_transaksi'] . "'");
                            if (mysqli_num_rows($qry_cek_pembayaran) > 0) {
                                $dt_pembayaran = mysqli_fetch_array($qry_cek_pembayaran);

                                // $status = "<label class='alert alert-success'>" . $dt_histori['status'] . "</label>";
                                $pembayaran = "<label class='alert alert-success'>" . $dt_histori['dibayar'] . "</label>";
                                // $button_update = "<a href='update.php?id_transaksi=" . $dt_histori['id_transaksi'] . "' class='btn btn-warning'>Update</a>";
                            } else {
                            }
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $dt_histori['nama'] ?></td>
                                <td><?= $dt_histori['nama_member'] ?></td>
                                <td><?= $paket ?></td>
                                <td><?= $qty ?></td>
                                <td><?= $subtotal ?></td>
                                <td><?= $dt_total['sum(subtotal)'] ?></td>
                                <td><?= $dt_histori['tanggal'] ?></td>
                                <td><?= $dt_histori['batas_waktu'] ?></td>
                                <td><?= $dt_histori['tanggal_bayar'] ?></td>
                                <td><?= $dt_histori['status'] ?></td>
                                <td><?= $dt_histori['dibayar'] ?></td>
                                
                            </tr>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
</body>

</html>

<?php
include "footer.php";
?>