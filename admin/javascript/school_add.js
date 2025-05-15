$(document).ready(function () {
    $('#schoolInformation').submit(function (event) {
        event.preventDefault(); // Prevent default form submission
        if (isSchoolInformation()) {
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isSchoolInformation() {
    let school = $('#school').val();
    let address = $('#address').val();
    let suburb = $('#suburb').val();
    let postalCode = $('#postalCode').val();
    let email = $('#email').val();
    let officeNo = $('#officeNo').val();


    // Reset previous error messages
    $('#school-error').hide();
    $('#address-error').hide();
    $('#suburb-error').hide();
    $('#postalCode-error').hide();
    $('#email-error').hide();
    $('#officeNo-error').hide();


    let isValid = true;
     
    //validate home number
    if (!officeNo) {
        $('#officeNo-error').text('Office contact number is required').show();
        isValid = false;
    } else if (!validateSouthAfricanCellphone(officeNo)) {
        isValid = false;
    }
    
    
    //check email is empty
    if (!email) {
        $('#email-error').text('Office email address is required').show();
        isValid = false;
    }

    //check postal code is empty
    if (!postalCode) {
        $('#postalCode-error').text('Postal code is required').show();
        isValid = false;
    } else if (!/^\d{4}$/.test(postalCode)) {
        $('#postalCode-error').text('Only a 4-digit number is allowed for postal code').show();
        isValid = false;
    }
    
    // Checking suburb is empty and handle letters and spaces between words
    if (!suburb) {
        $('#suburb-error').text('Suburb name is required').show();
        isValid = false;
    } else if (!/^[A-Za-z]+$/.test(suburb)) {
        $('#suburb-error').text('Suburb name must contain Only letters.').show();
        isValid = false;
    }

    //check school address is empty
    if (!address) {
        $('#address-error').text('School address is required').show();
        isValid = false;
    }

    // Checking school is empty and handle letters and spaces between words
    if (!school) {
        $('#school-error').text('School name is required').show();
        isValid = false;
    } else if (!/^[A-Za-z ]+$/.test(school)) {
        $('#school-error').text('School name must contain Only letters and spaces are allowed.').show();
        isValid = false;
    }

    return isValid;
}
;

function validateSouthAfricanCellphone(number) {
    // Remove any non-digit characters (like spaces or dashes)
    let sanitizedNumber = number.replace(/\D/g, '');

    // Check if number has exactly 10 digits
    if (sanitizedNumber.length !== 10) {
        $('#officeNo-error').text('The number must have exactly 10 digits.').show();
        return false;
    }

    // Check if the number starts with a valid South African cellphone prefix (e.g., 083, 084, 072)
    let validPrefixes = ['08', '06', '07' , '01'];
    let prefix = sanitizedNumber.slice(0, 2);  // Extract the first 3 digits for prefix checking

    if (!validPrefixes.includes(prefix)) {
        $('#officeNo-error').text('Invalid South African cellphone number prefix.').show();
        return false;
    }

    return true;
}