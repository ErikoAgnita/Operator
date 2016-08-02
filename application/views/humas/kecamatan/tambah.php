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
                <h4 class="example-title">Tambah Kecamatan</h4>
                <div class="example">
                  <form action="<?php echo base_url()?>Ckecamatan/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">

                    <div class="form-group">
                        <label class="control-label" for="inputBasicKodeKecamatan">Kode Kecamatan</label>
                        <input type="text" class="form-control" id="inputBasicKodeKecamatan" name="kode_kecamatan"
                        placeholder="KEC001" autocomplete="off" />
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="inputBasicKecamatan">Nama Kecamatan</label>
                      <input type="text" class="form-control" id="inputBasicKecamatan" name="nama_kecamatan"
                       placeholder="KECAMATAN ARGOMULYO" autocomplete="off" />
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