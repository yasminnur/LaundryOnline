<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  include "koneksi.php";
  ?>

  <div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%;" height="100%" width="100%">
    <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
      <tbody>
        <tr>
          <td width="5px" style="padding: 0;"></td>
          <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
            <table width="100%" cellspacing="0" style="border-collapse: collapse;">
              <tbody>
                <tr>
                  <?php
                  include "koneksi.php";
                  $sql = 'select * from transaksi join detail_transaksi on detail_transaksi.id_transaksi=transaksi.id_transaksi join member on member.id_member = transaksi.id_member where transaksi.id_transaksi = '  . $_GET['id_transaksi'];
                  $result = mysqli_query($conn, $sql);
                  ?>
                  <?php if ($data_detail_transaksi = mysqli_fetch_assoc($result)) { ?>
                    <td style="color: #999; font-size: 12px; padding: 0; text-align: left;" align="left">
                      Member <?= $data_detail_transaksi['nama_member'] ?><br />
                      <?= $data_detail_transaksi['jenis_kelamin'] ?><br />
                      <?= $data_detail_transaksi['telepon'] ?>
                    </td>
                  <?php
                  }
                  ?>
                  <?php
                  include "koneksi.php";
                  $sql = 'select * from transaksi join detail_transaksi on detail_transaksi.id_transaksi=transaksi.id_transaksi join member on member.id_member = transaksi.id_member where transaksi.id_transaksi = '  . $_GET['id_transaksi'];
                  $result = mysqli_query($conn, $sql);
                  ?>
                  <?php if ($data_detail_transaksi = mysqli_fetch_assoc($result)) { ?>


                    <td style="color: #999; font-size: 12px; padding: 0; text-align: right;" align="right">
                      Laundry Online<br />
                      No.<?= $data_detail_transaksi['id_transaksi'] ?><br />
                      <?php echo date('l, d-m-Y'); ?>
                    </td>
                  <?php
                  }
                  ?>
                </tr>
              </tbody>
            </table>
          </td>
          <td width="5px" style="padding: 0;"></td>
        </tr>

        <tr>
          <td width="5px" style="padding: 0;"></td>
          <td bgcolor="#ffff" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
            <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
              <tbody>
                <tr>
                  <?php
                  $qry_detail = mysqli_query($conn, "select * from detail_transaksi join paket on detail_transaksi.id_paket = paket.id_paket where detail_transaksi.id_transaksi = '" . $_GET['id_transaksi'] . "'");
                  $total = 0;
                  while ($dt_detail = mysqli_fetch_array($qry_detail)) {
                  ?>
                <tr>
                  <?php
                    $total += $dt_detail['harga'] * $dt_detail['qty'];
                  ?>
                </tr>
              <?php
                  }
              ?>
              <td width="50%" style="padding: 20px;"><strong style="color: #333; font-size: 24px;">Rp <?= $total ?> </strong>
                <?php
                if ($data_detail_transaksi['dibayar'] == "sudah bayar") { ?>
                  <a>
                    <img src="gambar/paid.png" width="25px" height="25px">
                  </a>
                <?php
                } else { ?>
                  <?= $data_detail_transaksi['dibayar'] ?>
                <?php
                }
                ?>
              </td>
              <td align="right" width="50%" style="padding: 20px;">Thanks for using our services </td>
        </tr>
      </tbody>
    </table>
    </td>
    <td style="padding: 0;"></td>
    <td width="5px" style="padding: 0;"></td>
    </tr>
    <tr>
      <td width="5px" style="padding: 0;"></td>
      <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
        <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
          <tbody>
            <tr>

              <td valign="top" style="padding: 20px;">
                <h3 style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        ">
                  Summary
                </h3>
                <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px; ">
                  <tbody>
                    <tr>
                      <?php
                      $paket = "<ol>";
                      $subtotal = "<ol>";
                      $qty = "<ol>";
                      $qry_paket = mysqli_query($conn, "select * from  detail_transaksi join paket on paket.id_paket=detail_transaksi.id_paket where id_transaksi = '" . $_GET['id_transaksi'] . "'");
                      while ($dt_paket = mysqli_fetch_array($qry_paket)) {
                        $paket .= $dt_paket['nama_paket'] . "<br>";
                        $subtotal .= $dt_paket['subtotal'] . "<br>";
                        $qty .= $dt_paket['qty'] . "<br>";
                        $paket .= "</ol>";
                        $subtotal .= "</ol>";
                        $qty .= "</ol>";
                      }
                      ?>
                      <td style="padding: 5px 0;"><?= $paket ?></td>
                      <td align="center" style="padding: 5px 0;"><?= $qty ?></td>
                      <td align="right" style="padding: 5px 0;"><?= $subtotal ?></td>
                    </tr>

                    <tr>
                      <br>
                      <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Total</td>
                      <td align="center" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;"></td>
                      <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Rp <?= $total ?></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>

          </tbody>
        </table>
      </td>
      <td width="5px" style="padding: 0;"></td>
    </tr>

    <tr style="color: #666; font-size: 12px;">
      <td width="5px" style="padding: 10px 0;"></td>
      <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
          <tbody>
            <tr>
              <td width="40%" valign="top" style="padding: 10px 0;">
                Status Order "<?= $data_detail_transaksi['status'] ?>"<br />
                <?php
                if ($data_detail_transaksi['dibayar'] == "") { ?>
                  Status pembayaran : <h4 style="margin: 0; display:inline-block;">LUNAS </h4><br />
                <?php
                } else { ?>
                  Status pembayaran : <h4 style="margin: 0; display:inline-block;">BELUM BAYAR </h4><br />
                <?php
                }
                ?>

                <?php
                if ($data_detail_transaksi['dibayar'] == "") { ?>
                  Dibayar pada : <?= $data_detail_transaksi['tanggal_bayar'] ?>
                <?php
                } else { ?>
                  Batas waktu pembayaran : <?= $data_detail_transaksi['batas_waktu'] ?>
                <?php
                }
                ?>

              </td>
              <td width="10%" style="padding: 10px 0;">&nbsp;</td>
              <td width="40%" valign="top" style="padding: 10px 0;">
                <h4 style="margin: 0;"><span class="il">Laundry</span> Online</h4>
                <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                  Jl. Danau Ranau, Sawojajar, Kec. Kedungkandang, Kota Malang, Jawa Timur 65139
                </p>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
      <td width="5px" style="padding: 10px 0;"></td>
    </tr>
    </tbody>
    </table>
    
    <script>
		window.print();
	</script>
  </div>

</body>


</html>