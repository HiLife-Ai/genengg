<?php $this->load->view('admin/menu');?>

<section class="home-section">
        <div class="col-6 text">Employee</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/designation/create'?>" class="btn btn-outline-primary">Add New Designation</a>
            <a href="<?php echo base_url().'index.php/designation/data/'?>" class="btn btn-outline-success">Export</a>
        </div>
        <div class="container" style="background: none; box-shadow: none; margin: 2%;">
            <div class="row" style="width: 100%;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">DESIGNATION NAME</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $coun=1;
                        if(count($designations)>0) { foreach($designations as $designation) {?>
                            <tr>
                                <td><?php echo $coun++ ;?></td>
                                <td><?php echo $designation['role']?></td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/designation/edit/'.$designation['id']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/designation/delete/'.$designation['id']?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="5">Employee records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>