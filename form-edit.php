<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex; 
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin:0;
        }

        .main {
            background-color: white; 
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.2);
            padding: 20px; 
            width: 500px; 
            position: relative;
        }

        h2 { 
            color: black;
            text-align: center; 
        }

        label { 
            color:black; 
            font-weight:bold; 
            display:block; 
            margin:5px 0;
        }

        input,select {
            width:100%; 
            padding:10px; 
            margin-bottom:5px; 
            box-sizing: border-box;
            border:1px solid black; 
            border-radius:5px;
            }

        .error {
            color: #ff8080; font-size: 13px; margin-bottom: 10px;
            display:none;
        }

        input[type="submit"] {
                background-color: #0078D7;
                color: white;
                border: none;
                padding: 10px;
                border-radius: 5px;
                margin-top: 20px;
                cursor: pointer;
                transition: background 0.3s;
            }

        input[type="submit"]:hover {
            background-color: #005fa3;
        }
    </style>
</head>

<body>
    <div class="main">
        <h2>Formulir Edit Siswa</h2>
    
        <form id="regForm" action="proses-edit.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

            <label for="nama">Nama: </label>
            <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $siswa['nama'] ?>" />
        
            <label for="alamat">Alamat: </label>
            <input type="text" name="alamat" value="<?php echo $siswa['alamat'] ?>" />
        
            <label for="jenis_kelamin">Jenis Kelamin: </label>
            <select name="jenis_kelamin">
            <?php $jk = $siswa['jenis_kelamin']; ?>
                <option><?php echo ($jk == 'laki-laki') ? "checked": "" ?> Laki-laki</option>
                <option><?php echo ($jk == 'perempuan') ? "checked": "" ?> Perempuan</option>
            </select>
        
            <label for="agama">Agama: </label>
            <?php $agama = $siswa['agama']; ?>
            <select name="agama">
                <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
            </select>
        
            <label for="sekolah_asal">Sekolah Asal: </label>
            <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" />
        
            <label for="foto">foto: </label>
            <input type="file" name="foto" accept="image/*">
        
            <input type="submit" value="Simpan" name="simpan" />

        </form>

    </body>
</html>