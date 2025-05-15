$(document).ready(function () {
    $('#nameForm').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

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
        }

        if (isValid) {
            // Create FormData object to send form data and file data
            var formData = new FormData();
            formData.append('idNumber', idNumber);
            formData.append('firstName', firstName);
            formData.append('lastName', lastName);
            formData.append('email', email);
            formData.append('password', password);
            formData.append('cell', cell);
            formData.append('image', image); // Append the file data

            // Send the form data via AJAX
            $.ajax({
                url: '../php/profile_file.php', // PHP script to handle form submission
                type: 'POST',
                data: formData,
                contentType: false, // Important: Don't set content-type to multipart/form-data manually
                processData: false, // Important: Don't let jQuery process the data
                success: function (response) {
                    alert('Admin profile is updated successfully!');
                    $('#addnew').modal('hide'); // Hide modal after successful submission
                    console.log(response); // Optionally log the response
                    // You can display a success message here or redirect user
                },
                error: function () {
                    alert('Something went wrong with learner update');
                }
            });
        }

        return isValid;
    });
});

// Function to check if the password is strong
function isStrongPassword(password) {
    const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return strongPasswordRegex.test(password);
}