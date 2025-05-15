$(document).ready(function () {
    $('#parentGaurdian').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        if (isParentGuardian()) {
            alert("Step 2 completed successfuly!");
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isParentGuardian() {
    let resides = $('#resides').val();
    let working = $('#working').val();
    let validCertificate = $('#validCertificate').val();
    let idNumber = $('#idNumber').val();
    let title = $('#title').val();
    let name = $('#name').val();
    let status = $('#status').val();
    let language = $('#language').val();
    let ethinic = $('#ethinic').val();
    let mobileNumber = $('#mobileNumber').val();
    let homeNumber = $('#homeNumber').val();
    let workNumber = $('#workNumber').val();
    let email = $('#email').val();
    let streetName = $('#streetName').val();
    let suburbName = $('#suburbName').val();
    let postalCode = $('#postalCode').val();

    // Reset previous error messages
    $('#resides-error').hide();
    $('#working-error').hide();
    $('#validCertificate-error').hide();
    $('#idNumber-error').hide();
    $('#title-error').hide();
    $('#name-error').hide();
    $('#status-error').hide();
    $('#language-error').hide();
    $('#ethinic-error').hide();
    $('#mobileNumber-error').hide();
    $('#homeNumber-error').hide();
    $('#workNumber-error').hide();
    $('#email-error').hide();
    $('#streetName-error').hide();
    $('#suburbName-error').hide();
    $('#postalCode-error').hide();

    $('#response-message').html("");

    let isValid = true;

    // Checking suburb name is empty
    if (!postalCode) {
        $('#postalCode-error').text('Postal code is required').show();
        isValid = false;
    }else if(!/^\d{4}$/.test(postalCode)){
        $('#postalCode-error').text('Only a 4-digit number is allowed for postal code.').show();
        isValid = false;
    }

    // Checking suburb name is empty
    if (!suburbName) {
        $('#suburbName-error').text('Suburb is required').show();
        isValid = false;
    } else if (!/^[A-Za-z]+$/.test(suburbName)) {
        $('#suburbName-error').text('Only letters are allowed for suburb name.').show();
        isValid = false;
    }

    // Checking street name is empty
    if (!streetName) {
        $('#streetName-error').text('Street name is required').show();
        isValid = false;
    }

    // Checking email is empty
    if (!email) {
        $('#email-error').text('Email addrss is required').show();
        isValid = false;
    } else if (!/^(?!\s+$).+/.test(email)) {
        $('#email-error').text('Email addrss does not contain spaces').show();
        isValid = false;
    }

    //validate home number
    if (!workNumber) {
        $('#workNumber-error').text('Work phone number is required').show();
        isValid = false;
    } else if (!validateSouthAfricanCellphone3(workNumber)) {
        isValid = false;
    }

    //validate home number
    if (!homeNumber) {
        $('#homeNumber-error').text('Home phone number is required').show();
        isValid = false;
    } else if (!validateSouthAfricanCellphone2(homeNumber)) {
        isValid = false;
    }

    //validate mobile number
    if (!mobileNumber) {
        $('#mobileNumber-error').text('Mobile phone number is required').show();
        isValid = false;
    } else if (!validateSouthAfricanCellphone1(mobileNumber)) {
        isValid = false;
    }


    // Checking ethinic group is empty
    if (!ethinic) {
        $('#ethinic-error').text('Ethinic group is required').show();
        isValid = false;
    }

    // Checking language is empty
    if (!language) {
        $('#language-error').text('Language is required').show();
        isValid = false;
    }

    // Checking status is empty
    if (!status) {
        $('#status-error').text('Status is required').show();
        isValid = false;
    }

    // Checking names is empty and handle letters and spaces between words
    if (!name) {
        $('#name-error').text('Name is required').show();
        isValid = false;
    } else if (!/^[A-Za-z ]+$/.test(name)) {
        $('#name-error').text('Names must contain Only letters and spaces are allowed.').show();
        isValid = false;
    }

    // Checking title is empty
    if (!title) {
        $('#title-error').text('Title is required').show();
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

    // Checking reside is empty
    if (!validCertificate) {
        $('#validCertificate-error').text('Citenz is required').show();
        isValid = false;
    }

    // Checking working parent is empty
    if (!working) {
        $('#working-error').text('Working parent is required').show();
        isValid = false;
    }

    // Checking reside is empty
    if (!resides) {
        $('#resides-error').text('Resided is required').show();
        isValid = false;
    }

    return isValid;
};


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

function validateSouthAfricanCellphone1(number) {
    // Remove any non-digit characters (like spaces or dashes)
    let sanitizedNumber = number.replace(/\D/g, '');

    // Check if number has exactly 10 digits
    if (sanitizedNumber.length !== 10) {
        $('#mobileNumber-error').text('The number must have exactly 10 digits.').show();
        return false;
    }

    // Check if the number starts with a valid South African cellphone prefix (e.g., 083, 084, 072)
    let validPrefixes = ['08', '06', '07'];
    let prefix = sanitizedNumber.slice(0, 2);  // Extract the first 3 digits for prefix checking

    if (!validPrefixes.includes(prefix)) {
        $('#mobileNumber-error').text('Invalid South African cellphone number prefix.').show();
        return false;
    }

    return true;
}

function validateSouthAfricanCellphone2(number) {
    // Remove any non-digit characters (like spaces or dashes)
    let sanitizedNumber = number.replace(/\D/g, '');

    // Check if number has exactly 10 digits
    if (sanitizedNumber.length !== 10) {
        $('#homeNumber-error').text('The number must have exactly 10 digits.').show();
        return false;
    }

    // Check if the number starts with a valid South African cellphone prefix (e.g., 083, 084, 072)
    let validPrefixes = ['08', '06', '07'];
    let prefix = sanitizedNumber.slice(0, 2);  // Extract the first 3 digits for prefix checking

    if (!validPrefixes.includes(prefix)) {
        $('#homeNumber-error').text('Invalid South African cellphone number prefix.').show();
        return false;
    }

    return true;
}

function validateSouthAfricanCellphone3(number) {
    // Remove any non-digit characters (like spaces or dashes)
    let sanitizedNumber = number.replace(/\D/g, '');

    // Check if number has exactly 10 digits
    if (sanitizedNumber.length !== 10) {
        $('#workNumber-error').text('The number must have exactly 10 digits.').show();
        return false;
    }

    // Check if the number starts with a valid South African cellphone prefix (e.g., 083, 084, 072)
    let validPrefixes = ['08', '06', '07', '01'];
    let prefix = sanitizedNumber.slice(0, 2);  // Extract the first 3 digits for prefix checking

    if (!validPrefixes.includes(prefix)) {
        $('#workNumber-error').text('Invalid South African cellphone number prefix.').show();
        return false;
    }

    return true;
}