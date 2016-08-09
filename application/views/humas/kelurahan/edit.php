<!-- Page -->
  <div class="page">
    <div class="page-header">
      <?php foreach($kelurahan as $kel){ ?>
      <h1 class="page-title">Kecamatan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kecamatan</li>
        <li>Edit Data Kecamatan</li>
        <li><small><?php echo $kel->nama_kelurahan; ?></small></li>
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
                  <form action="<?php echo base_url(). 'Ckelurahan/do_update/'.$kel->kode_kelurahan; ?>" method="post" autocomplete="off">
                    
                    <div class="form-group">
                        <label class="control-label" for="inputBasicLevel">Kecamatan</label>
                        <div>
                          <select class="form-control" name="kode_kecamatan" required="off">
                            <?php  foreach ($data_kecamatan->result() as $row){ 
                                if($row->kode_kecamatan == $kel->kode_kecamatan){
                                  echo "<option value='".$row->kode_kecamatan."'>".$row->nama_kecamatan."</option>";
                                }
                             }foreach ($data_kecamatan->result() as $row){ 
                                  echo "<option value='".$row->kode_kecamatan."'>".$row->nama_kecamatan."</option>";
                             }?>
                          </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKelurahan">Kode Kelurahan</label>
                        <input type="text" class="form-control" id="inputBasicKodeKelurahan" value="<?php echo $kel->kode_kelurahan ?>" name="kode_kelurahan"
                         autocomplete="off" />
                    </div>
                    <?php
                      echo form_error('kode_kelurahan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicKelurahan<">Nama Kelurahan</label>
                      <input type="text" class="form-control" id="inputBasicKelurahan<" value="<?php echo $kel->nama_kelurahan ?>" name="nama_kelurahan"
                       autocomplete="off" />
                    </div>
                    <?php
                      echo form_error('nama_kelurahan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                            <?php if($kel->isAktif == '1'){
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
                          </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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