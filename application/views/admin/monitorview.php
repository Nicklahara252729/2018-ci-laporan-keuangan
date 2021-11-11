<?php 
$hasil = $monitor->row();
$a = $unt->tipe." - ".$unt->kav;
$nama = $hasil->nama;

$tipe = $hasil->rencana;
$harga_jual = $hasil->harga_jual;
$booking = $hasil->booking_fee;
$tgl = $hasil->tanggal_booking;
$akad = $hasil->biaya_akad;
$pajak = $hasil->pajak_penjualan;
$pekerjaan = $hasil->pekerjaan;
$penambahan = $hasil->penambahan_bangunan;
$nohp = $hasil->no_hp;
$keterangan = $hasil->keterangan;
$nama_marketing = $hasil->nama_marketing;

$perumahan = $hasil->nama_perumahan;
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
                    <h2>Monitoring view<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home/monitoring/<?php echo $this->uri->segment(4); ?>" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
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
                          <tr>
                              <td style="width:200px;">Nama</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td ><?php echo $nama; ?></td>
                          </tr>
                          <tr>
                              <td>Tipe &amp; No Kav</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $a; ?></td>
                          </tr>
                          <tr>
                              <td>Rencana</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $tipe; ?></td>
                          </tr>
                          <tr>
                              <td>Perumahan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $perumahan; ?></td>
                          </tr>
                          <tr>
                              <td>Harga Jual</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo"Rp. ".number_format($harga_jual,0,',','.'); ?></td>
                          </tr>
                          <tr>
                              <td>DP</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo"Rp. ".number_format($booking,0,',','.'); ?></td>
                          </tr>
                          <tr>
                              <td>Tanggal DP</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $tgl; ?></td>
                          </tr>
                          <tr>
                              <td>Sisa Pembayaran</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo"Rp. ".number_format($harga_jual - $tcicil->totc - $booking,0,',','.'); ?></td>
                          </tr>
                          <tr>
                              <td>Biaya Akad</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $akad; ?></td>
                          </tr>
                          <tr>
                              <td>Pajak Penjualan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $pajak; ?></td>
                          </tr>
                          <tr>
                              <td>Pekerjaan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $pekerjaan; ?></td>
                          </tr>
                          <tr>
                              <td>Penambahan Bangunan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $penambahan; ?></td>
                          </tr>
                          <tr>
                              <td>No Hp</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $nohp; ?></td>
                          </tr>
                          <tr>
                              <td>Keterangan</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $keterangan; ?></td>
                          </tr>
                          
                          <tr>
                              <td>Nama Marketing</td>
                              <td style="width:50px;font-weight:bold;text-align:center;">:</td>
                              <td><?php echo $nama_marketing; ?></td>
                          </tr>
                      </tbody>
                      </table>
                  </div>
                </div>
              </div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail Cicilan<small></small></h2>
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
                                <th>NO</th>
                                <th>Tanggal</th>
                                <th>Saldo</th>
                            </tr>
                         </thead>
                         <tbody>
                            <?php $no=1; foreach($cicilan->result() as $d){ ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d->tanggal." - ".$d->bulan." - ".$d->tahun; ?></td>
                                    <td><?php echo"Rp.".number_format($d->saldo,0,',','.'); ?></td>
                                </tr>
                            <?php $no++; }?>
                            <tr>
                                <td colspan="2"><center>TOTAL</center></td>
                                <td><?php echo"Rp.".number_format($tcicil->totc,0,',','.'); ?></td>
                            </tr>
                         </tbody>
                      </table>
                  </div>
                </div>
              </div>

</div>