<?php $this->load->view('pm/menu');?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<style>
    .js-example-basic-single{
        width: 100%;
    }
</style>
<section class="home-section">
        <div class="text">Tasks</div>
        <div class="add-text">Edit TASK</div>
        <!-- <div class="add-text-dtls">EMPLOYEE DETAILS</div>
        <div class="line"></div> -->
        <form name="createTask" action="<?php echo base_url().'index.php/task/pm_edit/'.$task['taskId']?>" method="post">
            <div class="row table-1">
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Task Title</label>
                    <input class="form-control" type="text" name="taskTitle" id="taskTitle" value="<?php echo set_value('taskTitle',$task['taskTitle'])?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Project Name</label>
                    <select class="select2 form-control" data-placeholder="" id="projectName" name="projectName" style="height: 55%;">
                        <option value="all">--</option>
                        <?php if (count($getProject)):?>
                        <?php foreach($getProject as $project):
                            $x="";
                            if($task['projectName'] == $project->proId){
                                $x="selected";

                            }
                            ?>
                            <option <?php echo $x; ?> value=<?php echo $project->proId;?> ><?php echo $project->proName;?></option>
                        <?php endforeach;?>
                        <?php else:?>
                        <?php endif?>
                    </select>
                </div>
            </div>
            <div class="row table-3">
                <div class="form-group address">
                    <label class="form-label col-md-12">Description</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="taskDesc" id="taskDesc" value="" rows="5" cols="300"><?php echo set_value('taskDesc',$task['taskDesc'])?></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-5">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Start Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="taskSdate" id="taskSdate" value="<?php echo set_value('taskSdate',$task['taskSdate'])?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Due Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="taskEdate" id="taskEdate" value="<?php echo set_value('taskEdate',$task['taskEdate'])?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Task Status</label>
                            <select name="taskStatus" id="taskStatus" class="form-control" value="" style="height: 100%;">
                            <?php
$x="";
if($task['taskStatus'] == "Incomplete"){
    $x="selected";
}
                            ?>
                                <option <?php echo $x; ?> value="Incomplete">Incomplete</option>
                            <?php
$x="";
if($task['taskStatus'] == "Completed"){
    $x="selected";
}
                            ?>
                                <option <?php echo $x; ?> value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-4">
                <div class="col-md-12">
                    <div class="form-group">
                    <?php $prpMemarr=explode(",",$task['taskMem']); ?>
                        <label for="project_mem" class="form-label required">Project Team Members</label>
                        <select name="taskMem[]" id="user_id" placeholder="Choose Members" class="js-example-basic-single"  multiple="true" >
                          
                            <?php if (count($getEmployee)):?>
                            <?php foreach($getEmployee as $employee):
 $x="";
 if(in_array($employee->empId,$prpMemarr)){
     $x="selected";
 }
?>
                                <option <?php echo $x; ?> value=<?php echo $employee->empId;?>><?php echo $employee->empName;?></option>
                            <?php endforeach;?>
                            <?php else:?>
                            <?php endif?>
                        </select> 
                    </div>
                </div>
            </div>
            
            <div class="row table-4">
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label">Priority</label>
                        <div class="radio-list" style="display: grid;">
                            <label class="radio-inline p-0">
                                <div class="radio radio-danger">
                                    <?php 
                                    $x="";
                                    if($task['priority'] == "high"){
                                        $x="checked";
                                    }
                                    ?>
                                    <input  type="radio" name="priority" id="radio13" <?php echo $x; ?> value="high">
                                    <label for="radio13" class="text-danger"> High </label>
                                </div>
                            </label>
                            <label class="radio-inline">
                                <div class="radio radio-warning">
                                    <?php 
                                    $x="";
                                    if($task['priority'] == "medium"){
                                        $x="checked";
                                    }
                                    ?>
                                    <input  type="radio" name="priority" id="radio14" <?php echo $x; ?> value="medium">
                                    <label for="radio14" class="text-warning"> Medium </label>
                                </div>
                            </label>
                            <label class="radio-inline">
                                <div class="radio radio-success">
                                    <?php 
                                    $x="";
                                    if($task['priority'] == "low"){
                                        $x="checked";
                                    }
                                    ?>
                                    <input  type="radio" name="priority" id="radio15" <?php echo $x; ?> value="low">
                                    <label for="radio15" class="text-success"> Low </label>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row table-6">
                <div class="save-btn">
                <button class="btn btn-block btn-success">Save</button>
                <a href="<?php echo base_url().'index.php/task/index'?>" class="btn-secondary btn">Cancel</a>
                </div>
            </div>
        </form>
    </section>

    <script>
               $(document).ready(function(){
                      
                       
                      $('.js-example-basic-single').select2();
                          
                      });

           </script>