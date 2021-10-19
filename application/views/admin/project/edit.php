<?php $this->load->view('admin/menu');?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

<style>
    .js-example-basic-single{
        width: 100%;
    }
</style>
<section class="home-section">
        <div class="text">Project</div>
        <div class="add-text">ADD PROJECT INFO</div>
        <div class="add-text-dtls">PROJECT DETAILS</div>
        <div class="line"></div>
        <form name="createProject" action="<?php echo base_url().'index.php/project/edit/'.$id?>" method="post">
            <div class="row table-1">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Project ID</label>
                    <input class="form-control" type="text" name="proId" id="proId" value="<?php echo set_value('proId',$project['proId'])?>" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Project Name</label>
                    <input class="form-control" type="text" name="proName"  id="proName" value="<?php echo set_value('proName',$project['proName'])?>">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label required">Client Name</label>
                        <select name="client" id="client" class="form-control" value="" style="height: 100%;">
                            <option value="">--</option>
                            <?php if (count($getClient)):?>
                            <?php foreach($getClient as $client):
                                $y="";
                                if($project['client'] == $client->clnId ){
                                    $y="selected";
                                }
                                ?>
                                <option <?php echo $y; ?> value=<?php echo $client->clnId;?>><?php echo $client->clnName;?></option>
                            <?php endforeach;?>
                            <?php else:?>
                            <?php endif?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Scope Of Work</label>
                    <input class="form-control" type="text" name="scopeWork"  id="scopeWork" value="<?php echo set_value('scopeWork',$project['scopeWork'])?>">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Planned Start Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="planSdate" id="planSdate" value="<?php echo set_value('planSdate',$project['planSdate'])?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Planned End Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="planEdate" id="planEdate" value="<?php echo set_value('planEdate',$project['planEdate'])?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <?php $prpMemarr=explode(",",$project['proMem']); ?>
                        <label for="project_mem" class="form-label required">Project Team Members</label>
                        
                        <select name="proMem[]" id="cars" placeholder="Choose Members" class="js-example-basic-single"  multiple="true" >
                            
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
            <div class="row table-2">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Client Project Number</label>
                    <input class="form-control" type="text" name="clnprono" id="clnprono" value="<?php echo set_value('clnprono',$project['clnprono'])?>">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Actual Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="actualDate" id="actualDate" value="<?php echo set_value('actualDate',$project['actualDate'])?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Project Status</label>
                            <select name="proStatus" id="proStatus" class="form-control"  style="height: 100%;">
                            <?php
                            $y="";
                            if($project['proStatus'] == "Not Started"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="Not Started">Not Started</option>
                                <?php
                            $y="";
                            if($project['proStatus'] == "Started"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="Started">Started</option>
                                <?php
                            $y="";
                            if($project['proStatus'] == "In Progress"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="In Progress">In Progress</option>
                                <?php
                            $y="";
                            if($project['proStatus'] == "On Hold"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="On Hold">On Hold</option>
                                <?php
                            $y="";
                            if($project['proStatus'] == "Canceled"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="Canceled">Canceled</option>
                                <?php
                            $y="";
                            if($project['proStatus'] == "Finished"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="Finished">Finished</option>
                                <?php
                            $y="";
                            if($project['proStatus'] == "Under Review"){
                                $y="selected";
                            }
                            ?>
                                <option <?php echo $y; ?> value="Under Review">Under Review</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row table-2">
                <div class="col-md-12">
                <div class="txt-area">
                        <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
                        <textarea class="form-control" name="proRemarks" id="proRemarks" value="" rows="5"><?php echo set_value('proRemarks',$project['proRemarks'])?></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-6">
                <div class="save-btn">
                    <button class="btn btn-block btn-success">Save</button>
                    <a href="<?php echo base_url().'index.php/project/index'?>" class="btn-secondary btn">Cancel</a>
                </div>
            </div>
        </form>
    </section>



    
    <script>
        $(document).ready(function(){
           
            
            $('.js-example-basic-single').select2();
                
            });
   

    </script>