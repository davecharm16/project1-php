<?php
    $currentPage = "pi";
    $currentTree = "";
    include("inc/header.php");

    $sql7 = "SELECT * FROM eda_answers WHERE eda_id = '$username';";
    $qry7 = mysqli_query($con,$sql7);
    $row7 = mysqli_fetch_array($qry7);
    $q1 = $row7['q1'];
    $q2 = $row7['q2'];
    $q3 = $row7['q3'];
    $q4 = $row7['q4'];
    $q5 = $row7['q5'];
    $q6 = $row7['q6'];
    $q7 = $row7['q7'];
    $q8 = $row7['q8'];
    $q9 = $row7['q9'];
    $q10 = $row7['q10'];
    $edaInterests = $row7['interests'];
    $edaInterestsList = explode(',', $edaInterests);
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Personality and Interest</h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-asterisk"></i> Personality and Interest</li>
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
                                <h4><i class='icon fa fa-info-circle'></i> Submitted!</h4>
                                Successfully submitted.
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
        <!-- /Messages -->

        <div class="row">
            <div class="col-sm-12">
            <div class="box box-success">
                    <div class="box-header"></div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                            $sql = "SELECT * FROM eda_answers WHERE eda_id = '$username';";
                            $qry = mysqli_query($con,$sql);
                        ?>
                            <form action="pi_add.php?id=<?php echo $username; ?>" method="POST">
                                <div style="padding: 10px 30px 10px 30px">
                                    <legend>PERSONALITY QUESTIONNAIRE</legend>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q1">1. I see myself as extraverted, enthusiastic.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="1" <?php if ($q1 == '1') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="2" <?php if ($q1 == '2') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="3" <?php if ($q1 == '3') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="4" <?php if ($q1 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="5" <?php if ($q1 == '5') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="6" <?php if ($q1 == '6') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q1" id="radio" value="7" <?php if ($q1 == '7') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q2">2. I see myself as critical, quarrelsome.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="7" <?php if ($q2 == '7') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="6" <?php if ($q2 == '6') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="5" <?php if ($q2 == '5') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="4" <?php if ($q2 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="3" <?php if ($q2 == '3') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="2" <?php if ($q2 == '2') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q2" id="radio" value="1" <?php if ($q2 == '1') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q3">3. I see myself as dependable, self-disciplined.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="1" <?php if ($q3 == '1') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="2" <?php if ($q3 == '2') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="3" <?php if ($q3 == '3') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="4" <?php if ($q3 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="5" <?php if ($q3 == '5') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="6" <?php if ($q3 == '6') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q3" id="radio" value="7" <?php if ($q3 == '7') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q4">4. I see myself as anxious, easily upset.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="7" <?php if ($q4 == '7') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="6" <?php if ($q4 == '6') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="5" <?php if ($q4 == '5') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="4" <?php if ($q4 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="3" <?php if ($q4 == '3') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="2" <?php if ($q4 == '2') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q4" id="radio" value="1" <?php if ($q4 == '1') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q5">5. I see myself as open to new experiences, complex.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="1" <?php if ($q5 == '1') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="2" <?php if ($q5 == '2') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="3" <?php if ($q5 == '3') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="4" <?php if ($q5 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="5" <?php if ($q5 == '5') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="6" <?php if ($q5 == '6') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q5" id="radio" value="7" <?php if ($q5 == '7') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q6">6. I see myself as reserved, quiet.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="7" <?php if ($q6 == '7') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="6" <?php if ($q6 == '6') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="5" <?php if ($q6 == '5') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="4" <?php if ($q6 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="3" <?php if ($q6 == '3') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="2" <?php if ($q6 == '2') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q6" id="radio" value="1" <?php if ($q6 == '1') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q7">7. I see myself as sympathetic, warm.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="1" <?php if ($q7 == '1') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="2" <?php if ($q7 == '2') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="3" <?php if ($q7 == '3') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="4" <?php if ($q7 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="5" <?php if ($q7 == '5') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="6" <?php if ($q7 == '6') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q7" id="radio" value="7" <?php if ($q7 == '7') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q8">8. I see myself as disorganized, careless.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="7" <?php if ($q8 == '7') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="6" <?php if ($q8 == '6') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="5" <?php if ($q8 == '5') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="4" <?php if ($q8 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="3" <?php if ($q8 == '3') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="2" <?php if ($q8 == '2') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q8" id="radio" value="1" <?php if ($q8 == '1') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q9">9. I see myself as calm, emotionally stable.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="1" <?php if ($q9 == '1') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="2" <?php if ($q9 == '2') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="3" <?php if ($q9 == '3') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="4" <?php if ($q9 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="5" <?php if ($q9 == '5') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="6" <?php if ($q9 == '6') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q9" id="radio" value="7" <?php if ($q9 == '7') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="q10">10. I see myself as conventional, uncreative.</label>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="7" <?php if ($q10 == '7') echo "checked"; ?> required>Disagree strongly</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="6" <?php if ($q10 == '6') echo "checked"; ?> required>Disagree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="5" <?php if ($q10 == '5') echo "checked"; ?> required>Disagree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="4" <?php if ($q10 == '4') echo "checked"; ?> required>Neither agree nor disagree</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="3" <?php if ($q10 == '3') echo "checked"; ?> required>Agree a little</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="2" <?php if ($q10 == '2') echo "checked"; ?> required>Agree moderately</label>
                                                </div>
                                                <div class="radio">
                                                    <label><input type="radio" name="q10" id="radio" value="1" <?php if ($q10 == '1') echo "checked"; ?> required>Agree strongly</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <legend>INTEREST QUESTIONNAIRE</legend>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="interests">What are your hobbies and interest? (select all that applies)</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="A" <?php if (in_array('A',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Involvement in a sports team
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="B" <?php if (in_array('B',$edaInterestsList)) { echo "checked"; } ?>>
                                                                interest in arts and painting
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="C" <?php if (in_array('C',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Writing
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="D" <?php if (in_array('D',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Volunteering or community work
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="E" <?php if (in_array('E',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Techy hobbies like learning to code
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="F" <?php if (in_array('F',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Running your own store or business
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="G" <?php if (in_array('G',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Music
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="H" <?php if (in_array('H',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Reading
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="I" <?php if (in_array('I',$edaInterestsList)) { echo "checked"; } ?>>
                                                                DIY
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="J" <?php if (in_array('J',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Doing puzzles and crosswords
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="K" <?php if (in_array('K',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Learning new ideas
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="L" <?php if (in_array('L',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Teaching
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="M" <?php if (in_array('M',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Travelling or out door activities
                                                            </label>
                                                        </div>
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="interest_list[]" id="interest_list" value="N" <?php if (in_array('N',$edaInterestsList)) { echo "checked"; } ?>>
                                                                Taking care of pets or children
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" id="submit" class="btn btn-success btn-flat pull-right" value="<?php if (mysqli_num_rows($qry) > 0) { echo "UPDATE"; } else { echo "SUBMIT"; } ?>">
                                </div>
                            </form>
                        <?php
                            if (mysqli_num_rows($qry) > 0) {
                                $row = mysqli_fetch_array($qry);
                                $domain1 = $row['domain1'];
                                $domain2 = $row['domain2'];
                                $domain3 = $row['domain3'];
                                $domain4 = $row['domain4'];
                                $domain5 = $row['domain5'];
                                //PROJECTS
                                    if ($age >= 18 && $four_p == 'Yes' && $referral == 'Yes') {
                        ?>
                                        <legend>Programs</legend>
                                        <table class="table table-bordered">
                                            <thead class="bg-green">
                                                <tr>
                                                    <th>Program</th>
                                                    <th>Interested?</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        <?php
                                        $sql2 = "SELECT * FROM projects WHERE status = 'show'";
                                        $qry2 = mysqli_query($con,$sql2);
                                        while ($row2 = mysqli_fetch_array($qry2)) {
                                            $project_id = $row2['id'];
                                            $project_name = $row2['name'];
                                            $project_description = html_entity_decode($row2['description']);
                                            // echo "*** $project_name $project_description<br>";

                                            $sql6 = "SELECT * FROM beneficiary WHERE member_id = '$username' AND project_id = '$project_id'";
                                            $qry6 = mysqli_query($con,$sql6);
                                            $row6 = mysqli_fetch_array($qry6);
                                            $status = $row6['status'];
                        ?>
                                                <tr>
                                                    <td><?php echo "$project_name"; ?></td>
                                                    <td class="text-center">
                                                        <?php
                                                            if ($status == '') {
                                                        ?>
                                                        <form action="pi_server.php?s=interestProject&id=<?php echo $project_id; ?>&eda_id=<?php echo $username; ?>" method="POST">
                                                            <button type="submit" name="btnIpYes" class="btn btn-info btn-flat btn-sm" <?php if (mysqli_num_rows($qry6) == 1) { echo "disabled"; } ?>>Yes</button>
                                                            <button type="submit" name="btnIpNo" class="btn btn-danger btn-flat btn-sm">No</button>
                                                        </form>
                                                        <?php
                                                            }
                                                            else if ($status == 'A') {
                                                                echo "Status: <b class='text-success label label-success'>GRANTED</b>";
                                                            } 
                                                            else if ($status == 'B') {
                                                                echo "Status: <b class='text-danger label label-danger''>NOT GRANTED</b>";
                                                            } 
                                                        ?>
                                                    </td>
                                                </tr>
                        <?php
                                        }
                        ?>
                                        
                                        </tbody>
                                    </table><br>
                        <?php
                                    }
                                //
                        ?>
                        <?php
                                //JOBS
                                    $sql3 = "SELECT * FROM jobs WHERE status = 'show' ORDER BY id DESC";
                                    $qry3 = mysqli_query($con,$sql3);
                                    if (mysqli_num_rows($qry3) > 0) {
                                        ?>
                                            <legend>Jobs</legend>
                                            <table class="table table-bordered">
                                                <thead class="bg-green">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Company</th>
                                                        <th>Interested?</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        <?php
                                        while ($row3 = mysqli_fetch_array($qry3)) {
                                            $job_id = $row3['id'];
                                            $job_name = $row3['name'];
                                            $company_id = $row3['company_id'];
                                            $job_domain = $row3['domain'];
                                            $skills = $row3['skills'];
                                            $education = $row3['education'];
                                            $interests = $row3['personality'];

                                            $sql6 = "SELECT * FROM applicants WHERE member_id = '$username' AND job_id = '$job_id'";
                                            $qry6 = mysqli_query($con,$sql6);
                                            $row6 = mysqli_fetch_array($qry6);
                                            $status = $row6['status'];
                                            
                                            $sql5 = "SELECT * FROM company WHERE id = '$company_id'";
                                            $qry5 = mysqli_query($con,$sql5);
                                            $row5 = mysqli_fetch_array($qry5);
                                            $company_name = $row5['company_name'];

                                            $test_education_attainment = false;
                                            $test_domain = true;
                                            $test_skills = true;
                                            $test_interests = true;

                                            $educationList = explode(",",$education);
                                            foreach ($educationList as $education1) {
                                                if ($eda_education == $education1) {
                                                    $test_education_attainment = true;
                                                }
                                            }
                                            if ($test_education_attainment) {
                                                $jobDomainList = explode(",",$job_domain);
                                                foreach ($jobDomainList as $job_domain1) {
                                                    if ($job_domain1 == 'Extroversion') {
                                                        if ($domain1 < 4.44) {
                                                            $test_domain = false;
                                                            break;
                                                        }
                                                    }
                                                    else if ($job_domain1 == 'Agreeableness') {
                                                        if ($domain2 < 5.23) {
                                                            $test_domain = false;
                                                            break;
                                                        }
                                                    }
                                                    else if ($job_domain1 == 'Conscientiousness') {
                                                        if ($domain3 < 5.4) {
                                                            $test_domain = false;
                                                            break;
                                                        }
                                                    }
                                                    else if ($job_domain1 == 'Emotional Stability') {
                                                        if ($domain4 < 4.83) {
                                                            $test_domain = false;
                                                            break;
                                                        }
                                                    }
                                                    else if ($job_domain1 == 'Openness') {
                                                        if ($domain5 < 5.38) {
                                                            $test_domain = false;
                                                            break;
                                                        }
                                                    }
                                                }
                                            }


                                            if ($test_domain) {
                                                $skillList = explode(",",$skills);
                                                foreach ($skillList as $skills1) {
                                                    $sql4 = "SELECT * FROM eda WHERE eda_id = '$username' AND skills LIKE '%$skills1%'";
                                                    $qry4 = mysqli_query($con,$sql4);
                                                    if (mysqli_num_rows($qry4) < 1) {
                                                        $test_skills = false;
                                                        break;
                                                    } 
                                                }
                                            }

                                            if ($test_skills) {
                                                $interestList = explode(",",$interests);
                                                foreach ($interestList as $interest1) {
                                                    $sql4 = "SELECT * FROM eda_answers WHERE eda_id = '$username' AND interests LIKE '%$interest1%'";
                                                    $qry4 = mysqli_query($con,$sql4);
                                                    if (mysqli_num_rows($qry4) < 1) {
                                                        $test_interests = false;
                                                        break;
                                                    } 
                                                }
                                            }

                                            if (!$test_education_attainment && !$test_domain && !$test_skills && !$test_interests) {
                                                continue;
                                            }
                                            else{
                                                if ($test_education_attainment && $test_domain && $test_skills && $test_interests) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo "$job_name"; ?></td>
                                                        <td><?php echo "$company_name"; ?></td>
                                                        <td class="text-center">
                                                            <?php
                                                                if ($status == '') {
                                                            ?>
                                                            <form action="pi_server.php?s=interestJob&id=<?php echo $job_id; ?>&eda_id=<?php echo $username; ?>" method="POST">
                                                                <button type="submit" name="btnIjYes" class="btn btn-info btn-flat btn-sm" <?php if (mysqli_num_rows($qry6) == 1) { echo "disabled"; } ?>>Yes</button>
                                                                <button type="submit" name="btnIjNo" class="btn btn-danger btn-flat btn-sm">No</button>
                                                            </form>
                                                            <?php
                                                                }
                                                                else if ($status == 'A') {
                                                                    echo "Status: <b class='text-warning label label-warning''>FOR INTERVIEW</b>";
                                                                }
                                                                else if ($status == 'B') {
                                                                    echo "Status: <b class='text-success label label-success''>HIRED</b>";
                                                                }
                                                                else if ($status == 'C') {
                                                                    echo "Status: <b class='text-danger label label-danger''>NOT HIRED</b>";
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    // echo "$job_id<br>$job_name";
                                                }
                                                else {
                                                    echo "<tr><td colspan='3' class='text-center'>No Available Job/s</td></tr>";
                                                }
                                            }

                                            

                                            // echo "$test_education_attainment / $test_domain / $test_skills";

                                            // echo "$job_id<br>$job_name<br>$job_domain";
                                        }
                                        ?>
                                                    </tbody>
                                                </table><br>
                                        <?php
                                    }
                                //

                                //TRAININGS
                                    $sql3 = "SELECT * FROM trainings WHERE status = 'open' ORDER BY id DESC";
                                    $qry3 = mysqli_query($con,$sql3);
                                    if (mysqli_num_rows($qry3) > 0) {
                                        ?>
                                            <legend>Trainings</legend>
                                            <table class="table table-bordered">
                                                <thead class="bg-green">
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                        <?php
                                        while ($row3 = mysqli_fetch_array($qry3)) {
                                            $training_id = $row3['id'];
                                            $training_name = $row3['name'];
                                            $training_description = html_entity_decode($row3['description']);
                                            $skills = $row3['skills'];

                                            $sql6 = "SELECT * FROM enrolee WHERE member_id = '$username' AND training_id = '$training_id'";
                                            $qry6 = mysqli_query($con,$sql6);

                                            // $test_skills = false;
                                            
                                            $skillList = explode(",",$skills);
                                            foreach ($skillList as $skills1) {
                                                $sql4 = "SELECT * FROM eda WHERE eda_id = '$username' AND skills LIKE '%$skills1%'";
                                                $qry4 = mysqli_query($con,$sql4);
                                                
                                                if (mysqli_num_rows($qry4) > 0) {
                                                    continue;
                                                }
                                                else{
                                                    $test_skills = true;
                                                    break;
                                                }
                                            }
                                            if ($test_skills) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo "$training_name"; ?></td>
                                                        <td class="text-center">
                                                            <form action="pi_server.php?s=interestTraining&id=<?php echo $training_id; ?>&eda_id=<?php echo $username; ?>" method="POST">
                                                                <button type="submit" name="btnItYes" class="btn btn-info btn-flat btn-sm" <?php if (mysqli_num_rows($qry6) == 1) { echo "disabled"; } ?>>Yes</button>
                                                                <button type="submit" name="btnItNo" class="btn btn-danger btn-flat btn-sm">No</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    // echo "$job_id<br>$job_name";
                                            }
                                            else {
                                                echo "<tr><td colspan='2' class='text-center'>No Available Training/s</td></tr>";
                                            }

                                            

                                            // echo "$test_education_attainment / $test_domain / $test_skills";

                                            // echo "$job_id<br>$job_name<br>$job_domain";
                                        }
                                        ?>
                                                    </tbody>
                                                </table>
                                        <?php
                                    }
                                //
                            }
                        ?>
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
    $(function(){
        $('#submit').click(function() {
            checked = $("input[type=checkbox]:checked").length;
            if(!checked) {
                alert("You must check at least one checkbox.");
                return false;
            }

        });
    });
</script>