<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "gen";

$conn = mysqli_connect($hostname, $username, $password, $database);

?>

<?php

$query = "select proId from project order by proId desc";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$last_id = $row['proId'];

if(empty($last_id)){

    $proId = "GET-20-21-001";
}
else {

    $idd = str_replace("GET-20-21-","",$last_id);
    $id = str_pad($idd + 1, 3, 0, STR_PAD_LEFT);
    $proId = 'GET-20-21-'.$id;
}

?>





<?php $this->load->view('gm/menu');?>

<section class="home-section">
        <div class="text">Project</div>
        <div class="add-text">ADD PROJECT INFO</div>
        <div class="add-text-dtls">PROJECT DETAILS</div>
        <div class="line"></div>
        <form name="createProject" action="<?php echo base_url().'index.php/project/gm_create'?>" method="post">
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
                            <?php if (count($getClient)):?>
                            <?php foreach($getClient as $client):?>
                                <option value=<?php echo $client->clnId;?>><?php echo $client->clnName;?></option>
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
                        <label for="project_mem" class="form-label required">Project Team Members</label>
                        <select name="proMem[]" id="cars" placeholder="Choose Members" class="form-control" value="" multiple >
                          
                            <?php if (count($getEmployee)):?>
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
                    <a href="<?php echo base_url().'index.php/project/gm_index'?>" class="btn-secondary btn">Cancel</a>
                </div>
            </div>
        </form>
    </section>