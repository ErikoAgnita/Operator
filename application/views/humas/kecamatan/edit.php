<!-- Page -->
  <div class="page">
    <div class="page-header">
      <?php foreach($kecamatan as $kec){ ?> 
      <h1 class="page-title">Kecamatan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kecamatan</li>
        <li>Edit Data Kecamatan</li>
        <li><small><?php echo $kec->nama_kecamatan; ?></small></li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <div class="example">
                  
                  <form action="<?php echo base_url(). 'Ckecamatan/do_update/'.$kec->kode_kecamatan; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKecamatan">Kode Kecamatan<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputBasicKodeKecamatan" value="<?php echo $kec->kode_kecamatan ?>" name="kode_kecamatan"
                         autocomplete="off" />
                      <?php
                      echo form_error('kode_kecamatan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKecamatan">Nama Kecamatan<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="inputBasicKecamatan" value="<?php echo $kec->nama_kecamatan ?>" name="nama_kecamatan"
                       autocomplete="off" />
                      <?php
                      echo form_error('nama_kecamatan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    </div>
                      <div class="form-group">
                            <?php if($kec->isAktif == '1'){
                                        $cekA = "checked";
                                        $cekP = "";
                                    }
                                     else {$cekP = "checked";
                                           $cekA = "";
                                          }
                            ?>
                          <label class="control-label" for="inputBasicisAktif">isAktif</label>
                          <div class="radio-custom radio-primary">
                              <input type="radio" id="inputRadios1" name="isAktif" value="1" <?php echo $cekA; ?>/>
                              <label for="inputRadios1">Aktif</label>
                            </div>
                            <div class="radio-custom radio-primary">
                              <input type="radio" id="inputRadios1" name="isAktif" value="0" <?php echo $cekP; ?> />
                              <label for="inputRadios1">Pasif</label>
                            </div>
                        </div>
                    <div class="form-group">
                     <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                    </div>
                     <div class="input-group">
                            <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                            <label></label>
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