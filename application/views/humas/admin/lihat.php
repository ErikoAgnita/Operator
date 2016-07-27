<!-- Menu -->
<div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <li class="site-menu-category">Profil Operator Humas</li>
            <li class="site-menu-item has-sub active open">
              <a href="javascript:void(0)" data-slug="uikit">
                <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                <span class="site-menu-title">Profil</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Dinas/dinas_lihat" data-slug="uikit-buttons">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Lihat</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="advanced">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">Laporan</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Dinas/aspirasi_lihat" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Lihat</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="advanced">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">SKPD</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Cadmin/lihat" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Data SKPD</span>
                  </a>
                  <a class="animsition-link" href="<?php echo base_url(); ?>Cadmin/tambah" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                  <span class="site-menu-title">Tambah SKPD</span>
                </a>
                </li>
              </ul>
            </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="advanced">
                <i class="site-menu-icon wb-hammer" aria-hidden="true"></i>
                <span class="site-menu-title">Operator</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Cadmin/lihat" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Data Operator</span>
                  </a>
                  <a class="animsition-link" href="<?php echo base_url(); ?>Cadmin/tambah" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                  <span class="site-menu-title">Tambah Operator</span>
                </a>
                </li>
              </ul>
            </li>
        </div>
      </div>
    </div>
  </div>
  <!-- End Menu -->

  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Satuan Kerja Perangkat Daerah (SKPD)</h1>
      <ol class="breadcrumb">
        <li>SKPD</li>
        <li>Data SKPD</li>
      </ol>
    </div>
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar SKPD</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dinas</th>
                <th>Alamat Dinas</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Username</th>
                <th>Password</th>
                <th>Level</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php foreach ($admin as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->NAMA_DINAS;?></td>
                <td><?php echo $row->ALAMAT_DINAS;?></td>
                <td><?php echo $row->EMAIL_ADMIN;?></td>
                <td><?php echo $row->TELEPON;?></td>                
                <td><?php echo $row->USERNAME;?></td>
                <td><?php echo $row->PASSWORD;?></td>
                <td><?php echo $row->LEVEL;?></td>
                <td class="text-nowrap">
                   <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Detail">
                    <a href="<?php echo base_url(); ?>Cadmin/detail/<?php echo $row->ID_ADMIN;?>"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>Cadmin/update/<?php echo $row->ID_ADMIN;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Cadmin/hapus/<?php echo $row->ID_ADMIN;?>"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>
                </td>
              </tr>
              <?php }?>              
            </tbody>
          </table>
          <br/>
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->