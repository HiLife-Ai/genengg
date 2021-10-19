<?php $this->load->view('gm/menu');?>

    <section class="home-section">
        <div class="col-6 text">Task</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/task/gm_create'?>" class="btn btn-outline-primary">Add New Task</a>
            <a href="<?php echo base_url().'index.php/task/data/'?>" class="btn btn-outline-success">Export</a>
        </div>
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
                        <?php if(count($tasks)>0) { foreach($tasks as $task) {?>
                            <tr>
                                <td><?php echo $task['taskId']?></td>
                                <td><?php echo $task['taskTitle']?></td>
                                <td><?php echo $task['projectName']?></td>
                                <td><?php echo $task['taskMem']?></td>
                                <td><?php echo $task['taskEdate']?></td>
                                <td><?php echo $task['taskStatus']?></td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/task/gm_edit/'.$task['taskId']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/task/gm_delete/'.$task['taskId']?>" class="btn btn-outline-danger">Delete</a>
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