<!-- top tiles -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tambah Hak Pengguna</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?php echo base_url(); ?>home/<?php if($this->uri->segment(2)!="edituser"){echo"adduser";}else{echo"uptuser";} ?>">
                      <input type="hidden" value="<?php echo $editing->id_adm; ?>" name="id">
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Nama lengkap <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $editing->nama; ?>">
                          </div>                          
                      </div>
                        
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $editing->username; ?>">
                          </div>                          
                      </div>
                        
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="level" id="level" class="form-control">
                            <option disabled selected>Pilih hak akses</option>
                            <option value="1" <?php if($editing->level==1){echo"selected";} ?>>Admin</option>
                            <option value="2" <?php if($editing->level==2){echo"selected";} ?>>Investor</option>
                        </select>
                          </div>                          
                      </div>
                        
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="username" name="password" <?php if($this->uri->segment(2)!="edituser"){?> required="required" <?php } ?> class="form-control col-md-7 col-xs-12" >
                          </div>                          
                      </div>
                        
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Manu yang dapat diakses <span class="required">*</span>
                        </label>
                        
                        <div class="checkbox">
                            
                              <input type="checkbox" value="1" class="flat" name="perumahan" <?php if($editing->perumahan==1){echo"checked";} ?> > Perumahan
                                <input type="checkbox" value="1" class="flat" name="jurnal" <?php if($editing->jurnal==1){echo"checked";} ?>> Jurnal 
                                <input type="checkbox" value="1" class="flat" name="bukubesar" <?php if($editing->bukubesar==1){echo"checked";} ?>> Buku Besar
                                <input type="checkbox" value="1" class="flat" name="rugilaba" <?php if($editing->rugilaba==1){echo"checked";} ?>> Rugi Laba
                                <input type="checkbox" value="1" class="flat" name="cashflow" <?php if($editing->cashflow==1){echo"checked";} ?>> Cashflow
                            
                          </div>                          
                      </div>
                        
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> <span class="required">*</span>
                        </label>
                        
                        <div class="checkbox">

                                <input type="checkbox" value="1" class="flat" name="monitoring" <?php if($editing->monitoring==1){echo"checked";} ?>> Monitoring DP
                                <input type="checkbox" value="1" class="flat" name="kategori" <?php if($editing->kategori==1){echo"checked";} ?>> Kategori
                                <input type="checkbox" value="1" class="flat" name="tfoperasional" <?php if($editing->tfoperasional==1){echo"checked";} ?>> Transfer Dana Operasional
                                <input type="checkbox" value="1" class="flat" name="tfowner" <?php if($editing->tfowner==1){echo"checked";} ?>> Trasnfer Owner
                                <input type="checkbox" value="1" class="flat" name="investor" <?php if($editing->investor==1){echo"checked";} ?>> Investor
                            
                          </div>                          
                      </div>
                        
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <a href="<?php echo base_url(); ?>home/user" class="btn btn-warning" >Cancel</a>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

<div class="row">
    
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pengguna<small> </small></h2>
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
                        <tr style="background:#d71149;color:white;">
                          <th style="width:10px;">No</th>
                          <th>Nama pengguna</th>
                          <th>Username</th>
                          <th>Status</th>
                          <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                         <?php $no=1; foreach($data->result() as $d){ ?> 
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $d->nama; ?></td>
                                <td><?php echo $d->username; ?></td>
                                <td>
                                    <?php if($d->level==1){
                                            echo"admin";    
                                        }else{
                                            echo"investor";
                                        }                                 
                                    ?>
                                </td>
                                <td>
                                    <a href="<?php echo base_url(); ?>home/edituser/<?php echo $d->id_adm; ?>" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="<?php echo base_url(); ?>home/deluser/<?php echo $d->id_adm; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');">Hapus</a>
                                </td>
                            </tr>
                         <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

</div>