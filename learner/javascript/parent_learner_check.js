$(document).ready(function () {
    // Attach submit event to the form
    $('#parentLearnerCheck').on('submit', function (event) {
        event.preventDefault(); // Prevent form submission

        let learnerId = $('#learnerId').val().trim();

        // Reset previous error messages
        $('#learnerId-error').hide().text('');

        let isValid = true;

        // Check if field is empty
        if (learnerId === '') {
            $('#learnerId-error').text('ID Number is required.').show();
            isValid = false;
        }

        // Check if it is exactly 13 digits and numeric
        if (!/^\d{13}$/.test(learnerId)) {
            $('#learnerId-error').text('ID Number must be exactly 13 digits and contain only numbers.').show();
            isValid = false;
        }

        // Validate ID Number using Luhn Algorithm
        if (!isValidLuhn(learnerId)) {
            $('#learnerId-error').text('Invalid ID Number. Please enter a valid one.').show();
            isValid = false;
        }

        // If all checks are passed, submit the form (You can handle your AJAX here)
        if (isValid) {
            // Optionally, you can use AJAX here for form submission
            alert('Form is valid! Proceeding to submit.');
            this.submit(); // If you want to use the default form action
        }
    });
});

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

