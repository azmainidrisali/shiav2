<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SCTC</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <?php
            if (isset($shiacomputeroption['adminPanelLink'])) {
                $get_adminPanel_id = $shiacomputeroption['adminPanelLink']; // Get the selected page ID

                if ($get_adminPanel_id) {
                    $get_adminPanel_link = get_permalink($get_adminPanel_id); // Get the permalink of the selected page
                }
            }
        ?>

        <a class="nav-link" href="<?php echo($get_adminPanel_link) ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashbgoard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Students Panel
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Students</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">List and Admission:</h6>

                <?php
                    if (isset($shiacomputeroption['adminStudentList'])) {
                        $get_StudentList_id = $shiacomputeroption['adminStudentList']; // Get the selected page ID
    
                        if ($get_StudentList_id) {
                            $get_StudentList_link = get_permalink($get_StudentList_id); // Get the permalink of the selected page
                        }
                    }
                ?>

                <a class="collapse-item" href="<?php echo($get_StudentList_link) ?>">Student List</a>
                <?php
                    if (isset($shiacomputeroption['adminStudentAdmission'])) {
                        $get_adminStudentAdmission_id = $shiacomputeroption['adminStudentAdmission']; // Get the selected page ID

                        if ($get_adminStudentAdmission_id) {
                            $get_adminStudentAdmission_link = get_permalink($get_adminStudentAdmission_id); // Get the permalink of the selected page
                        }
                    }
                ?>
                <a class="collapse-item" href="<?php echo($get_adminStudentAdmission_link) ?>">Student Admission</a>
                
                <?php
                    if (isset($shiacomputeroption['adminStudentDraft'])) {
                        $get_adminStudentDraft_id = $shiacomputeroption['adminStudentDraft']; // Get the selected page ID

                        if ($get_adminStudentDraft_id) {
                            $get_adminStudentDraft_link = get_permalink($get_adminStudentDraft_id); // Get the permalink of the selected page
                        }
                    }
                ?>
                <a class="collapse-item" href="<?php echo($get_adminStudentDraft_link) ?>">Student Draft List</a>
                
                <?php
                    if (isset($shiacomputeroption['adminBatch'])) {
                        $get_adminBatch_id = $shiacomputeroption['adminBatch']; // Get the selected page ID

                        if ($get_adminBatch_id) {
                            $get_adminBatch_link = get_permalink($get_adminBatch_id); // Get the permalink of the selected page
                        }
                    }
                ?>
                <a class="collapse-item" href="<?php echo($get_adminBatch_link) ?>">BATCH</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>