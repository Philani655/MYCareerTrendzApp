$(document).ready(function () {
    $('#forgotPasswordForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        if (isForgotPassword()) {
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isForgotPassword() {
    let idNumber = $('#idNumber').val();
    let email = $('#email').val();

    // Reset previous error messages
    $('#idNumber-error').hide();
    $('#email-error').hide();
    
    let isValid = true;
    
    if(!email){
        $('#email-error').text('Email address is required.').show();
        isValid = false;
    }

    // Validate ID Number using Luhn Algorithm
    if (!isValidLuhn(idNumber)) {
        $('#idNumber-error').text('Invalid ID Number. Please enter a valid one.').show();
        isValid = false;
    }

    // Validate ID Number - must be 13 digits and numeric only
    if (!/^\d{13}$/.test(idNumber)) {
        $('#idNumber-error').text('ID Number must be exactly 13 digits and contain only numbers.').show();
        isValid = false;
    }

    // Validate id number
    if (!idNumber) {
        $('#idNumber-error').text('Idenfication number is required.').show();
        isValid = false;
    }
    
    return isValid;
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