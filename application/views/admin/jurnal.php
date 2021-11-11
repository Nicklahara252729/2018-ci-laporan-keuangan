<?php 
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
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jurnal<small><?php echo $hell; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                         <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilih perumahan <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                        <?php $no=1; foreach($per->result() as $rmah){ ?>
                      <li><a href="<?php echo base_url(); ?>home/jurnal/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
                        <?php $no++; } ?>
                    </ul>
                    </div>
                      </li>
                        <li >
                        <a href="<?php echo base_url(); ?>home/addjurnal/<?php echo $this->uri->segment(3); ?>/pengeluaran" class="btn btn-warning" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data Pengeluaran</a>
                      </li>
                        
                        <li >
                        <a href="<?php echo base_url(); ?>home/addjurnal/<?php echo $this->uri->segment(3); ?>" class="btn btn-success" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data Pemasukan</a>
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
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Tanggal</th>
                          <th rowspan="2">Uraian</th>
                          <th rowspan="2">Jenis</th>
                          
                          <th colspan="2"><center>Status</center></th>
                          <th  rowspan="2">Saldo</th>
                          <th rowspan="2">Tools</th>
                          </tr>
                          <tr>
                              <th>Masuk</th>
                              <th>Keluar</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($jurnal->result() as $jur){ ?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $jur->tanggal." - ".$jur->bulan." - ".$jur->tahun; ?></td>
                              <td><?php echo $jur->uraian; ?></td>
                              <td><?php echo $jur->jenis; ?></td>
                              
                              <td><?php $masuk = $jur->status; if($masuk == "MASUK"){echo"Rp.".number_format($jur->saldo,0,',','.');}else{echo"";} ?></td>
                              <td><?php $masuk = $jur->status; if($masuk == "KELUAR"){echo"Rp.".number_format($jur->saldo,0,',','.');}else{echo"";} ?></td>
                              <td style="text-align:right;"></td>
                              <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Tools <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                      <li><a href="<?php echo base_url(); ?>home/edtjurnal/<?php echo $jur->id_jurnal."/".$this->uri->segment(3); ?>">Edit</a>
                                      </li>
                                        <li><a href="<?php echo base_url(); ?>home/viewjurnal/<?php echo $jur->id_jurnal."/".$this->uri->segment(3); ?>">Detail</a>
                                      </li>
                                      <li onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><a href="<?php echo base_url(); ?>home/deljurnal/<?php echo $jur->id_jurnal."/".$this->uri->segment(3); ?>"  >Hapus</a>
                                        </li>
                                    </ul>
                                    </div>
                              </td>
                          </tr>
                          <?php $no++; } ?>
                      </tbody>
                    </table>
                      
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2"><center>Total</center></th>
                          <th>Masuk</th>
                          <th>Keluar</th>
                          <th>Saldo</th>
                          </tr>
                          <tr>
                              <td><h4><b><?php  $mas = $getin->row(); echo"Rp. ".number_format($mas->totmasuk,0,',','.'); ?></b></h4></td>
                              <td><h4><b><?php  $out = $getout->row(); echo"Rp. ".number_format($out->totkeluar,0,',','.'); ?></b></h4></td>
                              <td><h4><b><?php  $smas = $getin->row(); $sout = $getout->row(); echo"Rp. ".number_format(($smas->totmasuk - $sout->totkeluar),0,',','.'); ?></b></h4></td>                              
                          </tr>
                      </thead>
                      <tbody>
                          
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
