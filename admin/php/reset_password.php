<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <link rel="stylesheet" href="../css/admin_reset_password.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="login-container">
            <div class="login-box">
                <h2>Reset Password</h2>
                <!-- Reset Password Form -->
                <form id="resetPasswordForm">
                    <div class="textbox">
                        <label for="reset-email">Enter your email address to reset password: <span class="required">*</span></label> <!-- Red star added here -->
                        <input type="email" id="reset-email" placeholder="Email Address" >
                        <div id="reset-email-error" class="error-message"></div> <!-- Error message inside the field -->
                    </div>
                    <div class="button-container">
                        <button type="submit" class="reset-btn">Send Reset Link</button>
                    </div>
                    <div class="back-to-login">
                        <a href="../php/login.php">Back to Login</a>
                    </div>
                </form>
            </div>
        </div>

        <script src="../javascript/admin_reset_password.js"></script>
    </body>
</html>
