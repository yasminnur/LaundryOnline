<?php 
    include "header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
    <link rel="stylesheet"  >
</head>
<body>
  <?php
  include "koneksi.php";
  ?>

<div class="row" style="margin-top:50px;">
    <div class="col-md"></div>
    <div class="col-md rounded bg-light" style="box-shadow: 4px 4px 5px -4px;padding:20px">
        <form action="cek_data.php" method="post">
          <h3 align="center">Laundry</h3>
          
          Nama Member:
          <select name="nama_member" value="" class="form-control">
            <option disabled selected> Pilih nama member</option>
            <?php
            include "koneksi.php";
            $sql=mysqli_query($conn, "SELECT nama_member from member ;");
            while ($data=mysqli_fetch_array($sql)) {
              ?>
              <option value="<?=$data['nama_member']?>"><?=$data['nama_member']?></option>
              <?php
            }
            ?>
          </select>
          <br>
        
          <center><input type="submit" name="transaksi" class="btn btn-success" value="Mulai Transaksi"></center><br>
      </form>
    </div>
    <div class="col-md"></div>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> 
</body>
</html>