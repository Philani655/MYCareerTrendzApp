<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../../../image/Trendz-Logo.png">
        <title>Event Calendar </title>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/css/evo-calendar.min.css'>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/css/evo-calendar.midnight-blue.min.css'><link rel="stylesheet" href="./style.css">
    </head>
    <body>
        <!-- partial:index.partial.html -->
        <div class="hero">
            <div id="calendar"></div>
        </div>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/evo-calendar@1.1.3/evo-calendar/js/evo-calendar.min.js'></script><script  src="./script.js"></script>

        <?php
        $currentYear = date("Y");
        $nextYear = $currentYear + 1;
        $yearRange = $currentYear . '-' . $nextYear;
        ?>
        <footer class="main-footer" style="margin-bottom: 10px;">
            <center>
                <center>
                    <footer>
                        <img src="../../images/footer-Photoroom.png" alt="portfolio">                
                    </footer>
                </center>
                    <small>Copyright &copy; <?php echo $yearRange;?> <strong>MYCareerTrendz.</strong> All rights reserved.</small>
            </center>
        </footer>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            footer {
                font-family: "Montserrat", sans-serif;
            }

        </style>
    </body>
</html>