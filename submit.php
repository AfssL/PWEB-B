<?php
// Cek apakah data dikirim menggunakan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ambil dan bersihkan data dari form untuk keamanan
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $gender = htmlspecialchars(trim($_POST['gender']));
    $department = htmlspecialchars(trim($_POST['department']));
    $message = htmlspecialchars(trim($_POST['message']));

    // --- Validasi Sederhana ---
    // 1. Cek apakah nama kosong
    if (empty($name)) {
        echo "Error: Nama wajib diisi.";
        $conn->close(); // Tutup koneksi sebelum keluar
        exit;
    }

    // 2. Cek apakah email kosong
    if (empty($email)) {
        echo "Error: Alamat email wajib diisi.";
        $conn->close(); // Tutup koneksi sebelum keluar
        exit;
    }

    // 3. Cek format email (setelah dipastikan tidak kosong)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Error: Format alamat email tidak valid.";
        $conn->close(); // Tutup koneksi sebelum keluar
        exit;
    }

    // 4. Cek apakah jenis kelamin sudah dipilih
    if (empty($gender)) {
        echo "Error: Jenis kelamin wajib dipilih.";
        $conn->close(); // Tutup koneksi sebelum keluar
        exit;
    }

    // 5. Cek apakah departemen kosong
    if (empty($department)) {
        echo "Error: Asal departemen wajib diisi.";
        $conn->close(); // Tutup koneksi sebelum keluar
        exit;
    }

    // 6. Cek apakah pesan kosong
    if (empty($message)) {
        echo "Error: Pesan atau pertanyaan wajib diisi.";
        $conn->close(); // Tutup koneksi sebelum keluar
        exit;
    }
    
    // --- Jika semua validasi lolos ---
    
    // Di sini Anda bisa menambahkan logika untuk:
    // 1. Menyimpan data ke database MySQL.
    // 2. Mengirim notifikasi email.
    // 3. Menyimpan ke dalam file log, dll.

    // Untuk demo ini, kita hanya akan mengirim pesan sukses.
    // Pesan inilah yang akan ditangkap oleh fungsi 'success' di AJAX.
    echo "Terima kasih, $name.";

} else {
    // Jika file ini diakses langsung tanpa mengirim data POST
    echo "Error: Akses tidak diizinkan.";
}
?>