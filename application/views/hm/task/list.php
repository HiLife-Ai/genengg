<?php $this->load->view('hm/menu');?>

    <section class="home-section">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $coun=1;
                        if(count($tasks)>0) { foreach($tasks as $task) {?>
                            <tr>
                                <td><?php echo $coun++;?></td>
                                <td><?php echo $task['taskTitle']?></td>
                                <td><?php 
                                $allproject=$totalproject;
                             
                                foreach($allproject as $project){
                                    if($task['projectName'] == $project['proId']){
                                        echo $project['proName'];
                                    }

                                }

                               ?></td>
                                <td><?php  
                                $promem=explode(",",$task['taskMem'] );
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
                                <td><?php echo $task['taskEdate']?></td>
                                <td>
                                <?php 
                                $status=explode(",",$task['taskMemStatus']);
                                    
                                    
                                    if(in_array("Pending",$status) || in_array("Progress",$status) ){
                                        
                                        echo "Pending";
                                        
                                    }
                                    else{
                                        
                                        echo "Complete";
                                        
                                    }
                                


                                
                                
                                ?>    
                                
                                </td>

                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="6" style="text-align: center;">Task records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>