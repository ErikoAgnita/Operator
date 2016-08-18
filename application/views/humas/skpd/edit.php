  <!-- Page -->
  <div class="page">
      <?php foreach($skpd as $s){ ?>
    <div class="page-header">
      <h1 class="page-title">Satuan Kerja Perangkat Daerah (SKPD)</h1>
      <ol class="breadcrumb">
        <li>SKPD</li>
        <li>Edit Data SKPD</li>
        <li><small><?php echo $s->nama; ?></small></li>
      </ol>
    </div>
     <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
            <!-- Example Basic Form -->
            <div class="example-wrap">
                <div class="example">
                    <form action="<?php echo base_url(). 'Cskpd/do_update'; ?>" method="post" autocomplete="off">
          <div class="row row-lg">
            <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeUnit">Kode Unit<span style="color:red">*</span></label>
                        <input type="hidden" name="id_skpd" value="<?php echo $s->id_skpd ?>">
                        <input type="text" class="form-control" id="inputBasicKodeUnit" value="<?php echo $s->kodeUnit ?>" name="kodeUnit"
                         autocomplete="off" />
                         <?php
                          echo form_error('kodeUnit','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                          ?>
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicBagian">Bagian</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $s->bagian ?>" name="bagian"
                       autocomplete="off" />
                        <?php
                        echo form_error('bagian','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                        ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicNama">Nama SKPD<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="inputBasicNama" value="<?php echo $s->nama ?>" name="nama"
                       autocomplete="off" />
                       <?php
                        echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                        ?>
                    </div>
                      <div class="form-group">
                      <label class="control-label" for="inputBasicAlamat">Alamat</label>
                      <input type="text" class="form-control" id="inputBasicAlamat" value="<?php echo $s->alamat ?>" name="alamat"
                       autocomplete="off" />
                       <?php
                         echo form_error('alamat','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                        ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicTelepon">Telepon</label>
                      <input type="text" class="form-control" id="inputBasicTelepon" value="<?php echo $s->telepon ?>" name="telepon"
                       autocomplete="off" />
                       <?php
                         echo form_error('telepon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                        ?>
                    </div>

                    
            </div>
              <div class="col-sm-6">
                    <div class="form-group">
                      <label class="control-label" for="inputBasicFax">Fax</label>
                      <input type="text" class="form-control" id="inputBasicFax" value="<?php echo $s->fax ?>" name="fax"
                       autocomplete="off" />
                       <?php
                        echo form_error('fax','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                         ?>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Email</label>
                      <input type="email" class="form-control" id="inputBasicEmail" value="<?php echo $s->email ?>" name="email"
                        autocomplete="off" />
                        <?php
                        echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                        ?>
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicWebsite">Website</label>
                      <input type="text" class="form-control" id="inputBasicWebsite" value="<?php echo $s->website ?>" name="website"
                       autocomplete="off" />
                       <?php
                        echo form_error('website','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                        ?>
                    </div>
                    
                  <div class="row">
                      <div class="col-sm-6">
                      
                        <div class="form-group">
                            <?php if($s->isAktif == '1'){
                                        $cekA = "checked";
                                        $cekP = "";
                                    }
                                     else {$cekP = "checked";
                                           $cekA = "";
                                          }
                            ?>
                          <label class="control-label" for="inputBasicisAktif">Status</label>
                          <div class="radio-custom radio-primary">
                              <input type="radio" id="inputRadios1" name="isAktif" value="1" <?php echo $cekA; ?>/>
                              <label for="inputRadios1">Aktif</label>
                            </div>
                            <div class="radio-custom radio-primary">
                              <input type="radio" id="inputRadios1" name="isAktif" value="0" <?php echo $cekP; ?> />
                              <label for="inputRadios1">Pasif</label>
                            </div>
                        </div>
                          </div>
                  </div>
                <div class="input-group">
                            <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                            <label></label>
                        </div>
                    <div class="form-group">
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                        </div>
                    </div>
            </div>
          </div>
                    </form>
        </div>
      </div>
            </div>
              </div>
              <!-- End Example Basic Form -->
    </div>
      <?php } ?>
  </div>
  <!-- End Page -->