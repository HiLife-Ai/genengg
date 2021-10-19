<?php $this->load->view('admin/menu');?>

    <section class="home-section">
        <div class="col-6 text">Projects</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/project/create'?>" class="btn btn-outline-primary">Add New Project</a>
            <a href="<?php echo base_url().'index.php/project/data/'?>" class="btn btn-outline-success">Export</a>
        </div>
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
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        $coun=1;
                        if(count($projects)>0) { foreach($projects as $project) {?>
                           
                            <tr>
                                <td><?php echo $coun++;?></td>
                                <td>
                                    
                                    <?php echo 
                                $project['proName'] ?></td>
                                <td>
                                    <?php 
                                  $promem=explode(",",$project['proMem']);
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
                                echo $project['client'];
                                
                                ?></td>
                                <td><?php echo $project['planEdate']?></td>
                                <td>
                                    
                                <?php 
                             echo $project['proStatus'];   
                                
                                ?>
                            
                            
                            
                            </td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/project/edit/'.$project['proId']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/project/delete/'.$project['proId']?>" class="btn btn-outline-danger">Delete</a>
                                </td>
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