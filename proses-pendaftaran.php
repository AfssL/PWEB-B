<?php

include("config.php");

if(isset($_POST['daftar'])){

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto']['name'];    
    $tmp = $_FILES['foto']['tmp_name'];  
    $folder = "uploads/";

    if ($foto != "") {
        $target = $folder . basename($foto);
        move_uploaded_file($tmp, $target);
    } else {
        $foto = null; 
    }

    $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) VALUE ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$foto')";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: index.php?status=sukses');
    } else {
        header('Location: index.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
}

?>