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
        <link rel="stylesheet" href="tambah_member.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    </head>

    <body>
        <div class="container">
            <div class="wrapper">
                <div class="title">
                    <h2>Tambah User</h2>
                </div>
                <form action="proses_tambah_user.php" method="post">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Name" name="nama" class="form-control">
                    </div>
                    <div class="row">
                        <i class="fas fa-tel"></i>
                        <input type="text" placeholder="Username" name="username" value="" class="form-control">
                    </div>
                    <div class="row">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Password" name="password" value="" class="form-control">
                    </div>
                    <div class="row">
                        <select name="role" class="form-control">
                            <option></option>
                            <option value="owner">Owner</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                    <div class="row button">
                        <input type="submit" name="simpan" value="Tambah User" class="btn btn-primary">
                    </div>
                    <left><a href="paket.php" class="btn btn-dark">Kembali</a></left>
                </form>
                
            </div>
        </div>

    </body>

    </html>