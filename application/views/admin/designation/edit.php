<?php $this->load->view('admin/menu');?>

    <section class="home-section">
        <div class="text">Designation</div>
        <div class="add-text">ADD DESIGNATION</div>
        <form name="createDesignation" action="<?php echo base_url().'index.php/designation/edit/'.$designation['id']?>?>" method="post">
            <div class="row table-1">
                <div class="col-md-12">
                    <label class="form-label" for="form-label">Designation ID</label>
                    <input class="form-control" type="text" name="id" id="id" value="<?php echo set_value('empId',$designation['id']);?>" readonly>
                </div>
                <div class="col-md-12">
                    <label class="form-label" for="form-label">Designation Name</label>
                    <input class="form-control" type="text" name="role" id="role" value="<?php echo set_value('empId',$designation['role']);?>">
                </div>
            </div>
            <div class="row table-6">
                <div class="save-btn">
                    <button class="btn btn-block btn-success">Save</button>
                    <a href="<?php echo base_url().'index.php/designation/index'?>" class="btn-secondary btn" style="margin-bottom: 22.5%;">Cancel</a>
                </div>
            </div>
        </form>
    </section>