
function isValidateRegister() {
    let idNumber = $('#idNumber').val();
    let name = $('#name').val();
    let surname = $('#surname').val();
    let cell = document.getElementById("cell").value;
    let password = $('#password').val();
    let confirm_password = $('#confirm_password').val();
    let email = $('#email').val();

    // Reset previous error messages
    $('#idNumber-error').hide();
    $('#name-error').hide();
    $('#surname-error').hide();
    $('#cell-error').hide();
    $('#password-error').hide();
    $('#confirm_password-error').hide();
    $('#email-error').hide();
    $('#response-message').html("");

    let isValid = true;

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
    if (idNumber === '') {
        $('#idNumber-error').text('Idenfication number is required.').show();
        isValid = false;
    }

    //Validate names
    if (!/^[A-Za-z\s]+$/.test(name)) {
        $('#name-error').text('Name must container letters').show();
        isValid = false;
    }

    //Validate surname
    if (!/^[A-Za-z\s]+$/.test(surname)) {
        $('#surname-error').text('Surname must container letters').show();
        isValid = false;
    }
    
    // Validate phone Number - must be 10 digits and  start with 0
    if (!/^0\d{9}$/.test(cell)) {
        $('#cell-error').text('Phone number must be exactly 10 digits starting with 0.').show();
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

    // Validate confirm password
    if (confirm_password === '') {
        $('#confirm_password-error').text('Password is required.').show();
        isValid = false;
    } else if (!isStrongPassword(confirm_password)) {
        $('#confirm_password-error').text('Password must be at least 8 characters long and include uppercase, lowercase, numbers, and special characters.').show();
        isValid = false;
    }
    
    if (password !== confirm_password) {
        $('#confirm_password-error').text('Password not match').show();
        isValid = false;
    }
    
     // Validate confirm password
    if (email === '') {
        $('#email-error').text('email is required.').show();
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

// Function to check if the password is strong
function isStrongPassword(password) {
    const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return strongPasswordRegex.test(password);
}
