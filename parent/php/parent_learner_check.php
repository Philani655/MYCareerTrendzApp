<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parent Check Learner Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/x-icon" href="../../image/Trendz-Logo.png">
    <link href='../css/error_message.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="row vh-100 g-0 align-items-center justify-content-center">
        <div class="col-lg-8">
            <div class="row align-items-center justify-content-center h-100 g-0 px-4 px-sm-0">
                <div class="col col-sm-6 col-lg-7 col-xl-6">

                    <div class="text-center mb-4">
                        <h3 class="fw-bold">LEARNER ID NUMBER</h3>
                        <p class="mt-3" style="text-align: start;"><small>Enter the ID number of your child.</small></p>
                    </div>

                    <form action="../php/parent_learner_check_file.php" method="post" id="parentLearnerCheck">
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <i class='bx bxs-id-card'></i>
                            </span>
                            <input type="text" class="form-control form-control-lg fs-6" name="learnerId" id="learnerId" placeholder="ID Number">
                        </div>
                        <span id="learnerId-error" class="error-message"></span>
                        <button type="submit" class="btn btn-dark btn-lg w-100 mt-3">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="../javascript/parent_learner_check.js">    
    </script>
</body>
</html>
