$(document).ready(function () {
    $('#learnerAdmission').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        if (isLearnerAdmission()) {
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isLearnerAdmission() {
    let validCertificate = $('#validCertificate').val();
    let idNumber = $('#idNumber').val();
    let gender = $('#gender').val();
    let date = $('#date').val();
    let title = $('#title').val();
    let initials = $('#initials').val();
    let surname = $('#surname').val();
    let firstNames = $('#firstNames').val();
    let maidenName = $('#maidenName').val();
    let status = $('#status').val();
    let language = $('#language').val();
    let ethinic = $('#ethinic').val();

    let streetName = $('#streetName').val();
    let suburbName = $('#suburbName').val();
    let postalCode = $('#postalCode').val();
    let mobileNumber = $('#mobileNumber').val();
    let email = $('#email').val();
    let verifyEmail = $('#verifyEmail').val();


    // Reset previous error messages
    $('#validCertificate-error').hide();
    $('#idNumber-error').hide();
    $('#gender-error').hide();
    $('#date-error').hide();
    $('#title-error').hide();
    $('#initials-error').hide();
    $('#surname-error').hide();
    $('#firstNames-error').hide();
    $('#maidenName-error').hide();
    $('#status-error').hide();
    $('#language-error').hide();
    $('#ethinic-error').hide();

    $('#streetName-error').hide();
    $('#suburbName-error').hide();
    $('#postalCode-error').hide();
    $('#mobileNumber-error').hide();
    $('#email-error').hide();
    $('#verifyEmail-error').hide();

    $('#response-message').html("");

    let isValid = true;

    if (!language) {
        $('#language-error').text('Language is required').show();
        isValid = false;
    }

    //comparing emails
    if (verifyEmail !== email) {
        $('#verifyEmail-error').text('Email address not matched').show();
        isValid = false;
    }

    //check email space
    if (!verifyEmail) {
        $('#verifyEmail-error').text('Verify email address is required').show();
        isValid = false;
    } else if (verifyEmail.includes(' ')) {
        $('#verifyEmail-error').text('Verify email address does not have spaces').show();
        isValid = false;
    }

    //check email space
    if (!email) {
        $('#email-error').text('Email address is required').show();
        isValid = false;
    } else if (email.includes(' ')) {
        $('#email-error').text('Email address does not have spaces').show();
        isValid = false;
    }

    //validate mobile number
    if (!mobileNumber) {
        $('#mobileNumber-error').text('Mobile number is required').show();
        isValid = false;
    } else if (!validateSouthAfricanCellphone(mobileNumber)) {
        isValid = false;
    }



    // Check if postCode is empty
    if (!postalCode) {
        $('#postalCode-error').text('Post code is required').show();
        isValid = false;
    }
    // Check if postCode contains exactly 4 digits
    else if (!/^\d{4}$/.test(postalCode)) {
        $('#postalCode-error').text('Invalid post code. It must contain exactly 4 digits with no letters or special characters.').show();
        isValid = false;
    }

    //check suburb name if null or not
    if (!suburbName) {
        $('#suburbName-error').text('Suburb name is required').show();
        isValid = false;
    } else if (!/^[A-Za-z]+$/.test(suburbName)) {
        $('#suburbName-error').text('Invalid format. Only letters are allowed for Suburb name.').show();
        isValid = false;
    }

    //check street name if null or not
    if (!streetName) {
        $('#streetName-error').text('Street name is required').show();
        isValid = false;
    }

    //check ethinic if null or not
    if (!ethinic) {
        $('#ethinic-error').text('Ethinic group is required').show();
        isValid = false;
    }



    //check status if null or not
    if (!status) {
        $('#status-error').text('Status is required').show();
        isValid = false;
    }

    //check Maid Name 
    if (!maidenName) {
        $('#maidenName-error').text('Maid names is required').show();
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(maidenName)) {// Regex to allow letters separated by a dot
        $('#maidenName-error').text('Maid names must have only letters').show();
        isValid = false;
    }

    //check first Name 
    if (!firstNames) {
        $('#firstNames-error').text('First names is required').show();
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(firstNames)) {// Regex to allow letters separated by a dot
        $('#firstNames-error').text('First names must have only letters').show();
        isValid = false;
    }

    //check surname 
    if (!surname) {
        $('#surname-error').text('Surname is required').show();
        isValid = false;
    } else if (!/^[A-Za-z\s]+$/.test(surname)) {// Regex to allow letters separated by a dot
        $('#surname-error').text('Surname must have only letters').show();
        isValid = false;
    }

    //check initials 
    if (!initials) {
        $('#initials-error').text('Initials is required').show();
        isValid = false;
    } else if (!/^[A-Z](\.[A-Z])*\.?$/i.test(initials)) {// Regex to allow letters separated by a dot
        $('#initials-error').text('Invalid initials format. Use only letters separated by dots (e.g., A.B.C)').show();
        isValid = false;
    }

    //check title if null or not
    if (!title) {
        $('#title-error').text('Title is required').show();
        isValid = false;
    }else if(!compareTitleWithId(title,idNumber)){
        $('#title-error').text('Invalid selected title').show();
        isValid = false;
    }

    //check date if null or not
    if (!date) {
        $('#date-error').text('Date of birth is required').show();
        isValid = false;
    } else if (!compareDobWithId(date, idNumber)) {
        $('#date-error').text('Invalid date of birth.DOB must match id number').show();
        isValid = false;
    }

    //check gender if null or not
    if (!gender) {
        $('#gender-error').text('Gender is required').show();
        isValid = false;
    }else if(!compareGenderWithId(gender,idNumber)){
        $('#gender-error').text('Invalid selected gender.').show();
        isValid = false;
    }

    //check validation if null or not
    if (!validCertificate) {
        $('#validCertificate-error').text('Citenz is required').show();
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

function validateSouthAfricanCellphone(number) {
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


function compareDobWithId(dobInput, idNumber) {
    // Extract date from ID number
    const yearPart = idNumber.substring(0, 2); // Get first 2 digits for year
    const monthPart = idNumber.substring(2, 4); // Next 2 digits for month
    const dayPart = idNumber.substring(4, 6); // Next 2 digits for day

    // Determine the century (Assuming 1900s or 2000s)
    let fullYear;
    if (parseInt(yearPart) > 22) { // Assuming IDs are issued after 1923
        fullYear = "19" + yearPart;
    } else {
        fullYear = "20" + yearPart;
    }

    // Combine extracted parts into date format
    const extractedDate = `${fullYear}-${monthPart}-${dayPart}`;

    // Compare dates
    if (dobInput === extractedDate) {
        return true;
    } else {
        return false;
    }
}

function compareGenderWithId(gender, idNumber) {
    // Extract SSSS (7th to 10th digits)
    const ssss = idNumber.substring(6, 10);

    // Ensure SSSS is numeric and has 4 digits
    if (isNaN(ssss) || ssss.length !== 4) {
        console.error('Invalid ID Number');
        return false;
    }

    // Determine gender from SSSS
    let idGender;
    if (parseInt(ssss) >= 5000) {
        idGender = "male";
    } else {
        idGender = "female";
    }

    // Compare provided gender with the gender inferred from SSSS
    return gender.toLowerCase() === idGender;
}

function compareTitleWithId(title, idNumber) {
    // Extract SSSS (7th to 10th digits)
    const ssss = idNumber.substring(6, 10);

    // Ensure SSSS is numeric and has 4 digits
    if (isNaN(ssss) || ssss.length !== 4) {
        console.error('Invalid ID Number');
        return false;
    }

    // Determine gender from SSSS
    let expectedTitle;
    if (parseInt(ssss) >= 5000) {
        expectedTitle = "Mr";
    } else {
        expectedTitle = "Ms";
    }

    // Compare the provided title with the expected title (case-insensitive)
    return title.toLowerCase() === expectedTitle.toLowerCase();
}




