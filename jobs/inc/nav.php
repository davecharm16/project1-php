<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo $image; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p><?php echo "$lastname, $firstname"; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="https://dohtrcdagupan.wordpress.com/" target="_blank"><i class="fa fa-external-link"></i> <span>DTRC-R1 Website</span></a></li>
            <li class="<?php if ($currentPage == 'company') { echo 'active'; } ?>">
                <a href="company.php">
                    <i class="ion ion-merge"></i> <span>Company Management</span>
                </a>
            </li>
            <!-- <li class="<?php if ($currentPage == 'jobs') { echo 'active'; } ?>">
                <a href="jobs.php">
                    <i class="fa fa-briefcase"></i> <span>Jobs</span>
                </a>
            </li> -->
            <li class="treeview <?php if ($currentTree == 'report') echo 'active'; ?>">
                <a href="#">
                <i class="fa fa-file-text-o"></i> <span>Report Management</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <!-- <li class="<?php if ($currentPage == 'report_one') { echo 'active'; } ?>"><a href="report_one.php"><i class="fa fa-circle-o"></i> Per Date</a></li> -->
                <li class="<?php if ($currentPage == 'report_two') { echo 'active'; } ?>"><a href="report_two.php"><i class="fa fa-circle-o"></i> Summary of EDA Status</a></li>
                <li class="<?php if ($currentPage == 'report_four') { echo 'active'; } ?>"><a href="report_four.php"><i class="fa fa-circle-o"></i> Summary of Jobs</a></li>
                <!-- <li class="<?php if ($currentPage == 'report_three') { echo 'active'; } ?>"><a href="report_three.php"><i class="fa fa-circle-o"></i> Demographic Report</a></li> -->
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>