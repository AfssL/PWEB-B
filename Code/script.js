$(document).ready(function() {
    $('#qnaForm').submit(function(event) {
        event.preventDefault(); // mencegah form dikirim secara default (yang menyebabkan refresh halaman)

        let isValid = true;     // validasi
        let errorMessage = '';
        const statusDiv = $('#status');

        statusDiv.removeClass('success error').hide().text(''); // hapus pesan status sebelumnya

        $('#qnaForm [required]').each(function() {              // cek setiap input yang wajib diisi
            if ($(this).val().trim() === '') {
                const label = $("label[for='" + $(this).attr('id') + "']").text(); // ambil teks label agar pesan lebih dipahami
                errorMessage = `${label.replace(':', '')} tidak boleh kosong.`;
                isValid = false;
                return false;
            }
        });

        if (!isValid) { // tampilkan pesannya
            statusDiv.addClass('error').text(errorMessage).fadeIn(); // jika validasi gagal, pesan error
        } else {
            statusDiv.addClass('success').text('Form berhasil dikirim!').fadeIn(); // berhasil, pesan sukses
            $('#qnaForm')[0].reset(); // kosongkan form setelah berhasil dikirim
            
            setTimeout(function() {   // sembunyikan pesan sukses setelah 5 detik
                statusDiv.fadeOut();
            }, 5000);                 // 5000 milliseconds = 5 seconds
        }
    });
});