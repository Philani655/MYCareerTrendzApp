<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="../../image/Trendz-Logo.png">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/styles.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="login-container">
            <div class="login-box">
                <h2>Admin Login</h2>
                <form id="loginForm" action="../php/login_file.php" method="post" onsubmit="return isValidateLogin()" enctype="multipart/form-data">
                    <div class="textbox">
                        <label for="idNumber">ID Number <span class="required">*</span></label>
                        <input type="text" id="idNumber"  name="idNumber" placeholder="ID Number" >
                        <div id="idNumber-error" class="error-message"></div> <!-- Error message inside the field -->
                    </div>
                    <div class="textbox">
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" id="password" name="password" placeholder="Password" >
                        <div id="password-error" class="error-message"></div> <!-- Error message inside the field -->
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="remember-me">
                        <label>
                            <input type="checkbox" id="rememberMe"> Remember Me
                        </label>
                    </div>

                    <div class="button-container">
                        <button type="submit" class="login-btn">Login</button>
                    </div>             
                </form>
                <!-- Forgot Password Link -->
                <div class="forgot-password">
                    <a href="../php/reset_password.php" id="forgotPasswordLink">Forgot Password?</a>
                </div>
            </div>
        </div>
        <!-- Include jQuery (CDN) -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="../javascript/login.js"></script>
    </body>
</html>