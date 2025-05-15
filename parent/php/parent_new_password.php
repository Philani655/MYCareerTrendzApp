<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Reset Password</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../css/error_message.css">
    </head>
    <body>
        <div class="row vh-100 g-0 align-items-center justify-content-center">

            <div class="col-lg-8">
                <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                    <div class="col col-sm-6 col-lg-7 col-xl-6">

                        <div class="text-center mb-4">
                            <h3 class="fw-bold">Reset Password</h3>
                            <p class="mt-3" style="text-align: center;">Please enter the new password below.</p>
                        </div>

                        <form id="comparePasswords"action="../php/parent_new_password_file.php" method="post" onsubmit="return isComparePasswords();">

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-lock-alt' ></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" name="password" id="password" placeholder="New Password">
                            </div>
                            <span id="password-error" class="error-message" ></span><!-- Error message inside the field -->

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-lock-alt' ></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" name="confrimPassword" id="confrimPassword" placeholder="Confrim Password">
                            </div>
                            <span id="confrimPassword-error" class="error-message" ></span><!-- Error message inside the field -->
                            <button type="submit" class="btn btn-dark btn-lg w-100 mt-3">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../javascript/compare_forgot_password.js"></script>
    </body>
</html>