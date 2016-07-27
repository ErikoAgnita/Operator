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
      <h1 class="page-title">Satuan Kerja Perangkat Daerah (SKPD)</h1>
      <ol class="breadcrumb">
        <li>SKPD</li>
        <li>Tambah SKPD</li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Tambah SKPD</h4>
                <div class="example">
                  <form action="<?php echo base_url()?>Cskpd/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeUnit">Kode Unit</label>
                        <input type="text" class="form-control" id="inputBasicKodeUnit" name="kodeUnit"
                        placeholder="humas" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicBagian">Bagian</label>
                      <input type="text" class="form-control" id="inputBasicBagian" name="bagian"
                      placeholder="00" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="inputBasicBentuk">Bentuk</label>
                        <input type="email" class="form-control" id="inputBasicBentuk" name="bentuk" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicNama">Nama SKPD</label>
                      <input type="text" class="form-control" id="inputBasicNama" name="nama"
                      placeholder="Bagian Hubungan Masyarakat Setda" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">Alamat</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" name="alamat"
                      placeholder="Jl. Letjend. Sukowati No. 51, Salatiga, Jawa Tengah 50724" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" name="telepon" placeholder="(0298) 326767"
                       autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicFax">Fax</label>
                      <input type="text" class="form-control" id="inputBasicFax" name="fax"
                       autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" name="email"
                       placeholder="humas@salatigakota.go.id" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicWebsite">Website</label>
                      <input type="text" class="form-control" id="inputBasicWebsite" name="website"
                       placeholder="http://www.salatigakota.go.id" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicUrut">Urut</label>
                      <input type="text" class="form-control" id="inputBasicUrut" name="urut"
                       autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicTema">Tema</label>
                      <input type="text" class="form-control" id="inputBasicTema" name="tema"
                       placeholder="Kuning" autocomplete="off" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Tambah</button>
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