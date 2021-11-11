<?php
if($this->uri->segment(2)=='changename'){
    $form = "uptname";
    $txt = 'Ubah nama';
    $name = 'nama';
    $type = 'text';
}elseif($this->uri->segment(2)=='changuser'){
    $form = "uptusername";
    $txt = 'Username baru';
    $name = 'username';
    $type = 'text';
}else{
    $form = "uptpass";
    $txt  = 'Password baru';
    $name = 'password';
    $type = 'password';
}
?>
<!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $title; ?></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>home/<?php echo $form ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <?php echo $txt; ?> <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="<?php echo $type; ?>" id="username" name="<?php echo $name; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                          </div>                          
                      </div>
                        
                      
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?php echo anchor('home/perumahan','Cancel',['class'=>'btn btn-danger']); ?>
						  <button class="btn btn-warning" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>