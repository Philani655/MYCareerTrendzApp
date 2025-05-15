<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper"> 
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php'; ?>
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
                        <li class="active">teacher message</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/bubble-chat-1.png" alt="chat" width="25"/> Chats</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="chart">
                                                <!-- Display announcements -->
                                                <div class="container-fluid">
                                                    <?php
                                                    include '../database/config.php';
                                                    $grade_id = $_SESSION['grade_id'];
                                                    $subjectname = $_SESSION['subjectname'];
                                                    $subjectcode = $_SESSION['subjectcode'];
                                                    $idNumber = $_SESSION['idNumber'];

                                                    // SQL Query
                                                    $sql = "SELECT m.teacher_id AS teacher_id,
                                                                   m.message AS message, 
                                                                   m.status AS status,  
                                                                   m.msg_status AS msg_status,
                                                                   m.date_time AS date_time,
                                                                   t.location AS location, 
                                                                   t.name AS name, 
                                                                   t.surname AS surname 
                                                            FROM messages m, subjects su, teacher t
                                                            WHERE m.teacher_id = su.learner_id 
                                                              AND m.teacher_id = t.idno 
                                                              AND su.subjectcode = ? 
                                                              AND su.subjectname = ? 
                                                              AND su.grade_id = ? 
                                                              AND m.user_id = ?";

                                                    // Prepare statement
                                                    $stmt = $conn->prepare($sql);
                                                    $stmt->bind_param("ssis", $subjectcode, $subjectname, $grade_id, $idNumber);
                                                    $stmt->execute();
                                                    $result = $stmt->get_result();

                                                    $teacher_id = '';
                                                    // Check if messages exist
                                                    if ($result->num_rows > 0) {
                                                        $values = $result->fetch_assoc();
                                                        $teacher_id = $values['teacher_id'];
                                                        ?>

                                                        <div class="chat-container">
                                                            <div class="chat-header">
                                                                <div class="user-info">
                                                                    <img src="<?php echo $values['location'] ?>" alt="User" class="user-img">
                                                                    <div>
                                                                        <h4><?php echo $values['name'] . ' ' . $values['surname'] ?></h4>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="chat-body" id="chatBody">
                                                                <!-- Example messages -->
                                                                <?php
                                                                while ($row = $result->fetch_assoc()) {
                                                                    if ($row['msg_status'] == 1) {
                                                                        ?>

                                                                        <div class="message sent">
                                                                            <p><?php echo $row['message'] ?></p>
                                                                            <span class="time"><?php echo $row['date_time']; ?></span>
                                                                        </div><?php } else { ?>

                                                                        <div class="message received" style="margin-left: 100px;">
                                                                            <p><?php echo $row['message'] ?></p>
                                                                            <span class="time"><?php echo $row['date_time'] ?></span>
                                                                        </div><?php
                                                                    }
                                                                }
                                                            
                                                            ?>
                                                        </div>

                                                        <form action="../php/learner_sent_message_file.php" method="post">
                                                            <div class="chat-footer">
                                                                <input type="hidden" name="teacher_id" value="<?php echo $teacher_id; ?>">
                                                                <input type="text" id="messageInput" name="message" placeholder="Type a message..." />
                                                                <button type="submit" id="sendBtn" >Send</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <?php }else{?><p>There is no chats!</p><?php }?>
                                                </div>            <!-- <p>There are no teacher message</p> -->
                                            </div>
                                        </div><!-- /.chart-responsive -->
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                            </div><!-- ./box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
        <?php include '../php/footer.php'; ?>
    </div><!-- /.content-wrapper -->

    <?php include '../javascript/script.js'; ?>

    <script>
        document.getElementById('sendBtn').addEventListener('click', function () {
            const messageInput = document.getElementById('messageInput');
            const chatBody = document.getElementById('chatBody');

            if (messageInput.value.trim() !== '') {
                // Create message element
                const message = document.createElement('div');
                message.classList.add('message', 'sent');
                message.innerHTML = `<p>${messageInput.value}</p><span class="time">${new Date().toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'})}</span>`;

                // Append message to chat body
                chatBody.appendChild(message);
                chatBody.scrollTop = chatBody.scrollHeight; // Auto-scroll to the bottom


            }
        });
    </script>

    <style>

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    body {
        font-family: "Montserrat", sans-serif;
    }

    @media only screen and (max-width: 500px) {

        .chat-container{
            width: 100%;
        }

    }

    </style>

</body>
</html>
