<?php $this->load->view('gm/menu');?>

    <section class="home-section">
        <div class="col-6 text">Projects</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/project/gm_create'?>" class="btn btn-outline-primary">Add New Project</a>
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
                        <?php if(count($projects)>0) { foreach($projects as $project) {?>
                           
                            <tr>
                                <td><?php echo $project['proId']?></td>
                                <td>
                                    
                                    <?php echo 
                                $project['proName'] ?></td>
                                <td>
                                    <?php 
                                    $projectmem=$project['proMem'];
                                        echo $projectmem;
                                   
                                                                        ?>
                                    
                            </td>
                                
                                <td><?php echo $project['client']?></td>
                                <td><?php echo $project['actualDate']?></td>
                                <td><?php echo $project['proStatus']?></td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/project/gm_edit/'.$project['proId']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/project/gm_delete/'.$project['proId']?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="5">Project records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>