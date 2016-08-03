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
                 <?php foreach($kelurahan as $kel){ ?>

                 <div class='user-block'>
                  <img src='<?php echo base_url(); ?>assets/images/logo.png' alt='logo' width="42" height="50">
                  <span class='username'><h4><label><?php echo $kel->nama_kelurahan; ?></label></h4></span>
                 </div>
                 <br>
                  <h4 class="example-title"><b>Edit Akun</b></h4>     
                <div class="example">
                  <form action="<?php echo base_url(). 'Ckelurahan/do_update'; ?>" method="post" autocomplete="off">
                    
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
                        <label class="control-label" for="inputBasicKodeKelurahan<">Kode Kelurahan</label>
                        <input type="text" class="form-control" id="inputBasicKodeKecamatan" value="<?php echo $kel->kode_kelurahan ?>" name="kode_kelurahan"
                         autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKelurahan<">Nama Kelurahan</label>
                      <input type="text" class="form-control" id="inputBasicKelurahan<" value="<?php echo $kel->nama_kelurahan ?>" name="nama_kelurahan"
                       autocomplete="off" />
                    </div>
                      <div class="form-group">
                     <label class="control-label" for="inputBasicisAktif">isAktif</label>
                      <input type="text" class="form-control" id="inputBasicisAktif" value="<?php echo $kel->isAktif ?>" name="isAktif"
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