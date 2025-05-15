<!-- jQuery 2.1.4 -->
<script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../plugins/chartjs/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>

<!--<script src="../jquery/jquery.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>-->
<script src="../../admin/datatable/jquery.dataTables.min.js"></script>
<script src="../../admin/datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
    $(document).ready(function () {
        //inialize datatable
        $('#myTable').DataTable();
        //hide alert
        $(document).on('click', '.close', function () {
$('.alert').hide();
        })
    });
</script>
