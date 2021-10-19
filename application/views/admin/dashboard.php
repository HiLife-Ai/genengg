<?php $this->load->view('admin/menu');?>

<section class="home-section">
    <div class="text">Dashboard</div>
    <div class="row db-box">
        <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/client/index'?>" class="col-md-12 form-control">
                <div class="col-md-3 box-content">
                    <img src="<?php echo base_url().'assets/img/client2.png';?>" alt="clientImg" width="50" height="50">
                </div>
                <div class="col-md-9 box-text">
                    <h5 class="text-right box-title">Total Clients</h5>
                    <p class="text-right count"><?php echo $countTotalClients;?></p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/employee/index'?>" class="col-md-12 form-control">
                <div class="col-md-3 box-content">
                    <img src="<?php echo base_url().'assets/img/man2.png';?>" alt="clientImg" width="50" height="50">
                </div>
                <div class="col-md-9 box-text">
                    <h5 class="text-right box-title">Total Employees</h5>
                    <p class="text-right count"><?php echo $countTotalEmployees;?></p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/project/index'?>" class="col-md-12 form-control">
                <div class="col-md-3 box-content">
                    <img src="<?php echo base_url().'assets/img/project2.png';?>" alt="clientImg" width="50" height="50">
                </div>
                <div class="col-md-9 box-text">
                    <h5 class="text-right box-title">Total Projects</h5>
                    <p class="text-right count"><?php echo $countTotalProjects;?></p>
                </div>
            </a>
        </div>
    </div>
        <div class="row db-box table-2">
        <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/task/index'?>" class="col-md-12 form-control">
                <div class="col-md-3 box-content">
                    <img src="<?php echo base_url().'assets/img/bending2.png';?>" alt="clientImg" width="50" height="50">
                </div>
                <div class="col-md-9 box-text">
                    <h5 class="text-right box-title">Pending Tasks</h5>
                    <p class="text-right count"><?php echo $countPendingTasks;?></p>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/task/index'?>" class="col-md-12 form-control">
                <div class="col-md-3 box-content">
                    <img src="<?php echo base_url().'assets/img/task2.png';?>" alt="clientImg" width="50" height="50">
                </div>
                <div class="col-md-9 box-text">
                    <h5 class="text-right box-title">Completed Tasks</h5>
                    <p class="text-right count"><?php echo $countCompleteTasks;?></p>
                </div>
            </a>
        </div>
      
    </div>
    
</section>
