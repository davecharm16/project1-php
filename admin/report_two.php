<?php
    $currentPage = "report_two";
    $currentTree = "report";
    include("inc/header.php");

    $category = "";

    if (isset($_POST['btnGo'])) {
        $category = sanitizedString($con,$_POST['category']);
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
                                    <label for="category">Select One</label>
                                    <div class="input-group">
                                        <select name="category" id="category" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            <option value="ALL" <?php if ($category == 'ALL') echo "selected"; ?>>ALL</option>
                                            <option value="jobs" <?php if ($category == 'jobs') echo "selected"; ?>>Qualified Jobs</option>
                                            <option value="trainings" <?php if ($category == 'trainings') echo "selected"; ?>>Qualified Trainings</option>
                                            <option value="projects" <?php if ($category == 'projects') echo "selected"; ?>>Qualified Livelihood Projects</option>
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
                                        $category = sanitizedString($con,$_POST['category']);
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
                                        $sql ="SELECT * FROM eda ORDER BY lastname";
                                        $qry = mysqli_query($con,$sql);
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $member_id = $row['eda_id'];
                                            $lastname = $row['lastname'];
                                            $firstname = $row['firstname'];
                                            $middlename = $row['middlename'];
                                            $gender = $row['gender'];
                                            $new_gender = "";
                                            $status1 = "";
                                            $status2 = "";
                                            $status3 = "";
                                            $count1=0;$count2=0;$count3=0;

                                            echo "<tr>";
                                                echo "<td>$lastname, $firstname $middlename</td>";
                                                echo "<td>$gender</td>";
                                                echo "<td class='text-center'>";
                                                    if ($category == 'jobs') {
                                                        $sql2 = "SELECT * FROM applicants WHERE member_id = '$member_id' AND status = 'B' ORDER BY application_date LIMIT 1";
                                                        $qry2 = mysqli_query($con,$sql2);
                                                        if (mysqli_num_rows($qry2) > 0) {
                                                            while ($row2 = mysqli_fetch_array($qry2)) {
                                                                $job_id = $row2['job_id'];
                                                                $sql3 = "SELECT * FROM jobs WHERE id = '$job_id'";
                                                                $qry3 = mysqli_query($con,$sql3);
                                                                while ($row3 = mysqli_fetch_array($qry3)) {
                                                                    $job_name = $row3['name'];
                                                                    $status1 = "Hired as $job_name";

                                                                    echo "$status1";
                                                                }
                                                            }
                                                        }
                                                        else{
                                                            echo "Not yet hired";
                                                        }
                                                    }
                                                    else if ($category == 'trainings') {
                                                        $sql2 = "SELECT * FROM enrolee WHERE member_id = '$member_id' AND status = 'C' ORDER BY application_date LIMIT 1";
                                                        $qry2 = mysqli_query($con,$sql2);
                                                        if (mysqli_num_rows($qry2) > 0) {
                                                            while ($row2 = mysqli_fetch_array($qry2)) {
                                                                $training_id = $row2['training_id'];
                                                                $sql3 = "SELECT * FROM trainings WHERE id = '$training_id'";
                                                                $qry3 = mysqli_query($con,$sql3);
                                                                while ($row3 = mysqli_fetch_array($qry3)) {
                                                                    $training_name = $row3['name'];
                                                                    $status2 = "Done in $training_name";

                                                                    echo "$status2";
                                                                }
                                                            }
                                                        }
                                                        else{
                                                            echo "Not yet enrolled";
                                                        }
                                                    }
                                                    else if ($category == 'projects') {
                                                        $sql2 = "SELECT * FROM beneficiary WHERE member_id = '$member_id' AND status = 'A' ORDER BY application_date LIMIT 1";
                                                        $qry2 = mysqli_query($con,$sql2);
                                                        if (mysqli_num_rows($qry2) > 0) {
                                                            while ($row2 = mysqli_fetch_array($qry2)) {
                                                                $project_id = $row2['project_id'];
                                                                $sql3 = "SELECT * FROM projects WHERE id = '$project_id'";
                                                                $qry3 = mysqli_query($con,$sql3);
                                                                while ($row3 = mysqli_fetch_array($qry3)) {
                                                                    $project_name = $row3['name'];
                                                                    $status3 = "Granted in  $project_name";

                                                                    echo "$status3";
                                                                }
                                                            }
                                                        }
                                                        else{
                                                            echo "Not yet granted";
                                                        }
                                                    }
                                                    else{
                                                        $sql4 = "SELECT * FROM applicants WHERE member_id = '$member_id' AND status = 'B' ORDER BY application_date LIMIT 1";
                                                        $qry4 = mysqli_query($con,$sql4);
                                                        if (mysqli_num_rows($qry4) > 0) {
                                                            while ($row4 = mysqli_fetch_array($qry4)) {
                                                                $job_id = $row4['job_id'];
                                                                $sql5 = "SELECT * FROM jobs WHERE id = '$job_id'";
                                                                $qry5 = mysqli_query($con,$sql5);
                                                                while ($row5 = mysqli_fetch_array($qry5)) {
                                                                    $job_name = $row5['name'];
                                                                    $status1 = "Hired as $job_name";
                                                                    
                                                                    echo "$status1";
                                                                }
                                                            }
                                                            $count1++;
                                                        }

                                                        $sql6 = "SELECT * FROM enrolee WHERE member_id = '$member_id' AND status = 'C' ORDER BY application_date LIMIT 1";
                                                        $qry6 = mysqli_query($con,$sql6);
                                                        if (mysqli_num_rows($qry6) > 0) {
                                                            while ($row6 = mysqli_fetch_array($qry6)) {
                                                                $training_id = $row6['training_id'];
                                                                $sql7 = "SELECT * FROM trainings WHERE id = '$training_id'";
                                                                $qry7 = mysqli_query($con,$sql7);
                                                                while ($row7 = mysqli_fetch_array($qry7)) {
                                                                    $training_name = $row7['name'];
                                                                    $status2 = "Done in $training_name";
                                                                    if ($status1 != '') echo ", ";
                                                                    echo "$status2";
                                                                }
                                                            }
                                                            $count2++;
                                                        }

                                                        $sql8 = "SELECT * FROM beneficiary WHERE member_id = '$member_id' AND status = 'A' ORDER BY application_date LIMIT 1";
                                                        $qry8 = mysqli_query($con,$sql8);
                                                        if (mysqli_num_rows($qry8) > 0) {
                                                            while ($row8 = mysqli_fetch_array($qry8)) {
                                                                $project_id = $row8['project_id'];
                                                                $sql9 = "SELECT * FROM projects WHERE id = '$project_id'";
                                                                $qry9 = mysqli_query($con,$sql9);
                                                                while ($row9 = mysqli_fetch_array($qry9)) {
                                                                    $project_name = $row9['name'];
                                                                    $status3 = "Granted in  $project_name";
                                                                    if ($status2 != '' || $status1 != '') echo ", ";
                                                                    echo "$status3";
                                                                }
                                                            }
                                                            $count3++;
                                                        }

                                                        if ($count1==0&&$count2==0&&$count3==0) {
                                                            echo "No Status";
                                                        }
                                                        else{
                                                            
                                                        }
                                                    }
                                                echo "</td>";
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