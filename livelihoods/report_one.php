<?php
    $currentPage = "report_one";
    $currentTree = "";
    include("inc/header.php");

    $category = "";
    $filter_date = "";

    if (isset($_POST['btnGo'])) {
        $category = sanitizedString($con,$_POST['category']);
        $filter_date = sanitizedString($con,$_POST['filter_date']);
    }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>DSWD Report</h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-file-text-o"></i> DSWD Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Messages  -->
        <div class="row">
            <div class="col-sm-4">
            <?php
                if (isset($_GET['s'])) {
                    $s = $_GET['s'];
                    if ($s == md5(0)) {
                        echo "
                            <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Exists!</h4>
                                Entry already exists.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(1)) {
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Added!</h4>
                                Successfully added.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(2)) {
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Updated!</h4>
                                Successfully updated.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(3)) {
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Deleted!</h4>
                                Successfully deleted.
                            </div>
                        "; 
                    }
                    elseif ($s == md5(4)) {
                        echo "
                            <div class='alert alert-danger alert-dismissible'>
                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                <h4><i class='icon fa fa-info-circle'></i> Error!</h4>
                                An error occured.
                            </div>
                        "; 
                    }
                }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="box box-success">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <form method="POST">
                                    <input type="hidden" name="category" id="category" class="form-control" value="projects" readonly>
                                    <!-- Date range -->
                                    <div class="form-group">
                                        <label>Date range:</label>

                                        <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" name="filter_date" id="filter_date" value="<?php echo $filter_date; ?>">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                    <!-- /.form group -->
                                    <input type="submit" value="GO" name="btnGo" id="btnGo" class="btn btn-success btn-sm btn-flat">
                                </form>
                            </div>

                            <div class="col-sm-8">
                                <?php
                                    if (isset($_POST['btnGo'])) {
                                        $category = sanitizedString($con,$_POST['category']);
                                        $filter_date = sanitizedString($con,$_POST['filter_date']);
                                        $new_date = explode(' - ',$filter_date);
                                        $from_date = $new_date[0];
                                        $to_date = $new_date[1];
                                ?>
                                    <table class="table table-hover table-bordered" id="example1">
                                        <thead class="bg-green">
                                            <th>Title</th>
                                            <th>Qualified</th>
                                            <?php
                                                if ($category == 'jobs') {
                                                    echo "<th>For Interview</th>";
                                                    echo "<th>Hired</th>";
                                                    echo "<th>Not Hired</th>";
                                                }
                                                else if ($category == 'trainings') {
                                                    echo "<th>Enrolled</th>";
                                                    echo "<th>Incomplete</th>";
                                                    echo "<th>Done</th>";
                                                }
                                                else{
                                                    echo "<th>Granted</th>";
                                                    echo "<th>Not Granted</th>";
                                                }
                                            ?>
                                        </thead>
                                        <tbody>
                                <?php
                                        // echo "$from_date - $to_date";
                                        $sql = "SELECT * FROM $category WHERE posted_on >= '$from_date' AND  posted_on <= '$to_date'";
                                        // die($sql);
                                        $qry = mysqli_query($con,$sql);
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $category_id = $row['id'];
                                            $category_name = $row['name'];
                                            $column1 = 0;
                                            $column2 = 0;
                                            $column3 = 0;
                                            $column4 = 0;
                                            if ($category == 'jobs') {
                                                $sql2 = "SELECT * FROM member_qualifications WHERE a1 = 'A' AND a2 = 'A' AND a3 = 'A' AND a4 = 'A' AND a5 = 'A' AND a6 = 'A' AND a7 = 'A' AND a8 = 'A'";
                                                $qry2 = mysqli_query($con,$sql2);
                                                $column1 = mysqli_num_rows($qry2);

                                                $sql3 = "SELECT * FROM applicants WHERE status = 'A' AND job_id = '$category_id'";
                                                $qry3 = mysqli_query($con,$sql3);
                                                $column2 = mysqli_num_rows($qry3);

                                                $sql4 = "SELECT * FROM applicants WHERE status = 'B' AND job_id = '$category_id'";
                                                $qry4 = mysqli_query($con,$sql4);
                                                $column3 = mysqli_num_rows($qry4);

                                                $sql5 = "SELECT * FROM applicants WHERE status = 'C' AND job_id = '$category_id'";
                                                $qry5 = mysqli_query($con,$sql5);
                                                $column4 = mysqli_num_rows($qry5);
                                                
                                            }
                                            else if ($category == 'trainings') {
                                                $sql2 = "SELECT * FROM member_qualifications WHERE b1 = 'A' AND b2 = 'A' AND b3 = 'A' AND b4 = 'A' AND b5 = 'A' AND b6 = 'A' AND b7 = 'A'";
                                                $qry2 = mysqli_query($con,$sql2);
                                                $column1 = mysqli_num_rows($qry2);

                                                $sql3 = "SELECT * FROM enrolee WHERE status = 'A' AND training_id = '$category_id'";
                                                $qry3 = mysqli_query($con,$sql3);
                                                $column2 = mysqli_num_rows($qry3);

                                                $sql4 = "SELECT * FROM enrolee WHERE status = 'B' AND training_id = '$category_id'";
                                                $qry4 = mysqli_query($con,$sql4);
                                                $column3 = mysqli_num_rows($qry4);

                                                $sql5 = "SELECT * FROM enrolee WHERE status = 'C' AND training_id = '$category_id'";
                                                $qry5 = mysqli_query($con,$sql5);
                                                $column4 = mysqli_num_rows($qry5);
                                            }
                                            else {
                                                $sql2 = "SELECT * FROM member_qualifications WHERE c1 = 'A' AND c2 = 'A' AND c3 = 'A' AND c4 = 'A' AND c5 = 'A' AND c6 = 'A'";
                                                $qry2 = mysqli_query($con,$sql2);
                                                $column1 = mysqli_num_rows($qry2);

                                                $sql3 = "SELECT * FROM beneficiary WHERE status = 'A' AND project_id = '$category_id'";
                                                $qry3 = mysqli_query($con,$sql3);
                                                $column2 = mysqli_num_rows($qry3);

                                                $sql4 = "SELECT * FROM beneficiary WHERE status = 'B' AND project_id = '$category_id'";
                                                $qry4 = mysqli_query($con,$sql4);
                                                $column3 = mysqli_num_rows($qry4);

                                                $sql5 = "SELECT * FROM beneficiary WHERE status = 'C' AND project_id = '$category_id'";
                                                $qry5 = mysqli_query($con,$sql5);
                                                $column4 = mysqli_num_rows($qry5);
                                            }

                                            echo "<tr>";
                                ?>
                                                <td><?php echo "$category_name"; ?></td>
                                                <td><a id="column1" data-sql="<?php echo $sql2; ?>"><?php echo "$column1"; ?></a></td>
                                                <td><a id="column2" data-sql="<?php echo $sql3; ?>"><?php echo "$column2"; ?></a></td>
                                                <td><a id="column3" data-sql="<?php echo $sql4; ?>"><?php echo "$column3"; ?></a></td>
                                                <?php if ($category != 'projects') { ?>
                                                <td><a id="column4" data-sql="<?php echo $sql5; ?>"><?php echo "$column4"; ?></a></td>
                                                <?php } ?>
                                <?php
                                            echo "</tr>";
                                        }
                                ?>
                                        </tbody>
                                    </table>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- <div class="box-footer"></div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

    <div class="modal fade" id="view">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Ex-Drug Abusers</h4>
                </div>
                <div class="modal-body">
                    <div id="displayHere"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php include("inc/footer.php"); ?>


<script>
    $(function (){
        //Date range picker
        $('#filter_date').daterangepicker()

        //Datatables
        var userNow = "<?php echo $username; ?>";
        var dt = new Date();
        var month = new Array();
        month[0] = "January";
        month[1] = "February";
        month[2] = "March";
        month[3] = "April";
        month[4] = "May";
        month[5] = "June";
        month[6] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var monthNow = month[dt.getMonth()];
        var time = monthNow + " " + dt.getDate() + ", " + dt.getFullYear();

        var table = $('#example1').DataTable({
            "pageLength" : false,
            "searching" : false,
            "paging":   false,
            "ordering": false,
            "info":     false,
            "dom": 'Blftrip',
            "buttons" : [
                {
                    extend : "excel",
                    text : "<i class='fa fa-file-excel-o'></i> Excel",
                    titleAttr : "Export to Excel File",
                    className : "btn btn-flat btn-success btn-sm",
                    messageTop: 'Summary',
                    messageBottom: 'Prepared By: '+userNow+'-'+time
                },
                {
                    extend : "print",
                    text : "<i class='fa fa-print'></i> Print",
                    titleAttr : "Print to printer",
                    className : "btn btn-flat btn-success btn-sm",
                    messageTop: '<h3>Summary</h3><h4></h4><h4></h4>',
                    messageBottom: '<label>Prepared By: '+userNow+'-'+time+'</label>'
                }
            ]
        });

        table.buttons( 0, null ).containers().appendTo( '#dt-buttons' );
        // alert("START: "+start+"- END: "+end);

        $('#column1,#column2,#column3,#column4').click(function(){
            var execSql = $(this).data('sql');
            $.ajax({
                url: 'fetch_abusers.php',
                type: 'POST',
                data: {
                    sql : execSql
                },
                success:function(response){
                    $('#displayHere').html(response);
                    $('#view').modal('show');
                }
            });
            // alert(execSql);
        });
    })
</script>

<style>
    #column1, #column2, #column3, #column4 {
        display: block;
        cursor: pointer;
        color: black;
    }
</style>