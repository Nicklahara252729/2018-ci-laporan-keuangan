
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-dollar"></i> Pemasukan</span>
              <div class="count" style="font-size:20px;"><?php  $mas = $pemasukkan->row(); echo"Rp. ".number_format($mas->totmasuk,0,',','.'); ?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-dollar"></i> Pengeluaran</span>
              <div class="count" style="font-size:20px;"><?php  $mas = $pengeluaran->row(); echo"Rp. ".number_format($mas->totkeluar,0,',','.'); ?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-dollar"></i> Saldo</span>
              <div class="count green" style="font-size:20px;"><?php  $smas = $pemasukkan->row(); $sout = $pengeluaran->row(); echo"Rp. ".number_format(($smas->totmasuk - $sout->totkeluar),0,',','.'); ?></div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-dollar"></i> Laba</span>
              <div class="count" style="font-size:20px;"><?php  $smas = $getin->row(); $sout = $getout->row(); echo"Rp. ".number_format(($smas->totmasuk - $sout->totkeluar),0,',','.'); ?></div>
            </div>
            
          </div>
          <!-- /top tiles -->

         


          <div class="row">
            <style>
    td{
        font-size: 12px;
    }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Monitoring DP<small></small></h2>
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
                          <th rowspan="2">Nama</th>
                          <th  rowspan="2">Harga jual</th>
                          <th  rowspan="2">DP</th>
                          <th rowspan="2">Tanggal Booking</th>
                          <th colspan="4"><center>Cicilan DP</center></th>
                          <th rowspan="2">Total</th>
                          <th rowspan="2">Sisa pembayaran</th>
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
                                <td><?php echo"Rp. ".number_format($moni->cicilan_satu,0,',','.')." &nbsp; "; ?></td>
                                <td><?php echo"Rp. ".number_format($moni->cicilan_dua,0,',','.')." &nbsp; ";?> </td>
                                <td><?php echo"Rp. ".number_format($moni->cicilan_tiga,0,',','.')." &nbsp; "; ?></td>
                                <td><?php echo"Rp. ".number_format($moni->cicilan_empat,0,',','.')." &nbsp; "; ?></td>
                                <td>
                                    <?php 
                                        echo"Rp. ".number_format($total  = $moni->booking_fee + $moni->cicilan_satu + $moni->cicilan_dua + $moni->cicilan_tiga + $moni->cicilan_empat,0,',','.');
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        $hargajual = $moni->harga_jual;
                                        $total  = $moni->booking_fee + $moni->cicilan_satu + $moni->cicilan_dua + $moni->cicilan_tiga + $moni->cicilan_empat;
                                        echo"Rp. ".number_format($sisa = $hargajual - $total,0,',','.');
                                    ?>
                                </td>
                                
                            </tr>
                        <?php  $no++;  } ?>
                      </tbody>
                    </table>
                      
                      
                  </div>
                </div>
              </div>

       <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jurnal<small></small></h2>
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
                          <th rowspan="2">Tanggal</th>
                          <th rowspan="2">Uraian</th>
                          <th rowspan="2">Jenis</th>
                          <th  rowspan="2">Kategori</th>
                          <th colspan="2"><center>Status</center></th>
                          <th  rowspan="2">Saldo</th>
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
                              <td><?php echo $jur->tanggal; ?></td>
                              <td><?php echo $jur->uraian; ?></td>
                              <td><?php echo $jur->jenis; ?></td>
                              <td><?php  if($jur->kategori != ""){echo $jur->kategori;}else{echo"";} ?></td>
                              <td><?php $masuk = $jur->status; if($masuk == "MASUK"){echo"Rp.".number_format($jur->saldo,0,',','.');}else{echo"";} ?></td>
                              <td><?php $masuk = $jur->status; if($masuk == "KELUAR"){echo"Rp.".number_format($jur->saldo,0,',','.');}else{echo"";} ?></td>
                              <td style="text-align:right;"></td>
                          </tr>
                          <?php $no++; } ?>
                      </tbody>
                    </table>
                      
                      
                  </div>
                </div>
              </div>       
            
              
              
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Buku besar<small></small></h2>
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
                          <th rowspan="2">Jenis</th>
                          <th colspan="2"><center>Status</center></th>
                        </tr>
                          <tr>                          
                          <th>Masuk</th>
                          <th>Keluar</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($buku->result() as $jur){ ?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php $kat = $jur->kategori; if($kat == ""){echo "PENERIMAAN";}else{echo $jur->kategori;} ?></td>
                              <td><?php echo $jur->jenis; ?></td>
                              <td><?php $masuk = $jur->status; if($masuk == "MASUK"){echo"Rp.".number_format($jur->total,0,',','.');}else{echo"";} ?></td>
                              <td><?php $masuk = $jur->status; if($masuk == "KELUAR"){echo"Rp.".number_format($jur->total,0,',','.');}else{echo"";} ?></td>
                          </tr>
                          <?php $no++; } ?>
                          
                      </tbody>
                    </table>
                      
                  </div>
                </div>
              </div>

              
              
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Rugi laba<small> </small></h2>
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
                          <th rowspan="2">Tanggal diperbaharui</th>
                          <th rowspan="2">Uraian</th>
                          <th colspan="2"><center>Jenis</center></th>
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
                          </tr>
                          <?php $no++; } ?>
                          
                      </tbody>
                    </table>
                      
                  </div>
                </div>
              </div>

<style>
    td{
        font-size: 12px;
    }
</style>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashflow<small></small></h2>
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
                          <th rowspan="2">Tanggal</th>
                          <th rowspan="2">Uraian</th>
                          <th  rowspan="2">Jumlah</th>
                          <th rowspan="2">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($cflow->result() as $cash){ ?>
                          <tr>
                              <td><?php echo $no; ?></td>
                              <td><?php echo $cash->tanggal; ?></td>
                              <td><?php echo $cash->uraian; ?></td>
                              <td><?php echo'Rp. '.number_format($cash->jumlah,0,',','.'); ?></td>
                              <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Tools <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                      <li><a href="<?php echo base_url(); ?>home/edtcashflow/<?php echo $cash->id_cashflow; ?>">Edit</a>
                                      </li>
                                      <li onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><a href="<?php echo base_url(); ?>home/delcashflow/<?php echo $cash->id_cashflow; ?>"  >Hapus</a>
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


          </div>

        