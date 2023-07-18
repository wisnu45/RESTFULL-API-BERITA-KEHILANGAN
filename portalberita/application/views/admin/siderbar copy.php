<?php 
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $jum_pesan=$query->num_rows();
    $query1=$this->db->query("SELECT * FROM tbl_komentar WHERE komentar_status='0'");
    $jum_komentar=$query1->num_rows();
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu Utama</li>
        <li class="active">
          <a href="<?php echo base_url().'admin/dashboard'?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
       


         <li class="treeview">
          <a href="#">
            <i class="fa  fa-files-o"></i>
            <span>Data proposal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url().'admin/panduan'?>"><i class="fa fa-file-o"></i> Panduan </a></li>
            <li><a href="<?php echo base_url().'admin/files'?>"><i class="fa fa-file-o"></i> Pedoman </a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa  fa-tasks"></i>
            <span>Jadwal Dan Info </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?php echo base_url().'admin/info/add_info'?>"><i class="fa fa-thumb-tack"></i> Add Info</a></li>
           <li><a href="<?php echo base_url().'admin/info'?>"><i class="fa fa-list"></i> List Info </a></li>
            <li><a href="<?php echo base_url().'admin/jadwal'?>"><i class="fa fa-file-text-o"></i> Post Jadwal</a></li>
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa  fa-tasks"></i>
            <span>Pendaftar proposal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/pendaftar'?>"><i class="fa fa-users"></i> Daftar Nama Kelompok</a></li>
            <li><a href="<?php echo base_url().'admin/pengesahan'?>"><i class="fa fa-file-o"></i> Pengesahan</a></li>
            <li><a href="<?php echo base_url().'admin/pernyataan'?>"><i class="fa fa-file-o"></i> Pernyataan</a></li>
            <li><a href="<?php echo base_url().'admin/proposal'?>"><i class="fa fa-files-o"></i> Proposal</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo base_url().'admin/mahasiswa'?>">
            <i class="fa fa-users"></i> <span>Data Mahasiswa</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>


        
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-camera"></i>
            <span>Gallery</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'admin/album'?>"><i class="fa fa-clone"></i> Album</a></li>
            <li><a href="<?php echo base_url().'admin/galeri'?>"><i class="fa fa-picture-o"></i> Photos</a></li>
          </ul>
        </li>
        <li>
          <a href="<?php echo base_url().'admin/pengguna'?>">
            <i class="fa fa-user"></i> <span> Data User</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

        
        <li>
          <a href="<?php echo base_url().'admin/inbox'?>">
            <i class="fa fa-envelope"></i> <span>Inbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jum_pesan;?></small>
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'administrator/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
</aside>