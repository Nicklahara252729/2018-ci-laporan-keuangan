<div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">
          <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
            <div class="slide-content bg-1">
            </div>
          </div>
          <div class="col-12 col-md-8 h-100 bg-white">
            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
              <div class="nav-get-started" >
                <p>Forgot password ?</p>
                <a class="btn get-started-btn" href="forgot_password" style="border:solid 1px gray;color:gray;">RESET HERE</a>
              </div>
              <?php echo form_open("auth/login");?>
                <p><img src="<?php echo base_url(); ?>assets/img/small.png"></p>
                <h3 class="mr-auto">Hello! let's get started</h3>
                  <p class="mb-5 mr-auto"><?php echo lang('login_subheading');?></p>
                  <p style="color:red;"><?php echo $message;?></p>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" style="border:solid 1px gray;color:gray;"><i class="mdi mdi-account-outline"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username / email" name="identity" style="border:solid 1px gray;color:gray;">
                  </div>
                </div>
                <div class="form-group" >
                  <div class="input-group" >
                    <div class="input-group-prepend" >
                      <span class="input-group-text" style="border:solid 1px gray;color:gray;"><i class="mdi mdi-lock-outline"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password" style="border:solid 1px gray;color:gray;">
                  </div>
                </div>
                <div class="form-group">
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
                              Remember Me
                            </label>
                          </div>
                        </div>
                    
                </div>
                <div class="form-group">
                  <button class="btn btn-dark pull-right" type="submit">SIGN IN</button>
                </div>
                <div class="wrapper mt-5 text-gray">
                  <p class="footer-text">Copyright © 2018. All rights reserved develop by <a href="#">www.cowala.id</a></p>
                  <ul class="auth-footer text-gray">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                  </ul>
                </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>