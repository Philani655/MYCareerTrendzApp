<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year: <?php
                        $currentYear = date('Y');
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        echo $yearRange;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/learner_dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Learner Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="font-weight: bold;"><img src="../icons/mentorship.png" width="28"> SUBJECTS ALIGNMENT & CAREER PATHING</h3>
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="container col-md-12">
                                            <p style="font-size: 16px;">!Click on the button below to view your possible careers that are aligning with your subjects.</p>
                                           
                                            <?php
                                            include '../database/config.php';

                                            $idNumber = $_SESSION['idNumber'];

                                            if (!isset($_SESSION['idNumber'])) {
                                                echo "<script>alert('Something went wrong');</script>";
                                                echo "<script>window.location.href='../php/learner_dashboard.php'</script>";
                                                exit();
                                            }

                                            // Prepare the SQL query
                                            $sql = "SELECT s.id as id, s.subjectname as subjectname, s.subjectcode as subjectcode, s.grade_id as grade_id ,g.grade_name as grade_name 
                                                            FROM subjects s 
                                                            JOIN learner l ON l.grade_id = s.grade_id   
                                                            JOIN grade g ON l.grade_id = g.id 
                                                            WHERE s.learner_id = ?
                                                            GROUP by s.id ,  s.subjectname , s.subjectcode , s.grade_id ";

                                            // Prepare the statement
                                            $stmt = $conn->prepare($sql);

                                            // Bind parameters
                                            $stmt->bind_param("s", $idNumber);

                                            // Execute the query
                                            $stmt->execute();

                                            // Get the result
                                            $result = $stmt->get_result();

                                            $subjects = '';
                                            // Check if any rows are returned
                                            if ($result->num_rows > 0) {
                                                // Loop through and display the results
                                                while ($row = $result->fetch_assoc()) {
                                                    $subjects .= $row['subjectname'] . ',';
                                                }
                                            }

                                            $stmt->close();
                                            ?>

                                            <p class="text-center">
                                            <div class="form-group">
                                                <input
                                                    type="hidden"
                                                    class="form-control"
                                                    id="userInput"
                                                    placeholder="Enter your question" 
                                                    value="List careers align with these subjects:<?php echo $subjects; ?> and Is there an app in education south africa with a career i seek to pursue before applying at university or TVET college ?">
                                            </div>
                                            </p>
                                            <button class="btn btn-info" onclick="sendMessage()"><i class="fa-solid fa-eye"></i> Careers</button>
                                            <br><br>
                                            <div class="chart">
                                                <div class="container" style="border: 1px solid #566573; border-radius: 10px; background-color: #fff; width: 100%; margin-top: 10px;">
                                                    <div style="color: black;" id="response"></div>
                                                </div>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- ./box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <?php include '../php/footer.php'; ?>
        </div> <!-- /.wrapper -->

        <script>
            async function sendMessage() {
                const input = document.getElementById('userInput').value;
                const responseDiv = document.getElementById('response');
                if (!input) {
                    responseDiv.innerHTML = 'Please enter a message.';
                    return;
                }
                responseDiv.innerHTML = 'Loading...';
                try {
                    const response = await fetch(
                            'https://openrouter.ai/api/v1/chat/completions',
                            {
                                method: 'POST',
                                headers: {
                                    Authorization: 'Bearer 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',
                                    'HTTP-Referer': 'https://www.sitename.com',
                                    'X-Title': 'SiteName',
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    model: 'deepseek/deepseek-r1:free',
                                    messages: [{role: 'user', content: input}],
                                }),
                            },
                            );
                    const data = await response.json();
                    console.log(data);
                    const markdownText =
                            data.choices?.[0]?.message?.content || 'No response received.';
                            responseDiv.innerHTML = marked.parse(markdownText);
                } catch (error) {
                    responseDiv.innerHTML = 'Error: ' + error.message;
                }
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <?php include '../javascript/script.js';?>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

            .container {
                font-family: "Montserrat", sans-serif;
                font-size: 14px;
            }

        </style>

    </body>
</html>
