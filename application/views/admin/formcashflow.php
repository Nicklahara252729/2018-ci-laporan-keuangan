<?php
if($this->uri->segment(2) == "edtcashflow"){
    $hasil = $edtcashflow->row();
    $id = $hasil->id_cashflow;
    $uraian = $hasil->uraian;
    $saldo = $hasil->jumlah;
    $form = "prosedtcashflow";
    $title = "Edit data cashflow";
}else{
    $id = "";
    $uraian = "";
    $saldo = "";
     $form = "prosaddcashflow";
    $title = "Tambah data cashflow";
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
                      <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home/cash" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>home/<?php echo $form; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Uraian <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="uraian" value="<?php echo $uraian; ?>" name="uraian" required="required" class="form-control col-md-7 col-xs-12" placeholder="Cth : AULIA (MODAL DARI PROYEK JL. MESJID)">
                        </div>
                      </div>
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="saldo" value="<?php echo $saldo; ?>" name="saldo" required="required" class="form-control col-md-7 col-xs-12" placeholder="Rp .">
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?php echo anchor('home/cash','Cancel',['class'=>'btn btn-danger']); ?>
						  <button class="btn btn-warning" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

        