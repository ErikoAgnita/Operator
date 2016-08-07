 <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Kecamatan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kecamatan</li>
        <li>Tambah Kecamatan</li>
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
                  <form action="<?php echo base_url()?>Ckecamatan/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKecamatan">Kode Kecamatan</label>
                        <input type="text" class="form-control" id="inputBasicKodeKecamatan" name="kode_kecamatan"
                        placeholder="argomulyo" autocomplete="off" />
                    </div>
                    <?php
                      echo form_error('kode_kecamatan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKecamatan">Nama Kecamatan</label>
                      <input type="text" class="form-control" id="inputBasicKecamatan" name="nama_kecamatan"
                       placeholder="KECAMATAN ARGOMULYO" autocomplete="off" />
                    </div>
                    <?php
                      echo form_error('nama_kecamatan','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                      ?>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
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