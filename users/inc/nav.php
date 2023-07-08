<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div class="pull-left image">
            <?php
                if ($picture == '') $picture = "../assets/profile.jpg";
            ?>
            <img src="<?php echo $picture; ?>" class="img-circle" alt="User Image">
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
            <li class="<?php if ($currentPage == 'info') { echo 'active'; } ?>">
                <a href="info.php">
                    <i class="fa fa-info-circle"></i> <span>Profile Management</span>
                </a>
            </li>
            <li class="<?php if ($currentPage == 'pi') { echo 'active'; } ?>">
                <a href="pi.php">
                    <i class="fa fa-asterisk"></i> <span>Personality and Interest</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>