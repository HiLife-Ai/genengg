




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
        <form name="createProject" action="<?php echo base_url().'index.php/project/create'?>" method="post">
            <div class="row table-1">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Project ID</label>
                    <input class="form-control" type="text" name="proId" id="proId" value="<?php echo $proId?>" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Project Name</label>
                    <input class="form-control" type="text" name="proName"  id="proName" value="">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label required">Client Name</label>
                        <select name="client" id="client" class="form-control" value="" style="height: 100%;">
                            <option value="">--</option>
                            <?php 
                            if($getClient != null){

                                if(count($getClient) > 0){
                                    
                                    
                                    foreach($getClient as $client){?>
                                <option value=<?php echo $client->clnId;?>><?php echo $client->clnName;?></option>
                                <?php
                            
                        }}
                    }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Scope Of Work</label>
                    <input class="form-control" type="text" name="scopeWork"  id="scopeWork" value="">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Planned Start Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="planSdate" id="planSdate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Planned End Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="planEdate" id="planEdate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="project_mem" class="form-label required">Project Team Members</label><br>
                        <select name="proMem[]" id="cars" placeholder="Choose Members" class="js-example-basic-single"  multiple="true" >
                          
                            <?php if (count($getEmployee) > 0):?>
                            <?php foreach($getEmployee as $employee):?>
                                <option value=<?php echo $employee->empId;?>><?php echo $employee->empName;?></option>
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
                    <input class="form-control" type="text" name="clnprono" id="clnprono" value="">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Actual Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="actualDate" id="actualDate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Project Status</label>
                            <select name="proStatus" id="proStatus" class="form-control" value="" style="height: 100%;">
                                <option value="">--</option>
                                <option value="Not Started">Not Started</option>
                                <option value="In Progress">In Progress</option>
                                <option value="On Hold">On Hold</option>
                                <option value="Canceled">Canceled</option>
                                <option value="Finished">Finished</option>
                                <option value="Under Review">Under Review</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row table-2">
                <div class="col-md-12">
                <div class="txt-area">
                        <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
                        <textarea class="form-control" name="proRemarks" id="proRemarks" value="" rows="5"></textarea>
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