// Automatically move to the next input
const inputs = document.querySelectorAll(".otp-input");

inputs.forEach((input, index) => {
    input.addEventListener("input", (event) => {
        const value = event.target.value;
        if (value && index < inputs.length - 1) {
            inputs[index + 1].focus();
        }
    });

    input.addEventListener("keydown", (event) => {
        if (event.key === "Backspace" && index > 0 && !event.target.value) {
            inputs[index - 1].focus();
        }
    });
});

document.getElementById("otpForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default submission

    let otp = "";
    inputs.forEach(input => {
        otp += input.value;
    });

    let errorMessage = document.getElementById("errorMessage");
    let correctOtp = document.getElementById('randomNumber').value;

    if (otp === correctOtp) {
        alert("OTP Verified Successfully!");
        this.submit(); // Automatically submit the form when OTP is correct
    } else {
        errorMessage.textContent = "Invalid OTP. Please try again.";
    }
});
