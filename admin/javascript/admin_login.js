$(document).ready(function () {
    $('#loginForm').submit(function (e) {
        e.preventDefault(); // Prevent form from submitting

        let username = $('#username').val();
        let password = $('#password').val();

        // Reset previous error messages
        $('#username-error').hide();
        $('#password-error').hide();

        // Basic validation (empty fields)
        let isValid = true;

        if (username === '') {
            $('#username-error').text('Username is required.').show();
            isValid = false;
        }

        if (password === '') {
            $('#password-error').text('Password is required.').show();
            isValid = false;
        } else if (!isStrongPassword(password)) {
            $('#password-error').text('Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.').show();
            isValid = false;
        }

        if (isValid) {
            // Simulate login success (can replace this with actual AJAX request)
//            alert('Login successful');
            // Redirect to another page (optional)
             window.location.href = '../php/dashboard.php';
        }
    });

    // Function to check if the password is strong
    function isStrongPassword(password) {
        // Define the regex for strong password
        const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        return strongPasswordRegex.test(password);
    }
});
