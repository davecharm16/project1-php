<?php
    $currentPage = "report_four";
    $currentTree = "report";
    include("inc/header.php");

    $category = "";

    if (isset($_POST['btnGo'])) {
        $category = sanitizedString($con,$_POST['category']);
    }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Summary of Jobs Offered</h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-file-text-o"></i> Reports</li>
        <li class="active">Summary of Jobs Offered</li>
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
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered" id="example1">
                                    <thead class="bg-green">
                                        <th>Title</th>
                                        <th>Company</th>
                                        <!-- <th></th> -->
                                        <!-- <th>Status</th> -->
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql ="SELECT * FROM jobs WHERE category LIKE '%$category%' AND posted_by = '$username' AND company_id = '$company_id' ORDER BY name";
                                            $qry = mysqli_query($con,$sql);
                                            while ($row = mysqli_fetch_array($qry)) {
                                                $job_name = $row['name'];
                                                $company_id = $row['company_id'];
                                                $company_name = "";

                                                $sql2 = "SELECT * FROM company WHERE id = '$company_id'";
                                                $qry2 = mysqli_query($con,$sql2);

                                                while ($row2 = mysqli_fetch_array($qry2)) {
                                                    $company_name = $row2['company_name'];
                                                }


                                                echo "<tr>";
                                                    echo "<td>$job_name</td>";
                                                    echo "<td>$company_name</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
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