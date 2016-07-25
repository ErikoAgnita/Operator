  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Ubah Data Saran</h1>
      <ol class="breadcrumb">
        <li>Saran</li>
        <li>Ubah</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Ubah Data Saran</h4>
                <div class="example">
                  <?php foreach ($saran->result() as $row){?>
                  <form autocomplete="off" action="<?php echo base_url();?>SaranController/update/<?php echo $row->ID_SARAN;?>" method="post">
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Respon Humas</label>
                      <input type="text" class="form-control" value="<?php echo $row->RESPON_HUMAS;?>" name="respon_humas">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                    <?php } ?>
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