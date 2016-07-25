  
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Disposisi Saran</h1>
      <ol class="breadcrumb">
        <li>Saran</li>
        <li>Disposisi</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Disposisi Saran</h4>
                <div class="example">
                  <form autocomplete="off"  action="<?php echo base_url();?>SaranController/disposisikan/<?php echo $row->ID_SARAN;?>" method="post">
                    <div class="form-group">
                      <label >Dinas</label>
                      <div >
                        <select class="form-control" name="id_admin" required="off">
                          <option value="">Pilih Dinas</option>
                          <?php
                            foreach ($admin->result() as $row) {
                              echo "<option value='".$row->ID_ADMIN."'>".$row->NAMA_DINAS."</option>";
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                        <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                      </div>
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