<?php $this->load->view('admin/menu');?>

    <section class="home-section">
        <div class="col-6 text">Task</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/assign/create'?>" class="btn btn-outline-primary">New Task Assign</a>
            <a href="<?php echo base_url().'index.php/assign/data/'?>" class="btn btn-outline-success">Export</a>
        </div>
        <div class="container" style="background: none; box-shadow: none; margin: 2%;">
            <div class="row" style="width: 100%;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">TASK NAME</th>
                        <th scope="col">EMPLOYEE NAME</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($assigned)>0) { foreach($assigned as $assign) {?>
                            <tr>
                                <td><?php echo $assign['id']?></td>
                                <td><?php echo $assign['task_id']?></td>
                                <td><?php echo $assign['emp_id']?></td>
                                <td>
                                    <!-- <a href="<?php echo base_url().'index.php/assign/edit/'.$assign['id']?>" class="btn btn-outline-primary">Edit</a> -->
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/assign/delete/'.$assign['id']?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="5">Task records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>