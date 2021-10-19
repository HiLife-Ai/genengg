<?php $this->load->view('header');?>

<div class="sidebar">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus icon'></i>
        <div class="logo_name">Gen Engineering</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
        <li><i class='bx bx-search' ></i>
            <input type="text" placeholder="Search...">
            <!-- <span class="tooltip">Search</span> -->
        </li>
        <li class="sidebar-dropdown" id="sidebar-dropdown1">
            <a href="<?php echo base_url().'index.php/gm_dashboard'?>" ><i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
                <!-- <span><i class="bx bx-caret-down" id="down-icon"></i></span> -->
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li class="sidebar-dropdown">
            <a href="<?php echo base_url().'index.php/client/gm_index'?>"><i class='bx bx-group' ></i>
                <span class="links_name">Clients</span>
            </a>
            <!-- <span class="tooltip">User</span> -->
        </li>
        <li class="sidebar-dropdown" id="sidebar-dropdown3">
            <a href="#"><i class='bx bx-layer' ></i>
                <span class="links_name">Work</span>
                <span><i class="bx bx-caret-down" id="down-icon"></i></span>
            </a>
            <!-- <span class="tooltip">Analytics</span> -->
            <div class="sidebar-submenu" id="sidebar-submenu3">
                <ul>
                    <li><a href="<?php echo base_url().'index.php/project/gm_index'?>">Project</a></li>
                    <li><a href="<?php echo base_url().'index.php/task/gm_index'?>">Task</a></li>
                    <!--<li><a href="
                    <?php /*echo base_url().'index.php/assign/gm_index'*/?> 
                    ">Assign Task</a></li>-->
                </ul>
            </div>
        </li>
        <li class="sidebar-dropdown" id="sidebar-dropdown4">
            <a href="#"><i class='bx bx-pie-chart-alt-2' ></i>
                <span class="links_name">Report</span>
                <span><i class="bx bx-caret-down" id="down-icon"></i></span>
            </a>
            <!-- <span class="tooltip">Order</span> -->
            <div class="sidebar-submenu" id="sidebar-submenu4">
                <ul>
                    <li><a href="#">Task Report</a></li>
                </ul>
            </div>
        </li>
        <li class="sidebar-dropdown">
            <a href="#"><i class='bx bx-cog' ></i>
                <span class="links_name">Settings</span>
            </a>
            <!-- <span class="tooltip">Setting</span> -->
        </li>
        <li class="profile">
            <div class="profile-details">
                <img src="<?php echo base_url().'assets/img/profile.jpg';?>" alt="profileImg">
                <div class="name_job">
                    <div class="name"><?php echo $this->session->userdata('empName');?></div>
                    <div class="job"><?php echo $this->session->userdata('empRole');?></div>
                </div>
            </div>
            <a href="<?php echo base_url(); ?>index.php/login/logout"><i class='bx bx-log-out' id="log_out" ></i></a>
        </li>
    </ul>
</div>

<?php $this->load->view('footer');?>