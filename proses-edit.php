<?php

include("config.php");

if(isset($_POST['simpan'])){

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto = $_FILES['foto']['name'];     
    $tmp = $_FILES['foto']['tmp_name'];  

    $folder = "uploads/";

    $result = mysqli_query($db, "SELECT foto FROM calon_siswa WHERE id=$id");
    $data_lama = mysqli_fetch_assoc($result);
    $foto_lama = $data_lama['foto'];

    if ($foto != "") {
        $target = $folder . basename($foto);
        move_uploaded_file($tmp, $target);
    } else {
        $foto = $foto_lama;
    }

    $sql = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', foto='$foto' WHERE id=$id";
    $query = mysqli_query($db, $sql);

    if( $query ) {
        header('Location: list-siswa.php');
    } else {
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>