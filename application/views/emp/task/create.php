<?php $this->load->view('emp/menu');?>

<section class="home-section">
        <div class="text">Tasks</div>
        <div class="add-text">ADD NEW TASK</div>
        <!-- <div class="add-text-dtls">EMPLOYEE DETAILS</div>
        <div class="line"></div> -->
        <form name="createTask" action="<?php echo base_url().'index.php/task/create'?>" method="post">
            <div class="row table-1">
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Task Title</label>
                    <input class="form-control" type="text" name="taskTitle" id="taskTitle" value="">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Project Name</label>
                    <select class="select2 form-control" data-placeholder="" id="projectName" name="projectName">
                        <option value="all">--</option>
                        <?php if (count($getProject)):?>
                        <?php foreach($getProject as $project):?>
                            <option value=<?php echo $project->proName;?>><?php echo $project->proName;?></option>
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
                        <textarea class="form-control" name="taskDesc" id="taskDesc" value="" rows="5" ></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-5">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Start Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="taskSdate" id="taskSdate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Due Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="taskEdate" id="taskEdate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Task Status</label>
                            <select name="taskStatus" id="taskStatus" class="form-control" value="">
                                <option value="Incomplete">Incomplete</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label required">Assigned To</label>
                        <select class="select2 form-control" data-placeholder="" id="taskMem" name="taskMem">
                            <option value="all">--</option>
                            <?php if (count($getEmployee)):?>
                            <?php foreach($getEmployee as $employee):?>
                                <option value=<?php echo $employee->empName;?>><?php echo $employee->empName;?></option>
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
                                    <input type="radio" name="priority" id="radio13" value="high">
                                    <label for="radio13" class="text-danger"> High </label>
                                </div>
                            </label>
                            <label class="radio-inline">
                                <div class="radio radio-warning">
                                    <input type="radio" name="priority" id="radio14" checked value="medium">
                                    <label for="radio14" class="text-warning"> Medium </label>
                                </div>
                            </label>
                            <label class="radio-inline">
                                <div class="radio radio-success">
                                    <input type="radio" name="priority" id="radio15" value="low">
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
