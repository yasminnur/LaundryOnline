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
        <link rel="stylesheet" href="ubah_member.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    </head>

    <body>
        <div class="container">
            <div class="wrapper">
                <?php
                include "koneksi.php";
                $qry_get_member = mysqli_query($conn, "select * from member where id_member = '" . $_GET['id_member'] . "'");
                $dt_member = mysqli_fetch_array($qry_get_member);
                ?>
                <div class="title">
                    <h2>Ubah Member</h2>
                </div>
                <form action="proses_ubah_member.php" method="post">
                    <input type="hidden" name="id_member" value="<?= $dt_member['id_member'] ?>">

                    Nama member
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nama_member" value="<?= $dt_member['nama_member'] ?>" class="form-control">
                    </div>

                    Alamat
                    <div class="rowspan 2">
                        <textarea name="alamat" class="form-control" rows="4"><?= $dt_member['alamat'] ?></textarea>
                    </div>
                    <br>

                    Telepon
                    <div class="row">
                        <i class="fas fa-phone"></i>
                        <input type="number" name="telepon" value="<?= $dt_member['telepon'] ?>" class="form-control">
                    </div>

                    Jenis kelamin
                    <div class="row">
                        <?php
                        $arr_jenis_kelamin = array('Laki-laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan');
                        ?>
                        <select name="jenis_kelamin" class="form-control">
                            <option></option>
                            <?php foreach ($arr_jenis_kelamin as $key_jenis_kelamin => $val_jenis_kelamin) :
                                if ($key_jenis_kelamin == $dt_member['jenis_kelamin']) {
                                    $selek = "selected";
                                } else {
                                    $selek = "";
                                }
                            ?>
                                <option value="<?= $key_jenis_kelamin ?>" <?= $selek ?>><?= $val_jenis_kelamin ?></option>
                            <?php endforeach ?>
                        </select><br>
                    </div>


                    <div class="row button">
                        <input type="submit" name="simpan" value="Ubah member" class="btn btn-primary">
                    </div>
                    <left><a href="tampil_member.php" class="btn btn-dark">Kembali</a></left>
                </form>
            </div>
        </div>

    </body>

    </html>