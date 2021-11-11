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
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashflow<small>Proyeksi <?php echo $hell; ?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                         <div class="btn-group">
                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button" aria-expanded="false">Pilih perumahan <span class="caret"></span>
                    </button>
                    <ul role="menu" class="dropdown-menu">
                        <?php $no=1; foreach($per->result() as $rmah){ ?>
                      <li style="text-transform:uppercase;"><a href="<?php echo base_url(); ?>home/cash/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
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
                    <div class="x_title" style="background:#D71149;text-align:center;padding-top:10px;border:0;">
                    <h2><span  style="color:white;">Filter berdasarkan</span></h2>
                        <?php echo form_open('home/proscashflow'); ?>
                    <ul class="nav navbar-right panel_toolbox">
                        <li style="margin-right:10px;">
                            <input name="k" value="<?php echo $this->uri->segment(3); ?>" type="hidden">
                            <input type="text" placeholder="Tahun" class="form-control" name="thn" required >
                        </li>
                        
                        <li>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
              </div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashflow<small>Pemasukan</small></h2>
                    
                    <div class="clearfix"></div>
                </div>
                                     
                  <div class="x_content" style="overflow:auto;">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <tr style="background:#d71149;color:white;">
                          <th>No</th>
                          <th>Uraian</th>
                          <th>Jan</th>
                          <th>Feb</th>
                          <th>Mar</th>
                          <th>Apr</th>
                          <th>Mei</th>
                          <th>Jun</th>
                          <th>Jul</th>
                          <th>Aug</th>
                          <th>Sep</th>
                          <th>Okt</th>
                          <th>Nov</th>
                          <th>Des</th>
                          </tr>
                      
                          <?php $no=1;
                        
                        foreach($cashmasuk->result() as $b){ ?>
                            <tr>
                                <td><?php  echo $no;?></td>
                                <td><?php echo $b->uraian; ?></td>
                                <td><?php 
                                        if($b->bulan==01){
                                            $mj = $b->saldo;
                                      echo"Rp. ".number_format($mj,0,',','.');
                                        }else{
                                            $mj = 0;
                                      echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==02){
                                            $mf = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mf = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==03){
                                            $mm = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mm = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==04){
                                            $ma = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$ma =  0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==05){
                                            $mme = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mme = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==06){
                                            $mju = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mju = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==07){
                                            $mjl = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mjl = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==08){
                                            $mag = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mag = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==09){
                                            $ms = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$ms = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==10){
                                            $mok = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mok = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==11){
                                            $mno = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mno = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==12){
                                            $mde = $b->saldo;
                                      echo"Rp. ".number_format($b->saldo,0,',','.');
                                        }else{$mde = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                
                            </tr>
                          <?php $no++;  } ?>

                          <tr style="background:#26b99a;color:white;">
                          <th>Total</th>
                          <th>Keseluruhan</th>
                          <th>Jan</th>
                          <th>Feb</th>
                          <th>Mar</th>
                          <th>Apr</th>
                          <th>Mei</th>
                          <th>Jun</th>
                          <th>Jul</th>
                          <th>Aug</th>
                          <th>Sep</th>
                          <th>Okt</th>
                          <th>Nov</th>
                          <th>Des</th>
                          
                          </tr>
                          <tr style="background:#f0ad4e;color:white;">
                            <td>@</td>
                            <td>
                                  <?php 
                                        $t = $mjan->smj + $mfeb->smf + $mmar->smm + $mapr->sma + $mmei->sme + $mjun->smju + $mjul->smjl +
                                            $maug->smau + $msep->smse + $mokt->smok + $mnov->smn + $mdes->smd;
                                        echo"Rp. ".number_format($t,0,',','.');
                                  ?>
                              </td>
                              <td><?php  if($mjan->smj!=""){echo"Rp. ".number_format($mjan->smj,0,',','.');}else{echo"Rp. 0";} ?></td>
                              <td><?php if($mfeb->smf!=""){echo"Rp. ".number_format($mfeb->smf,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mmar->smm!=""){echo"Rp. ".number_format($mmar->smm,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mapr->sma!=""){echo"Rp. ".number_format($mapr->sma,0,',','.');}else{echo"Rp. 0";} ?></td>
                              <td><?php if($mmei->sme!=""){echo"Rp. ".number_format($mmei->sme,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mjun->smju!=""){echo"Rp. ".number_format($mjun->smju,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mjul->smjl!=""){echo"Rp. ".number_format($mjul->smjl,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($maug->smau!=""){echo"Rp. ".number_format($maug->smau,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($msep->smse!=""){echo"Rp. ".number_format($msep->smse,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mokt->smok!=""){echo"Rp. ".number_format($mokt->smok,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mnov->smn!=""){echo"Rp. ".number_format($mnov->smn,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($mdes->smd!=""){echo"Rp. ".number_format($mdes->smd,0,',','.');}else{echo"Rp. 0";} ?></td>
                              </tr>
                        
                        <tr>
                            <th colspan="14"><center>Cashflow pengeluaran</center></th>
                        </tr>
                                        
                          <?php $no=1;
                        
                        foreach($cashkeluar->result() as $a){ ?>
                            <tr>
                                <td><?php  echo $no;?></td>
                                <td><?php echo $a->kategori; ?></td>
                                <td><?php 
                                        if($a->bulan==01){
                                            $kj = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{ $kj = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==02){
                                            $kf = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kf = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==03){
                                            $km = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$km = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==04){
                                            $ka = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$ka = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==05){
                                            $kme = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kme = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==06){
                                            $kju = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kju = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==07){
                                            $kjul = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kjul = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==08){
                                            $kag = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kag = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==09){
                                            $ks = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$ks = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==10){
                                            $kok = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kok = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==11){
                                            $kno = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kno = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==12){
                                            $kde = $a->saldo;
                                      echo"Rp. ".number_format($a->saldo,0,',','.');
                                        }else{$kde = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                
                            </tr>
                          <?php $no++;  } ?>
                          <tr style="background:#26b99a;color:white;">
                          <th >Total</th>
                          <th>Keseluruhan</th>
                          <th>Jan</th>
                          <th>Feb</th>
                          <th>Mar</th>
                          <th>Apr</th>
                          <th>Mei</th>
                          <th>Jun</th>
                          <th>Jul</th>
                          <th>Aug</th>
                          <th>Sep</th>
                          <th>Okt</th>
                          <th>Nov</th>
                          <th>Des</th>
                          
                          </tr>

                          <tr style="background:#f0ad4e;color:white;">
                              <td>@</td>
                              <td>
                                  <?php 
                                        $tot = $sjan->smj + $sfeb->smf + $smar->smm + $sapr->sma + $smei->sme + $sjun->smju + $sjul->smjl +
                                            $saug->smau + $ssep->smse + $sokt->smok + $snov->smn + $sdes->smd;
                                        echo"Rp. ".number_format($tot,0,',','.');
                                  ?>
                              </td>
                              <td><?php  if($sjan->smj!=""){echo"Rp. ".number_format($sjan->smj,0,',','.');}else{echo"Rp. 0";} ?></td>
                              <td><?php if($sfeb->smf!=""){echo"Rp. ".number_format($sfeb->smf,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($smar->smm!=""){echo"Rp. ".number_format($smar->smm,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($sapr->sma!=""){echo"Rp. ".number_format($sapr->sma,0,',','.');}else{echo"Rp. 0";} ?></td>
                              <td><?php if($smei->sme!=""){echo"Rp. ".number_format($smei->sme,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($sjun->smju!=""){echo"Rp. ".number_format($sjun->smju,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($sjul->smjl!=""){echo"Rp. ".number_format($sjul->smjl,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($saug->smau!=""){echo"Rp. ".number_format($saug->smau,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($ssep->smse!=""){echo"Rp. ".number_format($ssep->smse,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($sokt->smok!=""){echo"Rp. ".number_format($sokt->smok,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($snov->smn!=""){echo"Rp. ".number_format($snov->smn,0,',','.');}else{echo"Rp. 0";}  ?></td>
                              <td><?php if($sdes->smd!=""){echo"Rp. ".number_format($sdes->smd,0,',','.');}else{echo"Rp. 0";} ?></td>
                              
                          </tr>
                      
                          <tr>
                            <th colspan="14"><center>Cashflow saldo</center></th>
                        </tr>

                        <tr>
                          <th colspan="2">Total</th>
                          
                          <th>Bulan I</th>
                          <th>Bulan II</th>
                          <th>Bulan III</th>
                          <th>Bulan IV</th>
                          <th>Bulan V</th>
                          <th>Bulan VI</th>
                          <th>Bulan VII</th>
                          <th>Bulan VII</th>
                          <th>Bulan IX</th>
                          <th>Bulan X</th>
                          <th>Bulan XI</th>
                          <th>Bulan XII</th>
                          </tr>

                          <tr>
                            <td colspan="2">@</td>
                            
                            <td><?php if(isset($mjan->smj) || isset($sjan->smj)){echo"Rp. ".number_format($n1 = $mjan->smj - $sjan->smj,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($mfeb->smf) || isset($sfeb->smf)){echo"Rp. ".number_format($n2 = ($mfeb->smf - $sfeb->smf)+$n1,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($mmar->smm) || isset($smar->smm)){echo"Rp. ".number_format($n3 = ($mmar->smm - $smar->smm)+$n2,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($mapr->sma) || isset($sapr->sma)){echo"Rp. ".number_format($n4 = ($mapr->sma - $sapr->sma)+$n3 ,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($mmei->sme) || isset($smei->sme)){echo"Rp. ".number_format($n5 = ($mmei->sme - $smei->sme)+$n4,0,',','.');}else{echo"Rp. 0";} ?></td>
                            <td><?php if(isset($mjun->smju) || isset($sjun->smju)){echo"Rp. ".number_format($n6 = ($mjun->smju - $sjun->smju)+$n5,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($mjul->smjl) || isset($sjul->smjl)){echo"Rp. ".number_format($n7 = ($mjul->smjl - $sjul->smjl)+$n6,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($maug->smau) || isset($saug->smau)){echo"Rp. ".number_format($n8 = ($maug->smau - $saug->smau)+$n7,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($msep->smse) || isset($ssep->smse)){echo"Rp. ".number_format($n9 = ($msep->smse - $ssep->smse)+$n8,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($mokt->smok) || isset($sokt->smok)){echo"Rp. ".number_format($n10 = ($mokt->smok - $sokt->smok)+$n9,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($mnov->smn) || isset($snov->smn)){echo"Rp. ".number_format($n11 = ($mnov->smn - $snov->smn)+$n10,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($mdes->smd) || isset($sdes->smd)){echo"Rp. ".number_format($n12 = ($mdes->smd - $sdes->smd)+$n11,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            
                          </tr>
                    </table>  
                  </div>
                </div>
              </div>


<div class="col-md-12 col-sm-12 col-xs-12">
                    <?php }else{ ?>
                  <div class="x_title" style="background:#D71149;color:white;text-align:center;padding-top:20px;font-size:20px;padding-bottom:10px;">
                    Silahkan pilih perumahan terlebih dahulu
                  </div>
                    <?php } ?>
                </div>
              </div>
</div>