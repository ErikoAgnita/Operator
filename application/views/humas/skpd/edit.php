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
                  <a class="animsition-link" href="<?php echo base_url(); ?>Cskpd/lihat" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Data SKPD</span>
                  </a>
                  <a class="animsition-link" href="<?php echo base_url(); ?>Cskpd/tambah" data-slug="advanced-lightbox">
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
                  <?php foreach($skpd as $s){ ?>
                  <form action="<?php echo base_url(). 'Cskpd/do_update'; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeUnit">Kode Unit</label>
                        <input type="hidden" name="id_skpd" value="<?php echo $s->id_skpd ?>">
                        <input type="text" class="form-control" id="inputBasicKodeUnit" value="<?php echo $s->kodeUnit ?>" name="kodeUnit"
                         autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicBagian">Bagian</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $s->bagian ?>" name="bagian"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicBentuk">Bentuk</label>
                        <input type="text" class="form-control" id="inputBasicEmail" value="<?php echo $s->bentuk ?>" name="bentuk"
                        autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicNama">Nama SKPD</label>
                      <input type="text" class="form-control" id="inputBasicNama" value="<?php echo $s->nama ?>" name="nama"
                       autocomplete="off" />
                    </div>
                      <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">Alamat</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $s->alamat ?>" name="alamat"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" value="<?php echo $s->telepon ?>" name="telepon"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicFax">Fax</label>
                      <input type="text" class="form-control" id="inputBasicFax" value="<?php echo $s->fax ?>" name="fax"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" value="<?php echo $s->email ?>" name="email"
                        autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicWebsite">Website</label>
                      <input type="text" class="form-control" id="inputBasicWebsite" value="<?php echo $s->website ?>" name="website"
                       autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicUrut">Urut</label>
                      <input type="text" class="form-control" id="inputBasicUrut" value="<?php echo $s->urut ?>" name="urut"
                       autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicTema">Tema</label>
                      <input type="text" class="form-control" id="inputBasicTema" value="<?php echo $s->tema ?>" name="tema"
                       autocomplete="off" />
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