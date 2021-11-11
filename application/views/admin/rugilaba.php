<?php 
$k = $this->uri->segment(3);
if(isset($k)){
    $hell = $title->nama_perumahan;
}else{
    $hell = "";
}
?>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rugi laba<small>Proyeksi <?php echo $hell; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                         <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilih perumahan <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                        <?php $no=1; foreach($per->result() as $rmah){ ?>
                      <li style="text-transform:uppercase;"><a href="<?php echo base_url(); ?>home/rugilaba/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
                        <?php $no++; } ?>
                    </ul>
                    </div>
                      </li>
                      <?php if(isset($k)){ ?>
                        <li >
                        <a href="<?php echo base_url(); ?>home/addlabarugi/<?php echo $this->uri->segment(3); ?>" class="btn btn-success" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data</a>
                      </li>
                      <?php } ?>
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
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Tanggal diperbaharui</th>
                          <th rowspan="2">Uraian</th>
                          <th colspan="2"><center>Jenis</center></th>
                          <th rowspan="2">Tools</th>
                          </tr>
                          <tr>
                              <td>PENERIMAAN</td>
                              <td>PENGELUARAN</td>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($rugilaba->result() as $jur){ ?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $jur->tanggal; ?></td>
                              <td><?php echo $jur->uraian; ?></td>
                              <td><?php $masuk = $jur->jenis; if($masuk == "PENERIMAAN"){echo"Rp.".number_format($jur->jumlah,0,',','.');}else{echo"";} ?></td>
                              <td><?php $masuk = $jur->jenis; if($masuk == "PENGELUARAN"){echo"Rp.".number_format($jur->jumlah,0,',','.');}else{echo"";} ?></td>
                              <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Tools <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                      <li><a href="<?php echo base_url(); ?>home/edtlabarugi/<?php echo $jur->id_rugilaba; ?>/<?php echo $this->uri->segment(3); ?>">Edit</a>
                                      </li>
                                      <li onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><a href="<?php echo base_url(); ?>home/dellabarugi/<?php echo $jur->id_rugilaba; ?>/<?php echo $this->uri->segment(3); ?>"  >Hapus</a>
                                        </li>
                                    </ul>
                                    </div>
                              </td>
                          </tr>
                          <?php $no++; } ?>
                          
                      </tbody>
                    </table>
                      
                      
                      
                  </div>
                </div>
              </div>

<?php                               $luar = $keluar->row();
                                    
                                    $hj = $harjual->row();
                                    $bk = $bookfee->row();
                                    $real = $tcicil->totalcicil;
                                    $utang = $hj->totaljual - ($tcicil->totalcicil + $bk->totalbook); ?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rugi laba<small>Total </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                    
                    <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    
                      
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2"><center>Total</center></th>
                          <th>Penerimaan</th>
                          <th>Pengeluaran</th>
                          <th>Laba</th>
                          </tr>
                          <tr>
                              <td><h4><b><?php  $mas = $getin->row(); echo"Rp. ".number_format($mas->totmasuk + $real + $utang,0,',','.'); ?></b></h4></td>
                              <td><h4><b><?php  $out = $getout->row(); echo"Rp. ".number_format($out->totkeluar + $luar->totkeluar,0,',','.'); ?></b></h4></td>
                              <td><h4><b><?php  $smas = $getin->row(); $sout = $getout->row(); echo"Rp. ".number_format(($mas->totmasuk + $real + $utang)-($out->totkeluar + $luar->totkeluar),0,',','.'); ?></b></h4></td>                              
                          </tr>
                      </thead>
                      <tbody>
                          
                      </tbody>
                    </table>
                      
                  </div>    
                    
                  
                </div>
              </div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rugi laba<small>Realisasi dan piutang </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2">No</th>
                          
                          <th rowspan="2">Uraian</th>
                          <th colspan="2"><center>Jenis</center></th>
                          
                          </tr>
                          <tr>
                              <td>PENERIMAAN</td>
                              <td>PENGELUARAN</td>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>1</td>
                              <td>REALISASI</td>
                              <td>
                                  <?php 
                                    
                                  echo"Rp. ".number_format($tcicil->totalcicil,0,',','.'); ?>
                              </td>
                              <td><?php   echo"Rp. ".number_format($luar->totkeluar,0,',','.'); ?></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>PIUTANG</td>
                              <td>
                                  <?php 
                                  echo"Rp. ".number_format(($hj->totaljual - ($tcicil->totalcicil + $bk->totalbook)),0,',','.'); ?>
                              </td>
                              <td></td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td>PROYEKSI PENJUALAN SISA UNIT</td>
                              <td>
                                  <?php 
                                  echo"Rp. ".number_format($not->thj,0,',','.'); ?>
                              </td>
                              <td></td>
                          </tr>
                      </tbody>
                    </table>
                      
                      
                      
                  </div>
                     <?php }else{ ?>
                  <div class="x_title" style="background:#D71149;color:white;text-align:center;padding-top:20px;font-size:20px;padding-bottom:10px;">
                    Silahkan pilih perumahan terlebih dahulu
                  </div>
                    <?php } ?>
                </div>
</div>
    </div>
