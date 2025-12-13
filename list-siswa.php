<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru | SMK Coding</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f8;
            color: #333;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #0078D7;
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }

        h3 {
            margin: 0;
        }

        nav {
            text-align: center;
            margin: 20px 0;
        }

        nav a {
            text-decoration: none;
            background-color: #0078D7;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            transition: background 0.3s;
        }

        nav a:hover {
            background-color: #005fa3;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 0 auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 15px;
        }

        th, td {
            padding: 10px 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #0078D7;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #eef6ff;
        }

        td a {
            text-decoration: none;
            color: #0078D7;
            font-weight: bold;
            transition: color 0.3s;
        }

        td a:hover {
            color: #005fa3;
        }

        p {
            text-align: right;
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <header>
        <h3>Daftar Siswa yang Telah Mendaftar</h3>
    </header>

    <nav>
        <a href="index.php">Home</a>
        <a href="form-daftar.php">[+] Tambah Baru</a>
    </nav>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Sekolah Asal</th>
                    <th>Foto</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM calon_siswa";
                $query = mysqli_query($db, $sql);
                $no = 1;

                while($siswa = mysqli_fetch_array($query)){
                    echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo "<td>".$siswa['nama']."</td>";
                    echo "<td>".$siswa['alamat']."</td>";
                    echo "<td>".$siswa['jenis_kelamin']."</td>";
                    echo "<td>".$siswa['agama']."</td>";
                    echo "<td>".$siswa['sekolah_asal']."</td>";
                    echo "<td><img src='uploads/".$siswa['foto']."' width='100' alt='Foto Siswa'></td>";
                    echo "<td>";
                    echo "<a href='form-edit.php?id=".$siswa['id']."'>Edit</a> | ";
                    echo "<a href='hapus.php?id=".$siswa['id']."' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <p>Total: <?php echo mysqli_num_rows($query) ?> siswa</p>
    </div>
</body>
</html>
