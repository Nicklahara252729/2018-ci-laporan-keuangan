<?php $a = $rumah->row();?>
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Detail perumahan<small><?php echo $a->nama_perumahan; ?> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="btn btn-danger" href="<?php echo base_url(); ?>home/perumahan/" style="color:white;"><i class="fa fa-close"></i> &nbsp; Kembali</a>
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
                      <thead>
                        <tr>
                          <th>Nama perumahan</th>
                          <th>Tanggal dimulai</th>
                          <th>Alamat</th>
                          </tr>
                      </thead>
                      <tbody>
                          
                          <tr>
                              <td><?php echo $a->nama_perumahan;?></td>
                              <td><?php echo $a->tanggal;?></td>
                              <td><?php echo $a->alamat;?></td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                    
                    <div class="x_content">
                    <p class="text-muted font-13 m-b-30"><strong>Informasi Unit</strong> <a href="<?php echo base_url(); ?>home/addunit/<?php echo $this->uri->segment(3); ?>" class="btn btn-primary pull-right btn-xs" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data unit</a></p>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2">Jumlah Unit</th>
                          <th colspan="2">Unit terjual</th>
                          <th colspan="2">Sisa Unit</th>
                          </tr>
                          <tr>
                              <td colspan="2"><?php echo $jumlah; ?> Unit</td>
                              <td colspan="2"><?php echo $terjual; ?> Unit</td>
                              <td colspan="2"><?php echo $sisa; ?> Unit</td>
                          </tr>
                          <tr>
                              <th colspan="6"><center>Detail unit</center></th>
                          </tr>
                          <tr>
                              <th>NO</th>
                              <th>Tipe</th>
                              <th>Nomor KAV</th>
                              <th>Harga Jual</th>
                              <th>Status</th>
                              <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($unit->result() as $b){?>
                          <tr>
                              <td><?php echo $no;?></td>
                              <td><?php  if(isset($b->tipe)){echo $b->tipe;}else{echo"";}?></td>
                              <td><?php  if(isset($b->kav)){echo $b->kav;}else{echo"";}?></td>
                              <td><?php  if(isset($b->harga_jual)){echo"Rp. ".number_format($b->harga_jual,0,',','.');}else{echo"Rp. 0";}?></td>
                              <td <?php if(isset($b->status)){$s = $b->status;}else{$s = "";} if($s=="TERJUAL"){echo"style=background:#26b99a;color:white;";}else{echo "style=background:orange;color:white;";}?>><?php echo $s; ?></td>
                              <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Tools <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                      <li><a href="<?php echo base_url(); ?>home/edtunit/<?php echo $b->id_unit; ?>/<?php echo $this->uri->segment(3); ?>">Edit</a>
                                      </li>
                                      <li onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><a href="<?php echo base_url(); ?>home/delunit/<?php echo $b->id_unit; ?>/<?php echo $this->uri->segment(3); ?>"  >Hapus</a>
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
