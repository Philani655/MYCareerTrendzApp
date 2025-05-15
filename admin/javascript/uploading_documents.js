$(document).ready(function () {
    $('#uploadDocuments').submit(function (event) {
        event.preventDefault(); // Prevent default form submission

        if (isUploadDocuments()) {
            alert("Application processed");
            this.submit(); // Proceed with submission if validation passes
        }
    });
});

function isUploadDocuments() {
    let birthDoc = $('#birthDoc').val();
    let qualificationDoc = $('#qualificationDoc').val();

    // Reset previous error messages
    $('#birthDoc-error').hide();
    $('#qualificationDoc-error').hide();

    let isValid = true;

    //check qualification  empty
    if (!qualificationDoc) {
        $('#qualificationDoc-error').text('Upload teachering qualification doc').show();
        isValid = false;
    }
    
    //check birth certificate or id number documents empty
    if (!birthDoc) {
        $('#birthDoc-error').text('Upload birth certificate/ID doc').show();
        isValid = false;
    }


    return isValid;
}
;