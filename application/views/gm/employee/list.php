<?php $this->load->view('admin/menu');?>

<section class="home-section">
        <div class="col-6 text">Employee</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/employee/create'?>" class="btn btn-outline-primary">Add New Employee</a>
            <a href="<?php echo base_url().'index.php/employee/data/'?>" class="btn btn-outline-success">Export</a>
        </div>
        <div class="container" style="background: none; box-shadow: none; margin: 2%;">
            <div class="row" style="width: 100%;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">JOINING DATE</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($employees)>0) { foreach($employees as $employee) {?>
                            <tr>
                                <td><?php echo $employee['id']?></td>
                                <td><?php echo $employee['empName']?></td>
                                <td><?php echo $employee['empMail']?></td>
                                <td><?php echo $employee['empRole']?></td>
                                <td><?php echo $employee['joinDate']?></td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/employee/edit/'.$employee['id']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/employee/delete/'.$employee['id']?>" class="btn btn-outline-danger">Delete</a>
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