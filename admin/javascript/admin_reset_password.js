$(document).ready(function () {
    // Display the reset password form
    $('#resetPasswordForm').show();

    // Handle form submission
    $('#resetPasswordForm').submit(function (e) {
        e.preventDefault(); // Prevent form from submitting

        let email = $('#reset-email').val();
        let isValid = true;

        // Reset previous error messages
        $('#reset-email-error').hide();

        // Simple email validation
        if (email === '') {
            $('#reset-email-error').text('Email is required.').show();
            isValid = false;
        } else if (!validateEmail(email)) {
            $('#reset-email-error').text('Please enter a valid email address.').show();
            isValid = false;
        }

        if (isValid) {
            // Simulate sending reset link
            alert('A password reset link has been sent to your email.');
            // Optionally, you could redirect or clear the form.
            // window.location.href = '/login'; // Example: redirect to login page
        }
    });

    // Function to validate email format
    function validateEmail(email) {
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return regex.test(email);
    }

});
