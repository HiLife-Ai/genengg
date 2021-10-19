<?php $this->load->view('pm/menu');?>

    <section class="home-section">
        <div class="col-6 text">Projects</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/project/pm_create'?>" class="btn btn-outline-primary">Add New Project</a>
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
                        <th scope="col">Change STATUS</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $coun=1;
                        if(count($projects)>0) { foreach($projects as $project) {?>
                           
                            <tr>
                                <td><?php echo $coun++ ?></td>
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
                                
                                <td><?php $allclient=$totalclint;
                             
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
                                <td><form  action="<?php echo base_url().'index.php/project/upd_date'?>" method="post">
                                <input type="hidden" name="proid000" value="<?php echo $project['proId']; ?>">
                                
                                <select name="propmem" onchange="this.form.submit()" id="check">
                                    <?php
                                    

$status=$project['proStatus'];
$x="";
if($status == "Not Started"){
    $x="selected"."  "."disabled";
    ?>
<option <?php echo $x; ?> value="Not Started">Not Started</option>
<option value="In Progress">In Progress</option>
<option  value="Canceled">Canceled</option>
<option value="On Hold">On Hold</option>

    <?php
}
?>

  
<?php
$x="";
if($status == "In Progress"){
    
    $x="selected"."  "."disabled";
    ?>
<option <?php echo $x; ?> value="In Progress">In Progress</option>
<option  value="Finished">Finished</option>
<option  value="Canceled">Canceled</option>
<option  value="Under Review">Under Review</option>

<?php
}
?>
<?php
$x="";
if($status == "On Hold"){
    $x="selected"."  "."disabled";
    ?>
<option <?php echo $x; ?> value="On Hold">On Hold</option>
<option  value="In Progress">In Progress</option>
<option  value="Canceled">Canceled</option>

    <?php
}
?>

<?php
$x="";
if($status == "Canceled"){
    $x="selected"."  "."disabled";
    ?>
<option <?php echo $x; ?> value="Canceled">Canceled</option>
<option  value="In Progress">In Progress</option>

    <?php
}
?>

<?php
$x="";
if($status == "Finished"){
    $x="selected"."  "."disabled";
    ?>
<option <?php echo $x; ?> value="Finished">Finished</option>
<?php
}
?>
<?php
$x="";
if($status == "Under Review"){
    $x="selected"."  "."disabled";
    ?>
<option <?php echo $x; ?> value="Under Review">Under Review</option>
<option  value="Finished">Finished</option>


    <?php
}
?>


</select>
</form></td>
<td>
                                    <a href="<?php echo base_url().'index.php/project/pm_edit/'.$project['proId']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/project/pm_delete/'.$project['proId']?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="8" style="text-align: center;">Project records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>