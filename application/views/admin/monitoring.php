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
                    <h2>Monitoring DP<small><?php echo $hell; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                         <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilih perumahan <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                        <?php $no=1; foreach($per->result() as $rmah){ ?>
                      <li><a href="<?php echo base_url(); ?>home/monitoring/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
                        <?php $no++; } ?>
                    </ul>
                    </div>
                      </li>
                        <li >
                        <a href="<?php echo base_url(); ?>home/addmonitor/<?php echo $this->uri->segment(3); ?>" class="btn btn-success" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data</a>
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
                          <th rowspan="2">Nama</th>
                          <th  rowspan="2">Harga jual</th>
                          <th  rowspan="2">DP</th>
                          <th rowspan="2">Tanggal Booking</th>
                          <th colspan="4"><center>Cicilan DP</center></th>
                          <th rowspan="2">Total</th>
                          <th rowspan="2">Sisa pembayaran</th>
                          <th rowspan="2">Tools</th>
                          </tr>
                          <tr>
                              <th>Cicilan I</th>
                              <th>Cicilan II</th>
                              <th>Cicilan III</th>
                              <th>Cicilan IV</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($monitor->result() as $moni){ ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $moni->nama; ?></td>
                                <td><?php echo"Rp. ".number_format($moni->harga_jual,0,',','.'); ?></td>
                                <td><?php echo"Rp. ".number_format($moni->booking_fee,0,',','.'); ?></td>
                                <td><?php echo $moni->tanggal_booking; ?></td>
                                <td><?php echo"Rp. ".number_format($moni->nilai,0,',','.')." &nbsp; "; 
                                    if($moni->nilai==0){
                                    echo anchor('home/tambahcicilan/'.$moni->id_monitoring.'/cicilan_satu/'.$kunci,'<span class="glyphicon glyphicon-plus"></span>',['class'=>'btn btn-xs btn-success']);}else{
                                    echo anchor('home/editcicilan/'.$moni->id_monitoring.'/cicilan_satu/'.$kunci,'<span class="glyphicon glyphicon-pencil"></span>',['class'=>'btn btn-xs btn-warning']);
                                    }
                                    ?></td>
                                <td><?php echo"Rp. ".number_format($moni->nilai_dua,0,',','.')." &nbsp; ";
                                    if($moni->nilai_dua==0){
                                    echo anchor('home/tambahcicilan/'.$moni->id_monitoring.'/cicilan_dua/'.$kunci,'<span class="glyphicon glyphicon-plus"></span>',['class'=>'btn btn-xs btn-success']);}else{
                                    echo anchor('home/editcicilan/'.$moni->id_monitoring.'/cicilan_dua/'.$kunci,'<span class="glyphicon glyphicon-pencil"></span>',['class'=>'btn btn-xs btn-warning']);
                                    }
                                    ?> </td>
                                <td><?php echo"Rp. ".number_format($moni->nilai_tiga,0,',','.')." &nbsp; "; 
                                    if($moni->nilai_tiga==0){
                                    echo anchor('home/tambahcicilan/'.$moni->id_monitoring.'/cicilan_tiga/'.$kunci,'<span class="glyphicon glyphicon-plus"></span>',['class'=>'btn btn-xs btn-success']);}else{
                                    echo anchor('home/editcicilan/'.$moni->id_monitoring.'/cicilan_tiga/'.$kunci,'<span class="glyphicon glyphicon-pencil"></span>',['class'=>'btn btn-xs btn-warning']);
                                    }
                                    ?></td>
                                <td><?php echo"Rp. ".number_format($moni->nilai_empat,0,',','.')." &nbsp; "; 
                                    if($moni->nilai_empat==0){
                                    echo anchor('home/tambahcicilan/'.$moni->id_monitoring.'/cicilan_empat/'.$kunci,'<span class="glyphicon glyphicon-plus"></span>',['class'=>'btn btn-xs btn-success']);}else{
                                    echo anchor('home/editcicilan/'.$moni->id_monitoring.'/cicilan_empat/'.$kunci,'<span class="glyphicon glyphicon-pencil"></span>',['class'=>'btn btn-xs btn-warning']);
                                    }
                                    ?></td>
                                <td>
                                    <?php 
                                        echo"Rp. ".number_format($total  = $moni->booking_fee + $moni->nilai + $moni->nilai_dua + $moni->nilai_tiga + $moni->nilai_empat,0,',','.');
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $hargajual = $moni->harga_jual;
                                        $total  = $moni->booking_fee + $moni->nilai + $moni->nilai_dua + $moni->nilai_tiga + $moni->nilai_empat;
                                        echo"Rp. ".number_format($sisa = $hargajual - $total,0,',','.');
                                    ?>
                                </td>
                                <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Tools <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                      <li><a href="<?php echo base_url(); ?>home/edtmonitor/<?php echo $moni->id_monitoring."/".$this->uri->segment(3); ?>">Edit</a>
                                      </li>
                                        <li><a href="<?php echo base_url(); ?>home/monitorview/<?php echo $moni->id_monitoring."/".$this->uri->segment(3); ?>">View</a>
                                      </li>
                                      <li onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><a href="<?php echo base_url(); ?>home/delmonitor/<?php echo $moni->id_monitoring."/".$this->uri->segment(3); ?>"  >Hapus</a>
                                        </li>
                                    </ul>
                                    </div>
                              </td>
                            </tr>
                        <?php  $no++;  } ?>
                      </tbody>
                    </table>
                      
                      <div class="x_content">
                      <p class="text-muted font-13 m-b-30">BELUM TERJUAL</p>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>No</th>
                          <th>Tipe</th>
                          <th>No KAV</th>
                          <th>Harga jual</th>
                          </tr>
                          <?php $no=1; foreach($blm->result() as $nt){?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $nt->tipe;?></td>
                              <td><?php echo $nt->kav;?></td>
                              <td><?php echo"Rp. ".number_format($nt->harga_jual,0,',','.');?></td>
                          </tr>
                        <?php $no++; }?>
                      </thead>
                    </table>
                      </div>
                      
                      <div class="x_content">
                          <p class="text-muted font-13 m-b-30">TOTAL</p>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2"><center>Total</center></th>
                          <th>Harga jual</th>
                          <th>Booking fee</th>
                          <th>Cicilan DP 1</th>
                          <th>Cicilan DP 2</th>
                          <th>Cicilan DP 3</th>
                          <th>Cicilan DP 4</th>
                          <th>Total cicilan</th>
                          <th>Sisa pembayaran</th>
                          <th>Belum terjual</th>
                          </tr>
                          <tr>
                              <td><?php $hj = $harjual->row(); echo"Rp. ".number_format($hj->totaljual,0,',','.'); ?></td>
                              <td><?php $bk = $bookfee->row(); echo"Rp. ".number_format($bk->totalbook,0,',','.'); ?></td>
                              <td><?php $cs = $csatu->row(); echo"Rp. ".number_format($cs->totalcsatu,0,',','.'); ?></td>
                              <td><?php $cd = $cdua->row(); echo"Rp. ".number_format($cd->totalcdua,0,',','.'); ?></td>
                              <td><?php $ct = $ctiga->row(); echo"Rp. ".number_format($ct->totalctiga,0,',','.'); ?></td>
                              <td><?php $ce = $cempat->row(); echo"Rp. ".number_format($ce->totalcempat,0,',','.'); ?></td>
                              <td><?php echo"Rp. ".number_format(($cs->totalcsatu + $cd->totalcdua + $ct->totalctiga +$ce->totalcempat),0,',','.'); ?></td>
                              <td><?php echo"Rp. ".number_format(($hj->totaljual - ($cs->totalcsatu + $cd->totalcdua + $ct->totalctiga +$ce->totalcempat + $bk->totalbook)),0,',','.'); ?></td>
                              <td><?php echo"Rp. ".number_format($not->thj,0,',','.'); ?></td>
                          </tr>
                      </thead>
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
