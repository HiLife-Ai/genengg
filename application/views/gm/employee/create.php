<?php $this->load->view('admin/menu');?>
    <section class="home-section">
        <div class="text">Employee</div>
        <div class="add-text">ADD EMPLOYEE INFO</div>
        <div class="add-text-dtls">EMPLOYEE DETAILS</div>
        <form name="createEmployee" action="<?php echo base_url().'index.php/employee/create'?>" method="post">
            <div class="row table-1">
                <div class="col-md-3">
                    <label class="form-label" for="form-label">Employee ID</label>
                    <input class="form-control" type="text" name="empId" id="empId" value="" readonly>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="form-label">Employee Name</label>
                    <input class="form-control" type="text" name="empName"  id="empName" value="">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="form-label">Employee Email</label>
                    <input class="form-control" type="email" name="empMail"  id="empMail" value="">
                    <p class="content">Employee will login using this email.</p>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="form-label">Password</label>
                    <input class="form-control" type="password" name="empPwd" id="empPwd" value="">
                    <p class="content">Employee will login using this password.</p>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Date Of Birth</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="dob" id="dob" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Employee Phone</label>
                    <input class="form-control" type="text" name="empPhone"  id="empPhone" value="">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="form-label">Gender</label>
                    <select class="form-control" name="empGender" id="empGender">
                        <option value="">--</option>
                        <?php if (count($getGender)):?>
                            <?php foreach($getGender as $gender):?>
                            <option value=<?php echo $gender->gender;?>><?php echo $gender->gender;?></option>
                            <?php endforeach;?>
                        <?php else:?>
                        <?php endif?>
                    </select>
                </div>
            </div>
            <div class="row table-3">
                <div class="form-group address">
                    <label class="form-label col-md-12">Address</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="empAdd" id="empAdd" value="" rows="5" style="width: 635%;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-4">
                <div class="form-group address">
                    <label class="form-label col-md-12">Skills</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="empSkill" id="empSkill" value="" rows="1" style="width: 635%;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-2">
                <div class="col-md-3">
                    <label class="form-label" for="form-label">Designation</label>
                    <select class="form-control" name="empRole" id="empRole" style="height: 50%;">
                        <option value="">--</option>
                        <?php if (count($getRole)):?>
                            <?php foreach($getRole as $role):?>
                            <option value="<?php echo $role->role;?>"><?php echo $role->role;?></option>
                            <?php endforeach;?>
                        <?php else:?>
                        <?php endif?>
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="form-label">Joining Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="joinDate" id="joinDate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="form-label" for="form-label">End Date</label>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="date" name="endDate" id="endDate" value="" class="form-control mydatepicker" placeholder="mm/dd/yyyy"><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z" fill="currentColor"/><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z" fill="currentColor"/></svg>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="form-label">Year of Experience</label>
                    <input class="form-control" type="text" name="experience" id="experience" value="">
                </div>
            </div>
            <div class="row table-3">
                <div class="form-group address">
                    <label class="form-label col-md-12">Remarks</label>
                    <div class="col-md-12">
                        <textarea class="form-control" name="remark" id="remark" value="" rows="5" style="width: 635%;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row table-6">
                <div class="save-btn">
                    <button class="btn btn-block btn-success">Save</button>
                    <a href="<?php echo base_url().'index.php/employee/index'?>" class="btn-secondary btn">Cancel</a>
                </div>
            </div>
        </form>
    </section>