$(document).ready(function () {
    $('#comparePasswords').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        if (isComparePasswords()) {
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isComparePasswords() {
    let password = $('#password').val();
    let confrimPassword = $('#confrimPassword').val();

    // Reset previous error messages
    $('#password-error').hide();
    $('#confrimPassword-error').hide();

    let isValid = true;
    
    // Validate password
    if (password === '') {
        $('#password-error').text('Password is required.').show();
        isValid = false;
    } else if (!isStrongPassword(password)) {
        $('#password-error').text('Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.').show();
        isValid = false;
    }

    // Validate confirm password
    if (!confrimPassword) {
        $('#confrimPassword-error').text('Password is required.').show();
        isValid = false;
    } else if (!isStrongPassword(confrimPassword)) {
        $('#confrimPassword-error').text('Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.').show();
        isValid = false;
    }

    if (password !== confrimPassword) {
        $('#confrimPassword-error').text('Password not match').show();
        isValid = false;
    }

    return isValid;

}


// Function to check if the password is strong
function isStrongPassword(password) {
    const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return strongPasswordRegex.test(password);
}

