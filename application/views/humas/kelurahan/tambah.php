 <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Kelurahan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kelurahan</li>
        <li>Tambah Kelurahan</li>
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
                  <form action="<?php echo base_url()?>Ckelurahan/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKecamatan">Kecamatan<span style="color:red">*</span></label>
                        <div>
                          <select class="form-control" name="kode_kecamatan" required="off">
                            <option value="disabled selected">-Pilih Kecamatan-</option>
                            <?php  foreach ($data_kecamatan->result() as $row){
                              echo "<option value='".$row->kode_kecamatan."'>".$row->nama_kecamatan."</option>";                              
                            }?>
                          </select>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKelurahan">Kode Kelurahan<span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputBasicKodeKelurahan" name="kode_kelurahan"
                        value="<?php echo set_value('kode_kelurahan'); ?>" placeholder="ledok" autocomplete="off" />
                    </div>
                    <?php
                      echo form_error('kode_kelurahan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKecamatan">Nama Kelurahan<span style="color:red">*</span></label>
                      <input type="text" class="form-control" id="inputBasicKecamatan" name="nama_kelurahan"
                       value="<?php echo set_value('nama_kelurahan'); ?>" placeholder="KELURAHAN LEDOK" autocomplete="off" />
                    </div>
                    <?php
                      echo form_error('nama_kelurahan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                    </div>
                     <div class="input-group">
                            <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                            <label></label>
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