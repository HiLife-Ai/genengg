<?php $this->load->view('emp/menu');?>



<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <?php 
                        $coun=1;
                        if(count($projects)>0) { foreach($projects as $project) {
                        
                           
                            
                        
                             
                            
                            ?>

  <div class="modal fade bd-example-modal-lg<?php echo $project->proId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <form >
            <div class="row table-1">
                
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Project Name</label>
                    <input class="form-control" type="text" disabled name="proName" value="<?php echo $project->proName; ?>"   id="proName" >
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label required">Client Name</label>
                        <input class="form-control" type="text" disabled name="scopeWork"  id="form-label" value="<?php echo $project->client; ?>" >
                    </div>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Scope Of Work</label>
                    <input class="form-control" type="text" disabled name="scopeWork"  id="scopeWork" value="<?php echo $project->scopeWork; ?>">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Planned Start Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="planSdate" id="planSdate" disabled value="<?php echo $project->planSdate; ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Planned End Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="planEdate" id="planEdate" disabled value="<?php echo $project->planEdate; ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="row table-2">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Client Project Number</label>
                    <input class="form-control" type="text" name="clnprono" disabled id="clnprono" value="<?php echo $project->clnprono; ?>">
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Actual Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="actualDate" id="actualDate" disabled value="<?php echo $project->actualDate; ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Project Status</label>
                            <input class="form-control" type="text" disabled id="form-label" value="<?php echo $project->proStatus; ?>">
                            
                        </div>
                    </div>
                </div>
            </div>  
            <div class="row table-2">
                <div class="col-md-12">
                <div class="txt-area">
                        <label for="exampleFormControlTextarea1" class="form-label">Remarks</label>
                        <textarea class="form-control" name="proRemarks" id="proRemarks" disabled value="" rows="5"><?php echo $project->proRemarks; ?></textarea>
                    </div>
                </div>
            </div>

        </form>
     
      </div>
    </div>
  </div>
  
  <?php
                                }
                            }
  
                        
                    
  ?>
  

    <section class="home-section">
        <div class="col-6 text">Projects</div>
       
        <div class="container" style="background: none; box-shadow: none; margin: 2%;">
            <div class="row" style="width: 100%;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">PROJECT MEMBERS</th>
                        <th scope="col">CLIENT</th>
                        <th scope="col">DEADLINE</th>
                        <th scope="col">STATUS</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $coun=1;
                        if(count($projects)>0) { foreach($projects as $project) {?>
                           
                            <tr>
                                <td><?php echo $coun++; ?></td>
                                <td data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $project->proId; ?>" >
                                    
                                    <?php echo 
                                $project->proName; ?></td>
                                <td>
                                    <?php 



                                    $promem=explode(",",$project->proMem);
                                 $allemployee=$totalemployee;
                                 $xassa=array();
                                foreach ($promem as $key=>$value) {
                                    foreach($allemployee as $key2=>$emp){
                                        if($promem[$key] == $emp['empId']){
                                            array_push($xassa,$emp['empName']);

                                        }

                                    }
                                }
                                echo implode(",",$xassa);
                                
                                                                        ?>
                                    
                            </td>
                                
                                <td><?php 
                                 
                                         echo $project->client;
                                  
                                
                                ?></td>
                                <td><?php echo $project->actualDate?></td>
                                <td><?php 
                                echo $project->proStatus;
                                
                                
                                
                                
                                
                                ?></td>
                                
                                
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Project records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>