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
                    <h2>Tambah Member</h2>
                </div>
                <form action="proses_tambah_member.php" method="post">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nama member" name="nama_member" class="form-control">
                    </div>
                    <div class="row">
                    <i class="fas fa-home"></i>
                        <input type="alamat" placeholder="Alamat" name="alamat" value="" class="form-control">
                    </div>
                    <div class="row">
                    <i class="fas fa-phone"></i>
                        <input type="number" placeholder="No Telp" name="telepon" value="" class="form-control">
                    </div>
                    <div class="row">
                        
                        <select name="jenis_kelamin" class="form-control">
                        <option disabled selected>Jenis Kelamin</option>
                            <option value="Laki-laki">Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                    </div>
                    <div class="row button">
                        <input type="submit" name="simpan" value="Tambah member" class="btn btn-primary">
                    </div>
                    <left><a href="tampil_member.php" class="btn btn-dark">Kembali</a></left>
                </form>
            </div>
        </div>

    </body>

    </html>
    
