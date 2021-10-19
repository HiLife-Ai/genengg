<?php $this->load->view('pm/menu');?>

<section class="home-section">
    <div class="text">Welcome To Project Manager Dashboard</div>
    <div class="row db-box">
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
        <div class="col-md-4">
            <a href="<?php echo base_url().'index.php/task/index'?>" class="col-md-12 form-control">
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
            <a href="<?php echo base_url().'index.php/task/index'?>" class="col-md-12 form-control">
                <div class="col-md-3 box-content">
                    <img src="<?php echo base_url().'assets/img/project2.png';?>" alt="clientImg" width="50" height="50">
                </div>
                <div class="col-md-9 box-text">
                    <h5 class="text-right box-title">Complete Task</h5>
                    <p class="text-right count"><?php echo $countCompleteTasks;?></p>
                </div>
            </a>
        </div>
       
    </div>
        
    
</section>
