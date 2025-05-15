$(document).ready(function () {
    $('#adminForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission 
        if(isAdmin()){
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isAdmin() {
    let idNumber = $('#idNumber').val();
    let firstName = $('#firstName').val();
    let lastName = $('#lastName').val();
    let email = $('#email').val();
    let cell = $('#cell').val();
    let password = $('#password').val();
    let image = $('#image')[0].files[0]; // Get the file input's file

    // Reset previous error messages
    $('#idNumber-error').hide();
    $('#firstName-error').hide();
    $('#lastName-error').hide();
    $('#email-error').hide();
    $('#cell-error').hide();
    $('#image-error').hide();
    $('#password-error').hide();

    let isValid = true;

    // Validate password
    if (!password) {
        $('#password-error').text('Password is required.').show();
        isValid = false;
    } else if (!isStrongPassword(password)) {
        $('#password-error').text('Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.').show();
        isValid = false;
    }

    // Check image is provided
    if (!image) {
        $('#image-error').text('Image is required!').show();
        isValid = false;
    }

    // Check if cell number is provided
    if (!cell) {
        $('#cell-error').text('Cell number is required!').show();
        isValid = false;
    } else if (!/^(06|07|08)[0-9]{8}$/.test(cell)) {
        $('#cell-error').text('Invalid cell number! Use format 0821234567').show();
        isValid = false;
    }

    // Check if email is provided
    if (!email) {
        $('#email-error').text('Email address is required!').show();
        isValid = false;
    }

    // Check if last name is provided
    if (!lastName) {
        $('#lastName-error').text('Last name is required!').show();
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(lastName)) {
        $('#lastName-error').text('Last name can only contain letters and spaces!').show();
        isValid = false;
    }

    // Check if first name is provided
    if (!firstName) {
        $('#firstName-error').text('First name is required!').show();
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(firstName)) {
        $('#firstName-error').text('First name can only contain letters and spaces!').show();
        isValid = false;
    }

    // Check if id number is provided
    if (!idNumber) {
        $('#idNumber-error').text('ID number is required!').show();
        isValid = false;
    } else if (!isValidLuhn(idNumber)) {
        $('#idNumber-error').text('Invalid ID Number. Please enter a valid one.').show();
        isValid = false;
    } else if (!/^\d{13}$/.test(idNumber)) {
        $('#idNumber-error').text('ID Number must be exactly 13 digits and contain only numbers.').show();
        isValid = false;
    }

    return isValid;
}

// Function to check if the password is strong
function isStrongPassword(password) {
    const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return strongPasswordRegex.test(password);
}

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
