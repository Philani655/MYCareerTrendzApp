<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../css/error_message.css">
        <link rel="icon" type="image/x-icon" href="../../image/Trendz-Logo.png">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="row vh-100 g-0 align-items-center justify-content-center">

            <div class="col-lg-8">
                <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                    <div class="col col-sm-6 col-lg-7 col-xl-6">

                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Forgot Your Password?</h3>
                            <p class="mt-3" style="text-align: start;"><small>Reset your password by submitting your email address and ID number .
                                    We will send you an email with a verification OTP code to choose a new password.</small></p>
                        </div>

                        <form id="forgotPasswordForm" action="../php/parent_forgot_password_file.php" method="post" onsubmit="return isForgotPassword();" enctype="multipart/form-data">

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-envelope' ></i>
                                </span>
                                <input type="text" class="form-control form-control-lg fs-6" name="idNumber" id="idNumber" placeholder="ID Number">
                            </div>
                            <span id="idNumber-error" class="error-message" ></span><!-- Error message inside the field -->

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-envelope' ></i>
                                </span>
                                <input type="email" class="form-control form-control-lg fs-6" name="email" id="email" placeholder="Email Address" >
                            </div>
                            <span id="email-error" class="error-message" ></span><!-- Error message inside the field -->
                            <button type="submit" class="btn btn-dark btn-lg w-100 mt-3">Submit</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
   
        <script src="../javascript/forgot_password.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>