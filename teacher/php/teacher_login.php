<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Teacher Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="../bootstrap/css/style.css">
        <link rel="icon" type="image/x-icon" href="../../image/Trendz-Logo.png">
        <link rel="stylesheet" href="../css/error_message.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="row vh-100 g-0 align-items-center justify-content-center" style="background: #fff;">
            <div class="col-lg-6">
                <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                    <div class="col col-sm-6 col-lg-7 col-xl-6">

                        <a href="#" class="d-flex justify-content-center mb-3">
                            <img src="../icons/teacher-login.png" alt="" width="60">
                        </a>

                        <div class="text-center mb-4">
                            <h3 class="fw-bold">TEACHER</h3>
                            <p class="fw-bold fs-4">Sign-in</p>
                        </div>

                        <form id="loginForm" action="../php/teacher_login_file.php"method="post" onsubmit="return isValidateLogin()">
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-id-card'></i>
                                </span>
                                <input type="text" class="form-control form-control-lg fs-6" id="idNumber" name="idNumber" placeholder="ID Number" >
                            </div>
                            <span id="idNumber-error" class="error-message" ></span><!-- Error message inside the field -->

                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <i class='bx bxs-lock-alt'></i>
                                </span>
                                <input type="password" class="form-control form-control-lg fs-6" id="password" name="password" placeholder="Password" >
                            </div>
                            <span id="password-error" class="error-message"></span> <!-- Error message inside the field -->

                            <button  type="submit" class="btn btn-dark btn-lg w-100 mb-3">Login</button>
                        </form>
                         <div id="response-message" class="mt-3"></div> <!-- Success/Error Message -->
                        <div class="input-group mb-3 d-flex justify-content-between">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="formCheck">
                                <label for="formCheck" class="form-check-lable text-secondary"><small>Remember Me</small></label>
                            </div>
                            <div>
                                <small><a href="../php/teacher_forgot_password.php">Forgot Password</a></small>
                            </div>
                        </div>

                        <div class="text-center">
                            <small>Don't have an account? <a href="teacher_register.php" class="fw-bold">Sign-Up</a></small>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="../javascript/logins.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>