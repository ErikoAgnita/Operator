<!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Kecamatan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kecamatan</li>
        <li>Edit Data Kecamatan</li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <?php foreach($kecamatan as $kec){ ?>

                <span class='username'><label><?php echo $kec->nama_kecamatan; ?></label></span>
                <h4 class="example-title">Edit Akun</h4>
                <div class="example">
                  
                  <form action="<?php echo base_url(). 'Ckecamatan/do_update'; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKecamatan">Kode Kecamatan</label>
                        <input type="text" class="form-control" id="inputBasicKodeKecamatan" value="<?php echo $kec->kode_kecamatan ?>" name="kode_kecamatan"
                         autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKecamatan">Nama Kecamatan</label>
                      <input type="text" class="form-control" id="inputBasicKecamatan" value="<?php echo $kec->nama_kecamatan ?>" name="nama_kecamatan"
                       autocomplete="off" />
                    </div>
                      <div class="form-group">
                     <label class="control-label" for="inputBasicisAktif">isAktif</label>
                      <input type="text" class="form-control" id="inputBasicisAktif" value="<?php echo $kec->isAktif ?>" name="isAktif"
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