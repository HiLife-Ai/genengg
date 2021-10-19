<?php $this->load->view('gm/menu');?>

	<section class="home-section">
        <div class="col-6 text">Client</div>
        <div class="col-6" id="add-emp">
            <a href="<?php echo base_url().'index.php/client/gm_create'?>" class="btn btn-outline-primary">Add New Client</a>
            <a href="<?php echo base_url().'index.php/client/data/'?>" class="btn btn-outline-success">Export</a>
        </div>
        <div class="container" style="background: none; box-shadow: none; margin: 2%;">
            <div class="row" style="width: 100%;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">CONSULTANT NAME</th>
                        <th scope="col">CONTACT NUMBER</th>
                        <th scope="col">FIRST ORDER DATE</th>
                        <th scope="col">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php if(count($clients)>0) { foreach($clients as $client) {?>
                            <tr>
                                <td><?php echo $client['clnId']?></td>
                                <td><?php echo $client['clnName']?></td>
                                <td><?php echo $client['clnMail']?></td>
                                <td><?php echo $client['consName']?></td>
                                <td><?php echo $client['contPhone']?></td>
                                <td><?php echo $client['orderDate']?></td>
                                <td>
                                    <a href="<?php echo base_url().'index.php/client/gm_edit/'.$client['clnId']?>" class="btn btn-outline-primary">Edit</a>
                                    <a onclick="confirm('Are you sure want to delete?')" href="<?php echo base_url().'index.php/client/gm_delete/'.$client['clnId']?>" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="5">Client records not found
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>