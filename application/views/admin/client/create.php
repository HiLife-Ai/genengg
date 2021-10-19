<?php $this->load->view('admin/menu');?>

<section class="home-section">
        <div class="text">Client</div>
        <div class="add-text">ADD CLIENT INFO</div>
        <div class="add-text-dtls">CLIENT DETAILS</div>
        <div class="line"></div>
        
        <form name="createClient" action="<?php echo base_url().'index.php/client/create'?>" method="post">
            <div class="row table-1">
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Client ID</label>
                    <input class="form-control" type="text" name="clnId" id="clnId" value="<?php echo $clnId?>" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Client Name</label>
                    <input class="form-control" type="text" name="clnName"  id="clnName" value="">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Client Email</label>
                    <input class="form-control" type="email" name="clnMail"  id="clnMail" value="">
                </div>
            </div>
            <div class="row table-2">
            <div class="col-md-4">
                    <label class="form-label" for="form-label">Consultant Name</label>
                    <input class="form-control" type="text" name="consName" id="consName" value="">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Contact Person Name</label>
                    <input class="form-control" type="text" name="contName"  id="contName" value="">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Contact Person Number</label>
                    <input class="form-control" type="text" name="contPhone"  id="contPhone" value="">
                </div>
            </div>
            <div class="row table-3">
                <div class="form-group address">
                    <label class="form-label col-md-12">Address</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="clnAdd" id="clnAdd" value="" rows="5" cols="300"></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-5">
                <div class="col-md-4">
                <div class="form-group">
                    <label class="form-label" for="form-label">First Order Date</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="date" name="orderDate" id="orderDate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                    </div>
                </div>
                </div>
                <!--/span-->
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Rating</label>
                    <input class="form-control" type="number" name="clnRating"  id="clnRating" value="">
                </div>
                <div class="col-md-4 ">
                    <div class="form-group">
                        <label class="form-label required">Satus</label>
                        <select name="clnStatus" id="clnStatus" style="height: 100%;" class="form-control" value="">
                            <option value="">--</option>
                            <option value="Active">Active</option>
                            <option value="Closed">Closed</option>
                        </select>
                        <?php echo form_error('status');?>
                    </div>
                </div>
            </div>
            <div class="row table-4">
                <div class="col-md-6">
                    <div class="txt-area">
                        <label for="exampleFormControlTextarea1" class="form-label">Remark</label>
                        <textarea class="form-control" name="clnremark" id="clnremark" value="" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="txt-area">
                        <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
                        <textarea class="form-control" name="clnnote" id="clnnote" value="" rows="5"></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-6">
                <div class="save-btn">
                    <button class="btn btn-block btn-success">Save</button>
                    <a href="<?php echo base_url().'index.php/client/index'?>" class="btn-secondary btn">Cancel</a>
                </div>
            </div>
        </form>
    </section>