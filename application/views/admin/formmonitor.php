<?php
$rm = $namarm->nama_perumahan;
$n = $tipenokav->row();
$hj = $n->harga_jual;
if($this->uri->segment(2) == "edtmonitor"){
    $hasil = $mot->row();
    $mh = $this->uri->segment(4);
    $k = $this->uri->segment(4);
    $title = "Edit data monitorig dp";
    $form ="prosedtmonitor";
    $id = $hasil->id_monitoring;
    $nama = $hasil->nama;
    $nokav = $hasil->id_unit;
    $tipe = $hasil->rencana;
    if($tipe == "CHAS"){
        $tsel = "selected";
        $tseldua = "";
    }else{
        $tsel = "";
        $tseldua = "selected";
    }
    
    $harga = $hasil->harga_jual;
    $book = $hasil->booking_fee;
    $tgl = $hasil->tanggal_booking;
    $akad = $hasil->biaya_akad;
    if($akad == "PIHAK PERTAMA"){
        $akadsatu = "selected";
        $akaddua = "";
    }else{
        $akadsatu = "";
        $akaddua = "selected";
    }
    $pajak = $hasil->pajak_penjualan;
    if($pajak == "PIHAK PERTAMA"){
        $pjksatu = "selected";
        $pjkdua = "";
    }else{
        $pjksatu = "";
        $pjkdua = "selected";
    }
    $pekerjaan = $hasil->pekerjaan;
    if($pekerjaan == "PEGAWAI NEGERI"){
        $pegsatu = "selected";
        $pegdua = "";
        $pegtiga = "";
    }else if($pekerjaan == "PEGAWAI SWASTA"){
        $pegsatu = "";
        $pegdua = "selected";
        $pegtiga = "";
    }else{
        $pegsatu = "";
        $pegdua = "";
        $pegtiga = "selected";
    }
    $penambahan = $hasil->penambahan_bangunan;
    $nohp = $hasil->no_hp;
    $ket = $hasil->keterangan;
    $marketing = $hasil->nama_marketing;
}else{
    $mh = $this->uri->segment(3);
    $title = "Tambah data monitorig dp";
    $form ="prosaddmonitor";
    $k = $this->uri->segment(3);
    $id = "";
    $nama = "";
    $nokav = "";
    $tsel = "";
    $tseldua = "";
    $harga = "";
    $book = "";
    $tgl = "";
    $akadsatu = "";
    $akaddua = "";
    $pjksatu = "";
        $pjkdua = "";
    $pegsatu = "";
        $pegdua = "";
        $pegtiga = "";
    $penambahan = "";
    $nohp = "";
    $ket = "";
    $marketing = "";
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
                      <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home/monitoring/<?php echo $this->uri->segment(3); ?>" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>home/<?php echo $form; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="key" value="<?php echo $k; ?>">
                        <input type="hidden" name="perumahan" value="<?php echo $mh; ?>">
                      
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nokav" value="<?php echo $nama; ?>" name="nama" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                      
                        
                        
                      
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipe &amp; No Kav rumah<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="tipe" required="required">
                                            <option disabled selected> Pilih</option>
                                            <?php foreach($tipenokav->result() as $a){ ?>
                                            <option value="<?php echo $a->id_unit; ?>" <?php if($nokav == $a->id_unit){echo"selected";}else{echo"";} ?>><?php echo $a->tipe." - ".$a->kav; ?></option>
<?php } ?>
                                        </select>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rencana<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="rencana" required="required">
                                            <option disabled selected> CHAS / KPR</option>
                                            <option value="CHAS" <?php echo $tsel; ?>>CHAS</option>
                                            <option value="KPR" <?php echo $tseldua; ?>>KPR</option>
                                        </select>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama perumahan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <input type="text" id="rm" value="<?php echo $rm; ?>" name="" required="required" class="form-control col-md-7 col-xs-12" readonly placeholder="">
                        </div>
                      </div>
                        
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Booking Fee<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nominal" value="<?php echo $book; ?>" name="booking" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal booking<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="tgl" value="<?php echo $tgl; ?>" name="tgl" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Biaya akad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                         <select class="form-control" name="akad" required="required">
                                            <option disabled selected> PIHAK PERTAMA / PIHAK KEDUA</option>
                                            <option value="PIHAK PERTAMA" <?php echo $akadsatu; ?>>PIHAK PERTAMA</option>
                                            <option value="PIHAK KEDUA" <?php echo $akaddua; ?>>PIHAK KEDUA</option>
                                        </select>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pajak penjualan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="pajak" required="required">
                                            <option disabled selected> PIHAK PERTAMA / PIHAK KEDUA</option>
                                            <option value="PIHAK PERTAMA" <?php echo $pjksatu; ?>>PIHAK PERTAMA</option>
                                            <option value="PIHAK KEDUA" <?php echo $pjkdua; ?>>PIHAK KEDUA</option>
                                        </select>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pekerjaan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="pekerjaan" required="required">
                                            <option disabled selected> Pilih pekerjaan</option>
                                            <option value="PEGAWAI NEGERI" <?php echo $pegsatu; ?>>PEGAWAI NEGERI</option>
                                            <option value="PEGAWAI SWASTA" <?php echo $pegdua; ?>>PEGAWAI SWASTA</option>
                                            <option value="WIRAUSAHA" <?php echo $pegtiga; ?>>WIRAUSAHA</option>
                                        </select>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Penambahan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="penambahan" required><?php echo $penambahan; ?></textarea>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No hp<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nohp" value="<?php echo $nohp; ?>" name="nohp" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Keterangan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" required name="keterangan"><?php echo $ket; ?></textarea>
                        </div>
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama marketing<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="namamarketing" value="<?php echo $marketing; ?>" name="namamarketing" required="required" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <?php echo anchor('home/monitoring','Cancel',['class'=>'btn btn-danger']); ?>
						  <button class="btn btn-warning" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
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
<script type="text/javascript">
    /* Dengan Rupiah */
	var nominal = document.getElementById('nominal');
	nominal.addEventListener('keyup', function(e)
	{
		nominal.value = formatRupiah(this.value, 'Rp. ');
	});
	
	nominal.addEventListener('keydown', function(event)
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
        