<?php
if($this->uri->segment(2) == "edtdanaop"){
    $title = "Edit data transfer dana operaional";
    $form = "uptdanaop";
}else{
    $title = "Tambah data transfer dana operasional";
    $form = "savedanaop";
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
                      <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home/ftoprasional/<?php echo $this->uri->segment(3); ?>" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>home/<?php echo $form; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Uraian  <span class="required">*</span>
                        </label>
                        <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">
                        <input type="hidden" name="key" value="<?php echo $this->uri->segment(3); ?>">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" value="<?php echo $view->nama; ?>" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                                            
                        
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah<span class="required">*</span>
                            <span class="text-danger">diisi 0 jika tidak ada</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nominalSaldo" value="<?php echo $view->jumlah; ?>" name="saldo" required="required" class="form-control col-md-7 col-xs-12" placeholder="Rp .">
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="tgl" value="<?php echo $view->tgl; ?>" name="tgl" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                        
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="keterangan" class="form-control" required><?php echo $view->keterangan; ?></textarea>
                          
                        </div>
                      </div>
                        
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?php echo anchor('home/ftoprasional/'.$kunci,'Cancel',['class'=>'btn btn-danger']); ?>
						  <button class="btn btn-warning" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success"  id="submit">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
<script type="text/javascript">
    /* Dengan Rupiah */
	var nominalSaldo = document.getElementById('nominalSaldo');
	nominalSaldo.addEventListener('keyup', function(e)
	{
		nominalSaldo.value = formatRupiah(this.value, 'Rp. ');
	});
	
	nominalSaldo.addEventListener('keydown', function(event)
	{
		limitCharacter(event);
	});
	
	/* Fungsi */
	function formatRupiah(bilangan, prefix)
	{
		var number_string = bilangan.replace(/[^,\d]/g, '').toString(),
			split	= number_string.split(','),
			sisa 	= split[0].length % 3,
			rupiah 	= split[0].substr(0, sisa),
			ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
			
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}
		
		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
	}
	
	function limitCharacter(event)
	{
		key = event.which || event.keyCode;
		if ( key != 188 // Comma
			 && key != 8 // Backspace
			 && key != 17 && key != 86 & key != 67 // Ctrl c, ctrl v
			 && (key < 48 || key > 57) // Non digit
			 // Dan masih banyak lagi seperti tombol del, panah kiri dan kanan, tombol tab, dll
			) 
		{
			event.preventDefault();
			return false;
		}
	}
</script>