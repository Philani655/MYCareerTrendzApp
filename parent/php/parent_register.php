<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Parent Register</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="../css/register.css">   
        <link rel="stylesheet" href="../css/error_message.css">   
        <link rel="icon" type="image/x-icon" href="../../image/Trendz-Logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>
    <body>
        <div class="container">
            <div class="form-container">
                <div class="col-md-8 col-lg-6">
                    <form class="mx-auto" action="../php/parent_register_file.php" method="post" onsubmit="return isValidateRegister()">
                        <!-- Logo -->
                        <a href="#" class="d-flex justify-content-center">
                            <img src="../icons/family-1.png" alt="MYCareerTrendz Logo" width="60">
                        </a>

                        <!-- Heading -->
                        <h4 class="text-center">PARENT</h4>
                        <div class="mb-3 text-center">
                            <span class="fs-5 fw-bold">Sign Up</span>
                        </div>

                        <!-- ID Number -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bxs-id-card' aria-label="ID Number"></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" id="idNumber" name="idNumber" placeholder="ID Number" required>
                        </div>
                        <span id="idNumber-error" class="error-message" ></span><!-- Error message inside the field -->


                        <!-- Name -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill" aria-label="Name"></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" id="name" name="name" placeholder="Names" required>
                        </div>
                        <span id="name-error" class="error-message" ></span><!-- Error message inside the field -->

                        <!-- Surname -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class="bi bi-person-fill" aria-label="Surname"></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" id="surname" name="surname" placeholder="Surname" required>
                        </div>
                        <span id="surname-error" class="error-message" ></span><!-- Error message inside the field -->

                        <!-- Cell Phone Number -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bxs-phone' aria-label="Cell Phone Number"></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" id="cell" name="cell" placeholder="Cell Phone Number" required>
                        </div>
                        <span id="cell-error" class="error-message" ></span><!-- Error message inside the field -->
                 
                        <!-- Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bxs-lock-alt' aria-label="Password"></i>
                            </span>
                            <input type="password" class="form-control form-control-lg fs-6" id="password" name="password" placeholder="Password" required>
                        </div>
                        <span id="password-error" class="error-message" ></span><!-- Error message inside the field -->
                        
                        <!-- Confirm Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bxs-lock-alt' aria-label="Confirm Password"></i>
                            </span>
                            <input type="password" class="form-control form-control-lg fs-6" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                        </div>
                        <span id="confirm_password-error" class="error-message" ></span><!-- Error message inside the field -->

                        <!-- Email -->
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bxs-envelope' aria-label="Email"></i>
                            </span>
                            <input type="email" class="form-control form-control-lg fs-6" id="email" name="email" placeholder="Email" required>
                        </div>
                        <span id="email-error" class="error-message" ></span><!-- Error message inside the field -->

                        <div class="mt-4 form-check">
                            <input type="checkbox" class="form-check-input" id="check">
                            <label class="form-check-label" for="check">I hereby declare that the above information is true and correct</label>
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg" style="background: #000;">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="../javascript/register.js"></script>
    </body>
</html>