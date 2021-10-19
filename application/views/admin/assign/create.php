


<?php $this->load->view('admin/menu');?>

<section class="home-section">
        <div class="text">Tasks</div>
        <div class="add-text">ADD NEW TASK</div>
        <!-- <div class="add-text-dtls">EMPLOYEE DETAILS</div>
        <div class="line"></div> -->
        <form name="createTask" action="<?php echo base_url().'index.php/assign/create'?>" method="post">
            <div class="row table-1">
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Task Name</label>
                    <select class="select2 form-control" data-placeholder="" id="task_id" name="task_id" style="height: 60%;">
                        <option value="all">--</option>
                        <?php if (count($getTask)):?>
                        <?php foreach($getTask as $task):?>
                            <option value=<?php echo $task->taskId;?>><?php echo $task->taskTitle;?></option>
                        <?php endforeach;?>
                        <?php else:?>
                        <?php endif?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Employee Name</label>
                    <select class="select2 form-control" data-placeholder="" id="emp_id" name="emp_id" style="height: 60%;">
                    <!-- <select class="selectpicker form-control" multiple data-placeholder="" id="emp_id" name="emp_id"> -->
                        <option value="all">--</option>
                            <?php if (count($getEmployee)):?>
                            <?php foreach($getEmployee as $employee):?>
                                <option value=<?php echo $employee->empId;?>><?php echo $employee->empName;?></option>
                            <?php endforeach;?>
                            <?php else:?>
                            <?php endif?>
                    </select>
                </div>
            </div>
            
            
            <div class="row table-6">
                <div class="save-btn">
                <button class="btn btn-block btn-success">Save</button>
                
            </div>
                <div class="save-btn">
                <a href="<?php echo base_url().'index.php/assign/index'?>">  <button class="btn btn-block btn-danger">Cancel</button></a>
                             </div>
            </div>
        </form>
    </section>
