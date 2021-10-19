<?php $this->load->view('emp/menu');?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  
  <!-- Large modal -->
  <?php
                        $cou=1;
                        if(count($tasks)>0) { foreach($tasks as $task) {
                            
                             
                            
                            
                            ?>

  <div class="modal fade bd-example-modal-lg<?php echo $task->taskId; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <form >
      <div class="row table-1">
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Task Title</label>
                    <input class="form-control" type="text" name="taskTitle" disabled id="taskTitle" value="<?php echo $task->taskTitle; ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="form-label">Project Name</label>
                    <input class="form-control" type="text" name="taskTitle" disabled id="form-label" value="<?php echo $task->projectName ?>">
                    
                </div><br>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Description</label>
                            <textarea class="form-control" name="taskDesc" disabled id="taskDesc" value="" rows="5" ><?php echo $task->taskDesc ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="row table-5">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Start Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="taskSdate" id="taskSdate" disabled value="<?php echo $task->taskSdate ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Due Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="taskEdate" id="taskEdate" disabled value="<?php echo $task->taskEdate ?>" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="form-label required">Task Status</label>
                            <input class="form-control" type="text" name="taskTitle" disabled  id="form-label" value="<?php
                               $promem=explode(",",$task->taskMem );
                             $promemStatus=explode(",",$task->taskMemStatus );
                             for ($i=0; $i < count($promem); $i++) { 
                                 
                                 if($promem[$i] == $_COOKIE['empId'] ){
                                     
                                     $status=$promemStatus[$i];
                                     if($status == "Pending"){
                                         echo "Pending";
                                         
                                     }else if($status == "Progress"){
                                         echo "Progress";
                                         
                                     }else if($status == "Complete"){
                                         
                                         echo "Complete";
                                     }
                                 }
                             }
?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row table-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label required">piroty To</label>
                        <input class="form-control" type="text" name="taskTitle" disabled id="control-label" value="<?php echo $task->priority ?>">
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
      
      <!-- Extra large modal -->
      
      
        <div class="col-6 text">Task</div>
        
        <div class="container" style="background: none; box-shadow: none; margin: 2%;">
            <div class="row" style="width: 100%;">

                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">TASK</th>
                        <th scope="col">PROJECT</th>
                        <th scope="col">ASSIGNED TO</th>
                        <th scope="col">DUE DATE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cou=1;
                        if(count($tasks)>0) { foreach($tasks as $task) {?>
                            <tr >
                                <td><?php echo $cou++; ?></td>
                                <td data-toggle="modal" data-target=".bd-example-modal-lg<?php echo $task->taskId; ?>"><?php echo $task->taskTitle ?></td>
                                <td><?php 
                                echo $task->projectName;
                                 ?></td>
                                <td><?php 
                                 $promem=explode(",",$task->taskMem );
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
                                

                                 ?></td>
                                <td><?php echo $task->taskEdate ?></td>
                                <td>
                                <?php
                                   
                                    $promemStatus=explode(",",$task->taskMemStatus );
                                    for ($i=0; $i < count($promem); $i++) { 
                                        
                                        if($promem[$i] == $_COOKIE['empId'] ){
                                            
                                            $status=$promemStatus[$i];
                                            if($status == "Pending"){
                                                echo "Pending";
                                                
                                            }else if($status == "Progress"){
                                                echo "Progress";
                                                
                                            }else if($status == "Complete"){
                                                
                                                echo "Complete";
                                            }
                                        }
                                    }

                                    
                                    ?>    
                                
                                
                                <td>
                                    <form  action="<?php echo base_url().'index.php/task/upd_date'?>" method="post">
                                    <input type="hidden" name="proid000" value="<?php echo $task->taskId ; ?>">
                                    
                                    <select name="propmem" onchange="this.form.submit()" id="check">
                                            <?php
                                    $promem=explode(",",$task->taskMem );
                                    $promemStatus=explode(",",$task->taskMemStatus );
                                    for ($i=0; $i < count($promem); $i++) { 
                                        
                                        if($promem[$i] == $_COOKIE['empId'] ){
                                            
                                            $status=$promemStatus[$i];
                                            if($status == "Pending"){
                                                echo "<option value='Pending' disabled selected>Pending</option><option value='Progress'>Progress</option>";
                                                
                                            }else if($status == "Progress"){
                                                echo "<option value='Progress' disabled selected>Progress</option><option value='Complete' >Complete</option>";
                                                
                                            }else if($status == "Complete"){
                                                
                                                echo "<option value='Complete' disabled selected>Complete</option>";
                                            }
                                        }
                                    }

                                    
                                    ?>
                                    
                                   
                                </select>
                            </form>
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="7" style="text-align: center;">Task records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>
