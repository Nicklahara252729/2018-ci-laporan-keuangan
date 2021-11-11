<!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                  
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $this->session->userdata('nama'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                    
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo base_url(); ?>home/changename"><i class="fa fa-user pull-right"></i> Ubah nama</a></li>
                    <?php if($this->session->userdata('level')==0){ ?>
                      <li><a href="<?php echo base_url(); ?>home/changuser"><i class="fa fa-pencil pull-right"></i> Ubah Username</a></li>
                      <li><a href="<?php echo base_url(); ?>home/changepass"><i class="fa fa-key pull-right"></i> Ubah Password</a></li>
                    <?php } ?>
                      <li><a href="<?php echo base_url(); ?>home/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
                  
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->