        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2019 </strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(function(){
            $('.select2').select2();
        })
    </script>
    <!-- Morris.js charts -->
    <script src="../bower_components/raphael/raphael.min.js"></script>
    <script src="../bower_components/morris.js/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
    <script src="../bower_components/datatables.net/js/buttons.html5.min.js"></script>
    <script src="../bower_components/datatables.net/js/buttons.print.min.js"></script>
    <script src="../bower_components/datatables.net/js/buttons.flash.min.js"></script>
    <script src="../bower_components/datatables.net/js/jszip.min.js"></script>
    <script src="../bower_components/datatables.net/js/pdfmake.min.js"></script>
    <script src="../bower_components/datatables.net/js/vfs_fonts.js"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Bootstrap Toggle -->
    <script src="../bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
    <!-- High Chart Table -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="inc/jquery.highchartTable-min.js"></script>
    <script>
        $(function () {
            $('#dataTable').DataTable();
            $('.alert').delay(2000).fadeOut('slow');
            $('#highchart').highchartTable();
            $('#highchart2').highchartTable();
        })
    </script>
</body>
</html>

<style>
    .vertical-middle{
        vertical-align: middle !important;
    }
</style>