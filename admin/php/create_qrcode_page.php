<!DOCTYPE html>
<html>
    <?php include '../php/head.php'; ?>
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php include '../php/header.php'; ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include '../php/aside_nav.php'; ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <img src="../icons/qr-code.png" width="28">
                        <b>QR CODE GENERATOR</b>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">QR CODE GENERATOR</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div>
                                                <?php include '../qrcode/index.php'; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="chart">

                                                <div class="progress-group" style="margin-bottom: 20px;">
                                                    <div class="mb-3">
                                                        <label for="whatsAppfm" class="form-label"><img src="../icons/whatsapp.png" alt="whatsapp" width="25"> WhatsApp</label>
                                                        <a href="#" type="button" class="btn btn-primary form-control">Share QR Code</a>
                                                    </div>
                                                </div>

                                                <div class="progress-group" style="margin-bottom: 20px;">
                                                    <div class="mb-3">
                                                        <label for="linkedinfm" class="form-label"><img src="../icons/linkedin.png" alt="linkedin" width="25"> Linkedin</label>
                                                        <a href="#" type="button" class="btn btn-primary form-control">Share QR Code</a>
                                                    </div>
                                                </div>

                                                <div class="progress-group" style="margin-bottom: 20px;">
                                                    <div class="mb-3">
                                                        <label for="facebookfm" class="form-label"><img src="../icons/facebook.png" alt="facebook" width="25"> Facebook</label>
                                                        <a href="#" type="button" class="btn btn-primary form-control">Share QR Code</a>
                                                    </div>
                                                </div>

                                                <div class="progress-group" style="margin-bottom: 20px;">
                                                    <div class="mb-3">
                                                        <label for="twitterfm" class="form-label"><img src="../icons/twitter.png" alt="twitter" width="25"> Twitter</label>
                                                        <a href=" #" type="button" class="btn btn-primary form-control">Share QR Code</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include '../php/footer.php';
            ?>
        </div>

        <?php include '../javascript/script.js'; ?>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap.js"></script>
        <script>
            new DataTable('#example');
        </script>
        <script src="../ckeditor/ckeditor.js"></script>

        <script src="../qrcode/script.js"></script>
        <script src="../qrcode/easy-qrcode.js"></script>


        <style>

            @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

            body {
                font-family: "Montserrat", sans-serif;
            }

        </style>
    </body>
</html>