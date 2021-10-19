<?php $this->load->view('hm/menu');?>

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
                                 $allclient=$totalclint;
                             
                                 foreach($allclient as $clint){
                                     if($project['client'] == $clint['clnId']){
                                         echo $clint['clnName'];
                                     }
 
                                 }
                                
                                ?></td>
                                <td><?php echo $project['actualDate']?></td>
                                <td><?php 
                                echo $project['proStatus'];
                                
                                
                                
                                
                                
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