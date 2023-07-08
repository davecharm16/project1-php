<?php
    $currentPage = "jobs";
    $currentTree = "";
    include("inc/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Jobs <button type="button" class="btn btn-success btn-sm btn-flat" title="Add" data-toggle="modal" data-target="#add"><span class="fa fa-plus"></span></button></h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-briefcase"></i> Jobs</li>
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
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable">
                                <thead class="bg-green">
                                    <th class="text-center vertical-middle">Job Name</th>
                                    <th class="text-center vertical-middle">Job Description</th>
                                    <th class="text-center vertical-middle">Posted On</th>
                                    <th class="text-center vertical-middle">Status</th>
                                    <th class="text-center vertical-middle">Action</th>
                                </thead>

                                <tbody>
                                    <?php
                                        $qry = mysqli_query($con,"SELECT * FROM jobs  WHERE posted_by = '$username' OR company_id = '$company_id'");
                                        while ($row = mysqli_fetch_array($qry)) {
                                            $job_id = $row['id'];
                                            $job_name = $row['name'];
                                            $job_description = html_entity_decode($row['description']);
                                            $company_id = $row['company_id'];
                                            $posted_by = $row['posted_by'];
                                            $posted_on = $row['posted_on'];
                                            $status = $row['status'];
                                            $qry2 = mysqli_query($con,"SELECT * FROM company WHERE id = '$company_id'");
                                            $row2 = mysqli_fetch_array($qry2);
                                            $company = $row2['company_name'];
                                            
                                            $job_category = $row['category'];
                                            $splitJc = explode(",",$job_category);
                                            $job_category1 = implode(', ',$splitJc);
                                            
                                            $personal_domain = $row['domain'];
                                            $splitPd = explode(",",$personal_domain);
                                            $personal_domain1 = implode(', ',$splitPd);

                                            $skills = $row['skills'];
                                            $splitSkills = explode(",",$skills);
                                            $skills1 = implode(', ',$splitSkills);

                                            $education = $row['education'];
                                            $splitEducation = explode(",",$education);
                                            $education1 = implode(', ',$splitEducation);

                                            $personality = $row['personality'];
                                            $splitPersonality = explode(",",$personality);
                                            $personality1 = implode(', ',$splitPersonality);
                                    ?>

                                    <tr>
                                        <td class="text-center vertical-middle"><?php echo "$job_name"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$job_description"; ?></td>
                                        <td class="text-center vertical-middle"><?php echo "$posted_on"; ?></td>
                                        <td class="text-center vertical-middle">
                                            <?php if($status == 'hide')
                                            {
                                            ?>
                                            <input type="checkbox" name="toggle" id="toggle<?php echo  $job_id; ?>" value="<?php echo $job_id; ?>" data-toggle="toggle" data-off="Hide" data-on="Show" data-onstyle="success" data-size="mini">
                                            <?php
                                            }?>
                                            <?php if($status == 'show')
                                            {
                                            ?>
                                            <input type="checkbox" name="toggle" id="toggle<?php echo $job_id; ?>" value="<?php echo $job_id; ?>" data-toggle="toggle" data-off="Hide" data-on="Show" data-onstyle="success" data-size="mini" checked>
                                            <?php
                                            }?>
                                        </td>
                                        <td class="text-center vertical-middle">
                                            <a href="jobs_list.php?a=<?php echo $job_id ?>" class="btn bg-navy btn-sm btn-flat" title="Short List"><span class="fa fa-list"></span></a>
                                            <a href="jobs_edit.php?a=<?php echo $job_id ?>" class="btn btn-primary btn-sm btn-flat" title="Edit"><span class="fa fa-pencil"></span></a>
                                            <button type="button" class="btn btn-danger btn-sm btn-flat" title="Delete" data-toggle="modal" data-target="#delete<?php echo $job_id ?>"><span class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>

                                    
                                    <div class="modal fade" id="delete<?php echo $job_id ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Delete Job</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Do you really want to delete this data? Once you've agreed tt cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="jobs_delete.php?id=<?php echo $job_id ?>" class="btn btn-success btn-sm" name="submit">YES</a>
                                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">NO</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- <div class="box-footer"></div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
    
    <form method="POST" action="jobs_add.php?username=<?php echo $username ?>" enctype="multipart/form-data">
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add Job</h4>
                    </div>
                    <div class="modal-body">
                        <label>Job Name</label>
                        <input type="text" class="form-control" name="job_name" placeholder="Job Name" autofocus required/><br>
                        <label>Job Description</label>
                        <textarea class="textarea" name="job_description" placeholder="Job Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        <div class="form-group">
                            <label>Preferred Educational Qualification</label>
                            <select class="form-control select2" name="education[]" multiple="multiple" style="width: 100%;" data-placeholder="Select Preferred Educational Qualification" required>
                                <option value="ALS">ALS</option>
                                <option value="Elementary undergraduate">Elementary undergraduate</option>
                                <option value="Elementary graduate">Elementary graduate</option>
                                <option value="High school undergraduate">High school undergraduate</option>
                                <option value="High school graduate">High school graduate</option>
                                <option value="College undergraduate">College undergraduate</option>
                                <option value="College graduate">College graduate</option>
                                <option value="Post graduate">Post graduate</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Job Category (You can select multiple categories.)</label>
                            <select class="form-control select2" name="job_category[]" multiple="multiple" style="width: 100%;" data-placeholder="Select Category" required>
                                <?php
                                    $qry4 = mysqli_query($con,"SELECT * FROM jobs_category ORDER BY category_name ASC");
                                    while ($row4 = mysqli_fetch_array($qry4)) {
                                        $category_name = $row4['category_name'];
                                ?>
                                <option value="<?php echo $category_name; ?>"><?php echo "$category_name"; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Preferred Skills</label>
                            <select class="form-control select2" name="skills[]" multiple="multiple" style="width: 100%;" data-placeholder="Select Skills" required>
                                <option value="Communication and interpersonal Skills">Communication and interpersonal Skills</option>
                                <option value="Social Skills">Social Skills</option>
                                <option value="Teamwork">Teamwork</option>
                                <option value="Time management">Time management</option>
                                <option value="Leadership skills">Leadership skills</option>
                                <option value="Problem solving skills">Problem solving skills</option>
                                <option value="Planning and Organizational skills">Planning and Organizational skills</option>
                                <option value="Ability to learn and adopt">Ability to learn and adopt</option>
                                <option value="Technology skills">Technology skills</option>
                                <option value="Working under pressure and to deadlines">Working under pressure and to deadlines</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Personality Domain (You can select multiple domain.)</label>
                            <select class="form-control select2" name="personal_domain[]" multiple="multiple" style="width: 100%;" data-placeholder="Select Domain" required>
                                <option value="Extroversion">Extroversion</option>
                                <option value="Agreeableness">Agreeableness</option>
                                <option value="Conscientiousness">Conscientiousness</option>
                                <option value="Emotional Stability">Emotional Stability</option>
                                <option value="Openness">Openness</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Personality (You can select multiple domain.)</label>
                            <select class="form-control select2" name="personality[]" multiple="multiple" style="width: 100%;" data-placeholder="Select Domain" required>
                                <option value="A">good team player</option>
                                <option value="B">creative</option>
                                <option value="C">resourceful</option>
                                <option value="D">volunteering</option>
                                <option value="E">willingness to upskill and enjoy challenge</option>
                                <option value="F">entrepreneurial spirit</option>
                                <option value="G">keen learner and committed to practice</option>
                                <option value="H">intelligence, focus and concentration skills</option>
                                <option value="I">hands-on</option>
                                <option value="J">good problem-solver</option>
                                <option value="K">self-motived</option>
                                <option value="L">good communication skills</option>
                                <option value="M">open and well-rounded individual with a holistic outlook</option>
                                <option value="N">thoughtful, kind and considerate individual</option>
                            </select>
                        </div>
                        <label>Featured Image</label>
                        <input type="file" name="picture" required/>
                        <input type="hidden" name="company" value="<?php echo $company_id; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm" name="submit">Add</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </form>

<?php include("inc/footer.php"); ?>


<script>
    $(function (){
        $('input[name=toggle]').change(function(){
            var mode = $(this).prop('checked');
            var job_id = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'jobs_status.php',
                data:{mode : mode, job_id : job_id}
            });
        });
    })
</script>