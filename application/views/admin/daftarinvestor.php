<?php 
$kunci = $this->uri->segment(3);
if(isset($kunci)){
                    
if($this->uri->segment(2) == "edtdaftarinvestor"){
    $title = "Edit data trasnfer dana owner";
    $form = "uptdaftarinvestor";
}else{
    $title = "Tambah data transfer dana owner";
    $form = "savedaftarinvestor";
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
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>home/<?php echo $form; ?>">   
                        
                        <input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">
                        <input type="hidden" name="key" value="<?php echo $this->uri->segment(3); ?>">
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama investor  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="nama" value="<?php echo $rowing->nama; ?>" name="nama" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                                              
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button class="btn btn-warning" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success"  id="submit">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
<?php 
}
$k = $this->uri->segment(3);
if(isset($k)){
    $hell = $title->nama_perumahan;
}else{
    $hell = "";
}
?>
<style>
    td{
        font-size: 12px;
    }
</style>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daftar investor<small><?php echo $hell; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                         <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilih perumahan <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                        <?php $no=1; foreach($per->result() as $rmah){ ?>
                      <li style="text-transform:uppercase;"><a href="<?php echo base_url(); ?>home/daftarinvestor/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
                        <?php $no++; } ?>
                    </ul>
                    </div>
                      </li>                      
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    <?php 
                    $kunci = $this->uri->segment(3);
                    if(isset($kunci)){
                    ?>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr style="background:#d71149;color:white;">
                          <th >No</th>
                          <th >Nama</th>
                          <th >Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($view as $dt){ ?>
                            <tr>
                                <td style="width:10px;"><center><?php echo $no; ?></center></td>
                                <td style="text-transform:capitalize;"><?php echo $dt->nama; ?></td>
                                <td style="width:150px;"><center>
                                    <a href="<?php echo base_url(); ?>home/edtdaftarinvestor/<?php echo $this->uri->segment(3); ?>/<?php echo $dt->id_daftarinvestor; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    
                                    <a href="<?php echo base_url(); ?>home/deldaftarinvestor/<?php echo $dt->id_daftarinvestor; ?>/<?php echo $this->uri->segment(3); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">Hapus</a>
                                    </center>
                                </td>
                            </tr>
                          <?php $no++; } ?>
                      </tbody>
                    </table>
                      
                      </div>
                  </div>
                    <?php }else{ ?>
                  <div class="x_title" style="background:#D71149;color:white;text-align:center;padding-top:20px;font-size:20px;padding-bottom:10px;">
                    Silahkan pilih perumahan terlebih dahulu
                  </div>
                    <?php } ?>
                </div>
              </div>
