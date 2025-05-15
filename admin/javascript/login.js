$(document).ready(function () {
    $('#loginForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        if (isValidateLogin()) {
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isValidateLogin() {
    let idNumber = $('#idNumber').val();
    let password = $('#password').val();

    // Reset previous error messages
    $('#idNumber-error').hide();
    $('#password-error').hide();
    $('#response-message').html("");

    let isValid = true;

    // Validate ID Number using Luhn Algorithm
 
    if (!idNumber) {
        $('#idNumber-error').text('Idenfication number is required.').show();
        isValid = false;
    } else if (!/^\d{13}$/.test(idNumber)) {
        $('#idNumber-error').text('ID Number must be exactly 13 digits and contain only numbers.').show();
        isValid = false;
    } else if (!isValidLuhn(idNumber)) {
        $('#idNumber-error').text('Invalid ID Number. Please enter a valid one.').show();
        isValid = false;
    }

    // Validate password
    if (password === '') {
        $('#password-error').text('Password is required.').show();
        isValid = false;
    } else if (!isStrongPassword(password)) {
        $('#password-error').text('Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.').show();
        isValid = false;
    }

    return isValid;
}
;

// Function to validate ID Number using Luhn Algorithm
function isValidLuhn(number) {
    let sum = 0;
    let alternate = false;
    number = number.replace(/\D/g, ''); // Remove non-numeric characters

    for (let i = number.length - 1; i >= 0; i--) {
        let digit = parseInt(number[i]);

        if (alternate) {
            digit *= 2;
            if (digit > 9) {
                digit -= 9;
            }
        }
        sum += digit;
        alternate = !alternate;
    }
    return (sum % 10 === 0);
}

// Function to check if the password is strong
function isStrongPassword(password) {
    const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return strongPasswordRegex.test(password);
}
;

