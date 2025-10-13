$(document).ready(function() {
    $('#qnaForm').submit(function(event) {
        // Prevent the default form submission (which causes a page refresh)
        event.preventDefault();

        // --- FORM VALIDATION ---
        let isValid = true;
        let errorMessage = '';
        const statusDiv = $('#status');

        // Clear previous status messages
        statusDiv.removeClass('success error').hide().text('');

        // Check each required field
        $('#qnaForm [required]').each(function() {
            if ($(this).val().trim() === '') {
                // Get the label text for a more user-friendly message
                const label = $("label[for='" + $(this).attr('id') + "']").text();
                errorMessage = `${label.replace(':', '')} tidak boleh kosong.`;
                isValid = false;
                return false; // Exit the .each() loop
            }
        });

        // --- DISPLAY MESSAGES ---
        if (!isValid) {
            // If validation fails, show the error message
            statusDiv.addClass('error').text(errorMessage).fadeIn();
        } else {
            // If validation succeeds, show a success message
            // In a real application, this is where you would send the data to a server via AJAX
            statusDiv.addClass('success').text('Form berhasil dikirim!').fadeIn();

            // Optionally, clear the form after successful submission
            $('#qnaForm')[0].reset();
            
            // Hide the success message after a few seconds
            setTimeout(function() {
                statusDiv.fadeOut();
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    });
});