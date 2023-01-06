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
    <h3 align=center>DAFTAR PEGAWAI LAUNDRY ONLINE</h3>
    <table class="table">
    <a href="tambah_user.php?id_user" class="btn btn-primary">Tambah User</a>
        <thead>
            <tr>
                <th>NO</th>
                <th>NAMA USER</th>
                <th>USERNAME</th>
                <th>ROLE</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $qry_user = mysqli_query($conn, "select * from user"); //INNER JOIN
            //menampilkan data yg id_paket di tabel paket dan id_paket di tabel user SAMA
            $no = 0;
            while ($data_user = mysqli_fetch_array($qry_user)) {
                $no++;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_user['nama'] ?></td>
                    <td><?= $data_user['username'] ?></td>
                    <td><?= $data_user['role'] ?></td>
                    <td>
                            <a href="ubah_user.php?id_user=<?= $data_user['id_user'] ?>" target="" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                            </a>
                            </td>
                            <td>
                            <a href="hapus_user.php?id_user=<?= $data_user['id_user'] ?>" target="" onclick="return confirm('Apakah anda yakin menghapus data ini?')" >
                                <svg xmlns=" http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-trash3-fill" fill="currentColor" color= "red" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </a>
                        </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>