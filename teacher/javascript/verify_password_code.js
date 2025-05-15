document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form');

    form.addEventListener('submit', function (event) {
        event.preventDefault();
        if (verification())
        {
            form.submit();
            alert('Successfully verification');
        } else
        {
            alert('Please correct the highlighted errors and try again.');
        }
    });

    document.getElementById('otp1').addEventListener('input', verfication_code);
    document.getElementById('otp2').addEventListener('input', verfication_code);
    document.getElementById('otp3').addEventListener('input', verfication_code);
    document.getElementById('otp4').addEventListener('input', verfication_code);
    document.getElementById('otp5').addEventListener('input', verfication_code);
    document.getElementById('otp6').addEventListener('input', verfication_code);

    function verification() {
        const isVerification = verfication_code();
        return isVerification;
    }

    function verfication_code()
    {
        // Collect OTP values
        const code = Array.from({length: 6}, (_, i) => document.getElementById(`otp${i + 1}`).value).join('');

        const randomNumber = document.getElementById('randomNumber').value;
        const feedback = document.getElementById('codeFeedback');


        if (randomNumber === code)
        {
            feedback.textContent = 'Valid verification OTP code';
            feedback.classList.add('valid');
            feedback.classList.remove('error');
            return true;
        } else
        {
            feedback.textContent = 'Invalid verification OTP code';
            feedback.classList.add('error');
            feedback.classList.remove('valid');
            return false;
        }
    }
});