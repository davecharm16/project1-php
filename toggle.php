<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Toggle</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-toggle-master/css/bootstrap-toggle.min.css">
    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap-toggle-master/js/bootstrap-toggle.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <!-- <input id="toggle-one" checked type="checkbox"> -->
    
    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
        <thead>
            <tr>
                <th>Job Name</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php
                include("dbcon.php");
                $qry = mysqli_query($con,"SELECT * FROM jobs");
                while ($row = mysqli_fetch_array($qry)) {
                    $job_id = $row['id'];
                    $job_name = $row['name'];
                    $status = $row['status'];
            ?>
                <tr>
                    <td><?php echo "$job_name"; ?></td>
                    <td>
                        <?php if($status=='hide')
                        {
                        ?>
                        <input type="checkbox" name="toggle" id="toggle<?php echo  $job_id; ?>" value="<?php echo $job_id; ?>" data-toggle="toggle" data-off="Hidden" data-on="Shown" data-onstyle="success" data-size="small">
                        <?php
                        }?>
                        <?php if($status=='show')
                        {
                        ?>
                        <input type="checkbox" name="toggle" id="toggle<?php echo $job_id; ?>" value="<?php echo $job_id; ?>" data-toggle="toggle" data-off="Hidden" data-on="Shown" data-onstyle="success" data-size="small" checked>
                        <?php
                        }?>
                        <script>
                            $(function (){
                                $('#toggle<?php echo $job_id ?>').change(function(){
                                    var mode = $(this).prop('checked');
                                    var job_id = $(this).val();
                                    $.ajax({
                                        type: 'POST',
                                        url: 'toggle_process.php',
                                        data:{mode : mode, job_id : job_id}
                                    });
                                });
                            })
                        </script>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>

    </table>
</body>
</html>