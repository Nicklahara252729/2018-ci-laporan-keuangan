
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori<small> </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li >
                        <a href="<?php echo base_url(); ?>home/addkategori" class="btn btn-success" style="color:white;"><i class="fa fa-plus"></i>&nbsp; Tambah data</a>
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
                          <th style="width:10px;">No</th>
                          <th>Nama ketegori</th>
                          <th>Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php $no=1; foreach($kategori->result() as $key){ ?>
                          <tr>
                              <td><center><?php echo $no; ?></center></td>
                              <td><?php echo $key->kategori; ?></td>                              
                              <td>
                                  <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Tools <span class="caret"></span>
                                    </button>
                                    <ul role="menu" class="dropdown-menu">
                                      <li><a href="<?php echo base_url(); ?>home/edtkategori/<?php echo $key->id_kategori; ?>">Edit</a>
                                      </li>
                                      <li onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?');"><a href="<?php echo base_url(); ?>home/delkategori/<?php echo $key->id_kategori; ?>"  >Hapus</a>
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
