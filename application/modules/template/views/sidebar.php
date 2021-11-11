<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="profile-image"> <img src="<?php echo base_url(); ?>assets/img/man.png" alt="image"/> <span class="online-status online"></span> </div>
              <div class="profile-name">
                <p class="name"><?php echo $users->first_name ." ". $users->last_name; ?></p>
                <p class="designation">Owner</p>
              </div>
              <div class="notification-panel mt-4">
                <span title="Sign out"><i class="mdi mdi-logout"></i></span>
                <span class="count-wrapper"><i class="mdi mdi-bell"></i><span class="count top-right bg-warning">4</span></span>
                <span><i class="mdi mdi-email"></i></span>
              </div>
            </div>
          </li>
          <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/09.png" alt="menu icon"> <span class="menu-title">Dashboard</span></a> </li>
          
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Perumahan</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Jurnal</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Rugi laba</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Cashflow</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Monitoring DP</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Kategori</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Pegawai</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Transfer Dana Operasional</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Transfer Owner</span></a> </li>
            
            <li class="nav-item"> <a class="nav-link" href="<?php echo base_url(); ?>home/app"> <img class="menu-icon" src="<?php echo base_url(); ?>assets/menu_icons/08.png" alt="menu icon"> <span class="menu-title">Investor</span></a> </li>
          
          <li class="nav-item">
            <div class="sidebar-sticker">
              <div class="d-flex align-items-center text-primary">
                <h6 class="mb-1">Need Help</h6><i class="mdi ml-2 mdi-bell-ring-outline"></i>
              </div>
              <a class="d-block text-gray my-2" href="#">0878 3432 7733</a>
              <a class="d-block" href="#">Documentation</a>
            </div>
          </li>
        </ul>
      </nav>