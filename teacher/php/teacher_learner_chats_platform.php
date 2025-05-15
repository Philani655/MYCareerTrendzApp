
<html>
    <?php include './head.php'; ?>
    <body class="hold-transition skin-purple sidebar-mini">
        <div class="wrapper">
            <?php include '../php/teacher_header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/page_nav.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        School Year: <?php
                        $currentYear = date("Y");
                        $nextYear = $currentYear + 1;
                        $yearRange = $currentYear . '-' . $nextYear;
                        ?>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="../php/dashboard.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">Assignment</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"><img src="../icons/bubble-chat-1.png" width="25"> Chats</h3>                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <br><br>

                                    <div class="chat-container">
                                        <div class="chat-header">
                                            <div class="user-info">
                                                <img src="<?php echo $_SESSION['location'] ?>" alt="User" class="user-img">
                                                <div>
                                                    <h4><?php echo $_SESSION['fullnames'] ?></h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="chat-body" id="chatBody">
                                            <!-- Example messages -->
                                            <?php
                                            include '../database/config.php';

                                            $sql = "SELECT * FROM messages WHERE user_id = ? ORDER BY date_time ASC";
                                            $stmt = $conn->prepare($sql);
                                            $stmt->bind_param("s", $_SESSION['idno']);
                                            $stmt->execute();
                                            $result = $stmt->get_result();

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    if ($row['msg_status'] == 0) {
                                                        ?>
                                                        <div class="message sent">
                                                            <p><?php echo $row['message'] ?></p>
                                                            <span class="time"><?php echo $row['date_time']; ?></span>
                                                        </div><?php } else{ ?>

                                                        <div class="message received" style="margin-left: 100px;">
                                                            <p><?php echo $row['message'] ?></p>
                                                            <span class="time"><?php echo $row['date_time'] ?></span>
                                                        </div><?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>

                                        <form action="../php/teacher_sent_message_file.php" method="post">
                                            <div class="chat-footer">
                                                <input type="hidden" name="idno" value="<?php echo $_SESSION['idno'] ?>">
                                                <input type="text" id="messageInput" name="message" placeholder="Type a message..." />
                                                <button type="submit" id="sendBtn" >Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.row -->
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </section>
            </div><!-- /.col -->
            <?php include '../php/footer.php'; ?>
        </div><!-- /.row -->

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
