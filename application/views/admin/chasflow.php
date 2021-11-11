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
                      <li><a href="<?php echo base_url(); ?>home/cash/<?php echo $rmah->id_perumahan; ?>"><?php echo $no."."; ?> &nbsp;<?php echo $rmah->nama_perumahan; ?></a></li>
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
              </div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashflow<small>Pemasukan</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                    
                    
                    
                                          
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
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
                      </thead>
                      <tbody>                          
                          <?php $no=1;
                        
                        foreach($cashmasuk->result() as $b){ ?>
                            <tr>
                                <td><?php  echo $no;?></td>
                                <td><?php echo $b->uraian; ?></td>
                                <td><?php 
                                        if($b->bulan==01){
                                            $mj = $b->j;
                                      echo"Rp. ".number_format($mj,0,',','.');
                                        }else{
                                            $mj = 0;
                                      echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==02){
                                            $mf = $b->f;
                                      echo"Rp. ".number_format($b->f,0,',','.');
                                        }else{$mf = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==03){
                                            $mm = $b->m;
                                      echo"Rp. ".number_format($b->m,0,',','.');
                                        }else{$mm = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==04){
                                            $ma = $b->a;
                                      echo"Rp. ".number_format($b->a,0,',','.');
                                        }else{$ma =  $b->a;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==05){
                                            $mme = $b->me;
                                      echo"Rp. ".number_format($b->me,0,',','.');
                                        }else{$mme = $b->me; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==06){
                                            $mju = $b->ju;
                                      echo"Rp. ".number_format($b->ju,0,',','.');
                                        }else{$mju = $b->ju; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==07){
                                            $mjl = $b->jul;
                                      echo"Rp. ".number_format($b->jul,0,',','.');
                                        }else{$mjl = $b->jul;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==08){
                                            $mag = $b->ag;
                                      echo"Rp. ".number_format($b->ag,0,',','.');
                                        }else{$mag = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==09){
                                            $ms = $b->se;
                                      echo"Rp. ".number_format($b->se,0,',','.');
                                        }else{$ms = $b->se;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==10){
                                            $mok = $b->ok;
                                      echo"Rp. ".number_format($b->ok,0,',','.');
                                        }else{$mok = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==11){
                                            $mno = $b->no;
                                      echo"Rp. ".number_format($b->no,0,',','.');
                                        }else{$mno = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($b->bulan==12){
                                            $mde = $b->de;
                                      echo"Rp. ".number_format($b->de,0,',','.');
                                        }else{$mde = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                
                            </tr>
                          <?php $no++;  } ?>
                      </tbody>
                    </table>
                  </div>
                    
                    <div class="x_content">
                    <p class="text-muted font-13 m-b-30">Total Pemasukan</p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Total</th>
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
                          <th>Keseluruhan</th>
                          </tr>
                      </thead>
                      <tbody>
                         <td>@</td>
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
                              <td>
                                  <?php 
                                        $t = $mjan->smj + $mfeb->smf + $mmar->smm + $mapr->sma + $mmei->sme + $mjun->smju + $mjul->smjl +
                                            $maug->smau + $msep->smse + $mokt->smok + $mnov->smn + $mdes->smd;
                                        echo"Rp. ".number_format($t,0,',','.');
                                  ?>
                              </td>
                      </tbody>
                    </table>
                  </div>    
                </div>
              </div>

<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashflow<small>Pengeluaran</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>                    
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
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
                      </thead>
                      <tbody>
                          <?php $no=1;
                        
                        foreach($cashkeluar->result() as $a){ ?>
                            <tr>
                                <td><?php  echo $no;?></td>
                                <td><?php echo $a->kategori; ?></td>
                                <td><?php 
                                        if($a->bulan==01){
                                            $kj = $a->j;
                                      echo"Rp. ".number_format($a->j,0,',','.');
                                        }else{ $kj = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==02){
                                            $kf = $a->f;
                                      echo"Rp. ".number_format($a->f,0,',','.');
                                        }else{$kf = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==03){
                                            $km = $a->m;
                                      echo"Rp. ".number_format($a->m,0,',','.');
                                        }else{$km = $a->m; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==04){
                                            $ka = $a->a;
                                      echo"Rp. ".number_format($a->a,0,',','.');
                                        }else{$ka = $a->a; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==05){
                                            $kme = $a->me;
                                      echo"Rp. ".number_format($a->me,0,',','.');
                                        }else{$kme = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==06){
                                            $kju = $a->ju;
                                      echo"Rp. ".number_format($a->ju,0,',','.');
                                        }else{$kju = $a->ju; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==07){
                                            $kjul = $a->jul;
                                      echo"Rp. ".number_format($a->jul,0,',','.');
                                        }else{$kjul = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==08){
                                            $kag = $a->ag;
                                      echo"Rp. ".number_format($a->ag,0,',','.');
                                        }else{$kag = 0; echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==09){
                                            $ks = $a->se;
                                      echo"Rp. ".number_format($a->se,0,',','.');
                                        }else{$ks = $a->se;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==10){
                                            $kok = $a->ok;
                                      echo"Rp. ".number_format($a->ok,0,',','.');
                                        }else{$kok = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==11){
                                            $kno = $a->no;
                                      echo"Rp. ".number_format($a->no,0,',','.');
                                        }else{$kno = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                <td><?php 
                                        if($a->bulan==12){
                                            $kde = $a->de;
                                      echo"Rp. ".number_format($a->de,0,',','.');
                                        }else{$kde = 0;echo"Rp. 0";}
                                    ?></td>
                                
                                
                            </tr>
                          <?php $no++;  } ?>
                      </tbody>
                    </table>
                      
                  </div>
                    
                    <div class="x_content">
                    <p class="text-muted font-13 m-b-30">Total Pengeluaran</p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th rowspan="2">Total</th>
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
                          <th>Keseluruhan</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td>@</td>
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
                              <td>
                                  <?php 
                                        $tot = $sjan->smj + $sfeb->smf + $smar->smm + $sapr->sma + $smei->sme + $sjun->smju + $sjul->smjl +
                                            $saug->smau + $ssep->smse + $sokt->smok + $snov->smn + $sdes->smd;
                                        echo"Rp. ".number_format($tot,0,',','.');
                                  ?>
                              </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>  
                </div>
              </div>


<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cashflow saldo<small></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>                    
                  
                    
                    <div class="x_content">
                    <p class="text-muted font-13 m-b-30"></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Total</th>
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
                          <th>Keseluruhan</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <td>@</td>
                            <td><?php if(isset($kj) || isset($mj)){echo"Rp. ".number_format($n1 = $mj-$kj,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($kf) || isset($mf)){echo"Rp. ".number_format($n2 = $mf-$kf,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($mm) || isset($km)){echo"Rp. ".number_format($n3 = $mm-$km,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($ka) || isset($ma)){echo"Rp. ".number_format($n4 = $ma-$ka,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($kme) || isset($mme)){echo"Rp. ".number_format($n5 = $mme-$kme,0,',','.');}else{echo"Rp. 0";} ?></td>
                            <td><?php if(isset($kju) || isset($mju)){echo"Rp. ".number_format($n6 = $mju-$kju,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($kjul) || isset($mjl)){echo"Rp. ".number_format($n7 = $mjl-$kjul,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($kag) || isset($mag)){echo"Rp. ".number_format($n8 = $mag-$kag,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($ks) || isset($ms)){echo"Rp. ".number_format($n9 = $ms-$ks,0,',','.');}else{echo"Rp. 0";} ?></td>  
                            <td><?php if(isset($kok) || isset($mok)){echo"Rp. ".number_format($n10 = $mok-$kok,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($kno) || isset($mno)){echo"Rp. ".number_format($n11 = $mno-$kno,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php if(isset($kde) || isset($mde)){echo"Rp. ".number_format($n12 = $mde-$kde,0,',','.');}else{echo"Rp. 0";} ?></td> 
                            <td><?php echo"Rp. ".number_format($n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n9 + $n10 + $n11 + $n12,0,',','.'); ?></td>
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