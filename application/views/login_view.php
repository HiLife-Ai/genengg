<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gen Engineering</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
</head>
<body>
    <div class="wrapper">
        <div class="container id="login" style="width: 60%;">
            <div class="col-left">
                <div class="login-text">
                    <h2>Welcome Gen</h2>
                    <h2>Engineering</h2>
                </div>
            </div>
            <div class="col-right">
                <div class="login-form">
                    <h2>Login</h2>
                    <form method="POST" action="<?php echo base_url(); ?>index.php/login/auth">
                        <p>
                            <label>Email ID<span>*</span></label>
                            <input class="form-control" placeholder="Email" type="email" name="empMail" id="empMail" required>
                        </p>
                        <p>
                            <label>Password<span>*</span></label>
                            <input class="form-control" placeholder="Password" type="password" name="empPwd" id="empPwd" required>
                        </p>
                        <p>
                            <input type="submit" value="Login" />
                        </p>
                        <!-- <?php
                            if($this->session->flashdata('error')){
                                ?>
                                <div class="alert alert-danger text-center" style="margin-top:20px; color: red;">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                                <?php
                            }
                        ?> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>