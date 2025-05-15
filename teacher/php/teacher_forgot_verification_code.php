<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>OTP Verification</title>
        <link rel="stylesheet" href="../css/otp_code_verification.css">
    </head>
    <body>
        <?php
        session_start();
        $randomNumber = $_SESSION['randomNumber'];
        ?>
        <div class="otp-container">
            <h2>OTP Verification</h2>
            <p>Enter the 6-digit OTP sent to your email/phone:</p>
            <form id="otpForm" method="Post" action="../php/teacher_new_password.php">
                <div class="otp-box">
                    <input type="text" maxlength="1" class="otp-input" required>
                    <input type="text" maxlength="1" class="otp-input" required>
                    <input type="text" maxlength="1" class="otp-input" required>
                    <input type="text" maxlength="1" class="otp-input" required>
                    <input type="text" maxlength="1" class="otp-input" required>
                    <input type="text" maxlength="1" class="otp-input" required>
                    <input type="hidden" name="randomNumber" id="randomNumber" value="<?php echo $randomNumber ;?>"> 
                </div>
                <button type="submit">Verify OTP</button>
                <p class="message" id="errorMessage"></p>
            </form>
        </div>
        <script src="../javascript/otp_code_verification.js"></script>
    </body>
</html>