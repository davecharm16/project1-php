<?php
    $currentPage = "report_two";
    $currentTree = "report";
    include("inc/header.php");

    $application_date = "";
    $training_id = "";

    if (isset($_POST['btnGo'])) {
        $application_date = sanitizedString($con,$_POST['application_date']);
        $training_id = sanitizedString($con,$_POST['training_id']);
    }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Shortlisted EDA</h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-file-text-o"></i> Reports</li>
        <li class="active">Shortlisted EDA</li>
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
                                    <label for="application_date">Application Date</label>
                                    <select name="application_date" id="application_date" class="form-control" required>
                                        <option value="">-- Select Application Date --</option>
                                        <?php
                                            $sql2 = "SELECT DISTINCT(application_date) FROM enrolee ORDER BY application_date";
                                            $qry2 = mysqli_query($con,$sql2);
                                            while ($row2 = mysqli_fetch_array($qry2)) {
                                                $application_date1 = $row2['application_date'];
                                                ?>
                                                    <option value="<?php echo $application_date1; ?>" <?php if ($application_date1 == $application_date) echo "selected"; ?>><?php echo "$application_date1"; ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select><br>
                                    <label for="training_id">Select Training</label>
                                    <div class="input-group">
                                        <select name="training_id" id="training_id" class="form-control" required>
                                            <option value="">-- Select Training --</option>
                                            <?php
                                                $sql = "SELECT * FROM trainings WHERE posted_by = '$username' ORDER BY name";
                                                $qry = mysqli_query($con,$sql);

                                                while ($row = mysqli_fetch_array($qry)) {
                                                    $training_id1 = $row['id'];
                                                    $training_name = $row['name'];
                                                    ?>
                                                        <option value="<?php echo $training_id1; ?>" <?php if ($training_id1 == $training_id) echo "selected"; ?>><?php echo "$training_name"; ?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                        <span class="input-group-btn">
                                            <input type="submit" value="GO" name="btnGo" id="btnGo" class="btn btn-success btn-flat">
                                        </span>
                                    </div>
                                </form>
                            </div>

                            <div class="col-sm-8">
                                <?php
                                    if (isset($_POST['btnGo'])) {
                                        $application_date = sanitizedString($con,$_POST['application_date']);
                                        $training_id = sanitizedString($con,$_POST['training_id']);
                                ?>
                                    <table class="table table-hover table-bordered" id="example1">
                                        <thead class="bg-green">
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <!-- <th></th> -->
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                <?php 
                                        $sql3 ="SELECT * FROM enrolee WHERE training_id = '$training_id' AND application_date = '$application_date' ORDER BY member_id";
                                        $qry3 = mysqli_query($con,$sql3);
                                        while ($row = mysqli_fetch_array($qry3)) {
                                            $eda_id = $row['member_id'];
                                            $status = $row['status'];
                                            $sql4 = "SELECT * FROM eda WHERE eda_id = '$eda_id'";
                                            $qry4 = mysqli_query($con,$sql4);
                                            $row4 = mysqli_fetch_array($qry4);
                                            $lastname = $row4['lastname'];
                                            $firstname = $row4['firstname'];
                                            $middlename = $row4['middlename'];
                                            $gender = $row4['gender'];
                                            $status1 = "";

                                            if ($status == 'A') $status1 = "Enrolled";
                                            else if ($status == 'B') $status1 = "Incomplete";
                                            else if ($status == 'C') $status1 = "Done";

                                            echo "<tr>";
                                                echo "<td>$lastname, $firstname $middlename</td>";
                                                echo "<td>$gender</td>";
                                                echo "<td>$status1</td>";
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
    })
</script>