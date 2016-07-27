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
                <span class="site-menu-title">Aspirasi</span>
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
                <span class="site-menu-title">Kelola Dinas</span>
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
                <span class="site-menu-title">Kelola Admin</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Admin/lihat" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Data Admin</span>
                  </a>
                  <a class="animsition-link" href="<?php echo base_url(); ?>Admin/lihat" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                  <span class="site-menu-title">Tambah Admin</span>
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
      <h1 class="page-title">Admin</h1>
      <ol class="breadcrumb">
        <li>Admin</li>
        <li>Edit Data</li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Edit Akun</h4>
                <div class="example">
                  <?php foreach($admin as $a){ ?>
                  <form action="<?php echo base_url(). 'Cadmin/do_update'; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Nama Dinas</label>
                        <input type="hidden" name="ID_ADMIN" value="<?php echo $a->ID_ADMIN ?>">
                        <input type="text" class="form-control" id="inputBasicFirstName" value="<?php echo $a->NAMA_DINAS ?>" name="nama"
                        placeholder="VIRA WIENA" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">Alamat Dinas</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $a->ALAMAT_DINAS ?>" name="alamat"
                      placeholder="Jalan Argoboga" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicEmail">Email</label>
                        <input type="text" class="form-control" id="inputBasicEmail" value="<?php echo $a->EMAIL_ADMIN ?>" name="email"
                        placeholder="a13@mhs.its.ac.id" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" value="<?php echo $a->TELEPON ?>" name="telepon"
                      placeholder="0813287787" autocomplete="off" />
                    </div>
                      <div class="form-group">
                      <label class="control-label" for="inputBasicUsername">Username</label>
                      <input type="text" class="form-control" id="inputBasicPassword" value="<?php echo $a->USERNAME ?>" name="username"
                      placeholder="5113100061" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="password" class="form-control" id="inputBasicPassword" value="<?php echo $a->PASSWORD ?>" name="password"
                       autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicImage">Foto</label>
                      <input type="file" class="form-control" id="inputBasicPassword" img src="gambar/<?=$a->FOTO_PROFIL?>" name="foto"
                       autocomplete="off" />
                    </div>
                      <div class="form-group">
                      <label class="control-label" for="inputBasicLevel">Level</label>
                      <input type="text" class="form-control" id="inputBasicLevel" value="<?php echo $a->LEVEL ?>" name="level" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                  <?php } ?>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page -->