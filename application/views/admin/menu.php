<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-dashboard"></i> Gray B - Apps</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url(); ?>asset/main/img/man.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('nama'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Menu</h3>
                <ul class="nav side-menu">
                  <!---<li><a href="<?php echo base_url(); ?>home/"><i class="fa fa-home"></i> Beranda </a></li>-->
                    <li><a href="<?php echo base_url(); ?>home/perumahan"><i class="fa fa-bank"></i> Perumahan</a></li>
                    <li><a href="<?php echo base_url(); ?>home/jurnal"><i class="fa fa-bookmark"></i> Jurnal </a></li>
                  <li><a href="<?php echo base_url(); ?>home/bukubesar"><i class="fa fa-book"></i> Buku besar </a></li>
                    <li><a><i class="fa fa-dollar"></i>Rugi laba / cashflow<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url(); ?>home/rugilaba">Rugi laba</a></li>
                      <li><a href="<?php echo base_url(); ?>home/cash">Cash flow</a></li>
                    </ul>
                  </li>
                  <li><a href="<?php echo base_url(); ?>home/monitoring"><i class="fa fa-desktop"></i> Monitoring DP</a></li>
                  <li><a href="<?php echo base_url(); ?>home/kategori"><i class="fa fa-list-alt"></i> Kategori</a></li>
                    
                    <?php if($this->session->userdata('level')==0){?>
                    <li><a href="<?php echo base_url(); ?>home/user"><i class="fa fa-user"></i> Pengguna</a></li>
                    <?php } ?>
                    
                    <li><a href="<?php echo base_url(); ?>home/tfoprasional"><i class="fa fa-credit-card"></i> Transfer dana operasional</a></li>
                    <li><a href="<?php echo base_url(); ?>home/tfowner"><i class="fa fa-credit-card"></i> Transfer owner</a></li>
                    <li><a><i class="fa fa-users"></i> Investor <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo base_url(); ?>home/daftarinvestor">Daftar Investor</a></li>
                          <li><a href="<?php echo base_url(); ?>home/danainvestor">Dana Investor</a></li>
                        </ul>
                    </li>
                  <li><a href="<?php echo base_url(); ?>home/logout"><i class="fa fa-sign-out"></i>Logout </a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>