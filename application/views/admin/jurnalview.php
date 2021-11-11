<?php 
$i = $jurnal->row();
$k = $kategori->row();
$l = $rumah->row();
$tanggal = $i->tanggal;
$uraian = $i->uraian;
$jenis = $i->jenis;
$saldo = $i->saldo;
$keterangan = $i->keterangan;
if($i->id_kategori == 0){
    $kategori ="";
}else{
    $kategori = $k->kategori;
}

$perumahan = $l->nama_perumahan;
?>
<style>
    td{
        font-size: 12px;
    }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monitoring view<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home/jurnal/<?php echo $this->uri->segment(4); ?>" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
                      </li>
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
                      <tbody>
                          
                      </tbody>
                    </table>
                      
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                      <tbody>
                          <tr>
                              <td style="width:200px;">Tanggal</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td ><?php echo $tanggal; ?></td>
                          </tr>
                          <tr>
                              <td>Uraian</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $uraian; ?></td>
                          </tr>
                          <tr>
                              <td>Jenis</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $jenis; ?></td>
                          </tr>
                          
                          <tr>
                              <td>Saldo</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo"Rp. ".number_format($saldo,0,',','.'); ?></td>
                          </tr>
                          <tr>
                              <td>Keterangan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $keterangan; ?></td>
                          </tr>
                          <tr>
                              <td>Kategori</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $kategori; ?></td>
                          </tr>
                          <tr>
                              <td>Perumahan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $perumahan;?></td>
                          </tr>
                          
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
