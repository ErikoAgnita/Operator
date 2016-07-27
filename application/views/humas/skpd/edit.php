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
                      <label class="control-label" for="inputBasicTema">isLink</label>
                      <input type="text" class="form-control" id="inputBasicTema" value="<?php echo $s->isLink ?>" name="isLink"
                       autocomplete="off" />
                    </div>
                       <div class="form-group">
                      <label class="control-label" for="inputBasicTema">isAktif</label>
                      <input type="text" class="form-control" id="inputBasicTema" value="<?php echo $s->isAktif ?>" name="isAktif"
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