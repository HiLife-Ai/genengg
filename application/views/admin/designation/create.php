


<?php $this->load->view('admin/menu');?>
    <section class="home-section">
        <div class="text">Designation</div>
        <div class="add-text">ADD DESIGNATION</div>
        <form name="createEmployee" action="<?php echo base_url().'index.php/designation/create'?>" method="post">
            <div class="row table-1">
                <div class="col-md-12">
                    <label class="form-label" for="form-label">Designation ID</label>
                    <input class="form-control" type="text" name="id" id="id" value="<?php echo $roleId?>" readonly>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="form-label">Designation Name</label>
                    <input class="form-control" type="text" name="role" id="role" value="">
                </div>
            </div>
            <div class="row table-6">
                <div class="save-btn" style="position: relative;">
                    <button class="btn btn-block btn-success">Save</button>
                    <a href="<?php echo base_url().'index.php/designation/index'?>" class="btn-secondary btn" style="bottom:0px !important">Cancel</a>
                </div>
            </div>
        </form>
    </section>