<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha284-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
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
                $qry_get_user = mysqli_query($conn, "select * from user where id_user = '" . $_GET['id_user'] . "'");
                $dt_user = mysqli_fetch_array($qry_get_user);
                ?>
                <div class="title">
                    <h2>Ubah User</h2>
                </div>
                <form action="proses_ubah_user.php" method="post">
                    <input type="hidden" name="id_user" value="<?= $dt_user['id_user'] ?>">
                    Nama user
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nama" value="<?= $dt_user['nama'] ?>" class="form-control">
                    </div>

                    Username
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="text" name="username" value="<?= $dt_user['username'] ?>" class="form-control">
                    </div>

                    Password
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" value="<?= $dt_user['password'] ?>" class="form-control">
                    </div>

                    Role
                    <div class="row">
                    <?php
        $arr_role = array('Owner' => 'Owner', 'Admin' => 'Admin', 'Kasir' => 'Kasir');
        ?>
        <select name="role" class="form-control">
            <option></option>
            <?php foreach ($arr_role as $key_role => $val_role) :
                if ($key_role == $dt_user['role']) {
                    $selek = "selected";
                } else {
                    $selek = "";
                }
            ?>
                <option value="<?= $key_role ?>" <?= $selek ?>><?= $val_role ?></option>
            <?php endforeach ?>
        </select>
                    </div>
                    <div class="row button">
                        <input type="submit" name="simpan" value="Ubah User" class="btn btn-primary">
                    </div>
                    <left><a href="paket.php" class="btn btn-dark">Kembali</a></left>
                </form>
            </div>
        </div>

    </body>

    </html>