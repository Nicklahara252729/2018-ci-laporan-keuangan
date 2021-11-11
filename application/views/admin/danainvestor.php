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
                    <h2>Dana yang ditransfer dari investor<small><?php echo $hell; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                         <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilih perumahan <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                        <?php $no=1; foreach($per->result() as $rmah){ ?>
                      <li style="text-transform:uppercase;"><a href="<?php echo base_url(); ?>home/danainvestor/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
                        <?php $no++; } ?>
                    </ul>
                    </div>
                      </li>
                      <?php if(isset($k)){ ?>
                        <li >
                        <a href="<?php echo base_url(); ?>home/adddanainvestor/<?php echo $this->uri->segment(3); ?>" class="btn btn-success" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data</a>
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
                        <tr style="background:#d71149;color:white;">
                          <th >No</th>
                          <th >Nama</th>
                          <th >Jumlah</th>
                          <th >Tanggal</th>
                          <th >Keterangan</th>
                          <th ><center>Tools</center></th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($view as $dt){ ?>
                            <tr>
                                <td style="width:10px;"><center><?php echo $no; ?></center></td>
                                <td style="text-transform:capitalize;"><?php echo $dt->nama; ?></td>
                                <td><?php echo"Rp ".number_format($dt->jumlah,0,',','.'); ?></td>
                                <td><?php echo $dt->tgl; ?></td>
                                <td><?php echo $dt->keterangan; ?></td>
                                <td style="width:100px;"><center>
                                    <a href="<?php echo base_url(); ?>home/viewdanainvestor/<?php echo $this->uri->segment(3); ?>/<?php echo $dt->id_daftarinvestor; ?>" class="btn btn-sm btn-primary">View detail</a>
                                    </center>
                                </td>
                            </tr>
                          <?php $no++; } ?>
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
