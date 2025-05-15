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
    let parentIdDoc = $('#parentIdDoc').val();
    let reportDoc = $('#reportDoc').val();

    // Reset previous error messages
    $('#birthDoc-error').hide();
    $('#parentIdDoc-error').hide();
    $('#reportDoc-error').hide();

    let isValid = true;

    //check subject id empty
    if (!reportDoc) {
        $('#reportDoc-error').text('Upload final previous grade report doc').show();
        isValid = false;
    }
    
    //check  parent/guardian id  empty
    if (!parentIdDoc) {
        $('#parentIdDoc-error').text('Upload parent/guardian id doc').show();
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