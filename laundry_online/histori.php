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
                            <th scope="col"></th>
                            <th scope="col"></th>
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
                                <td>


                                    <?php
                                    if ($dt_histori['dibayar'] == "belum bayar") {
                                    ?>
                                        <a href="ubah_status_pembayaran.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?> "><button class="btn btn-success btn-sm">Lunas</button></a>
                                    <?php
                                    }
                                    ?>


                                    <?php
                                    if ($dt_histori['status'] == "baru") {
                                    ?>
                                        <a href="ubah_status.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?>&status=proses"><button class="btn btn-warning btn-sm">Diproses</button></a>
                                    <?php
                                    } elseif ($dt_histori['status'] == "proses") {
                                    ?>
                                        <a href="ubah_status.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?>&status=selesai"><button class="btn btn-info btn-sm">Selesai</button></a>
                                    <?php
                                    } elseif ($dt_histori['status'] == "selesai") {
                                    ?>
                                        <a href="ubah_status.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?>&status=diambil"><button class="btn btn-success btn-sm">Diambil</button></a>
                                    <?php
                                    } elseif ($dt_histori['status'] == "diambil") {
                                    ?>

                                        <?php
                                        if ($dt_histori['dibayar'] == "sudah bayar") {
                                        ?>

                                    <?php
                                        }
                                    }
                                    ?>

                                </td>
                                
                                <td>
                                    <div class="btn-group dropend">

                                        <button type="button" class="btn btn-secondary dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                                            </svg>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="invoice.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?>" class="btn btn-success">Invoice</a></li>
                                            <li><a class="dropdown-item" href="hapus_histori.php?id_transaksi=<?= $dt_histori['id_transaksi'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a></li>
                                        </ul>
                                    </div>
                                </td>
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