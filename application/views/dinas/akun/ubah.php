<!-- Menu -->
<div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
            <li class="site-menu-category">Operator Dinas</li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="advanced">
                <i class="site-menu-icon wb-bookmark" aria-hidden="true"></i>
                <span class="site-menu-title">Profil</span>
                <span class="site-menu-arrow"></span>
              </a>
                 <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Dinas/dinas_lihat" data-slug="uikit">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Lihat</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>Dinas/dinas_ubah" data-slug="uikit">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Ubah</span>
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
          </li>
        </div>
      </div>
    </div>
  </div>
  <!-- End Menu -->

  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Ubah Profil Operator Dinas</h1>
      <ol class="breadcrumb">
        <li>Profil Operator Dinas</li>
        <li>Ubah</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-3"> </div>
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <div class="example">
                  <form autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">ID</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="inputFirstName"
                        placeholder="A0000" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicFirstName">Nama Dinas</label>
                        <input type="text" class="form-control" id="inputBasicFirstName" name="inputFirstName"
                        placeholder="Dinas Pertamanan" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicEmail" name="inputEmail"
                      placeholder="0813287787" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Username</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="inputPassword"
                      placeholder="Saya" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Password</label>
                      <input type="text" class="form-control" id="inputBasicPassword" name="inputPassword"
                      placeholder="rahasia" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
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