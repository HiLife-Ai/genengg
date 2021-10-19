<?php $this->load->view('hm/menu');?>

<section class="home-section">
    <div class="text">Dashboard</div>
        <div class="row db-box">
            <div class="col-md-4">
                <a href="<?php echo base_url().'index.php/employee/hr_index'?>" class="col-md-12 form-control">
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
                <a href="<?php echo base_url().'index.php/task'?>" class="col-md-12 form-control">
                    <div class="col-md-3 box-content">
                        <img src="<?php echo base_url().'assets/img/project2.png';?>" alt="clientImg" width="50" height="50">
                    </div>
                    <div class="col-md-9 box-text">
                        <h5 class="text-right box-title">Pending Task</h5>
                        <p class="text-right count"><?php echo $countPendingTasks;?></p>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="<?php echo base_url().'index.php/task'?>" class="col-md-12 form-control">
                    <div class="col-md-3 box-content">
                        <img src="<?php echo base_url().'assets/img/client2.png';?>" alt="clientImg" width="50" height="50">
                    </div>
                    <div class="col-md-9 box-text">
                        <h5 class="text-right box-title">Complete Task</h5>
                        <p class="text-right count"><?php echo $countCompleteTasks;?></p>
                    </div>
                </a>
            </div>
        </div> 
    </div>
    
</section>
