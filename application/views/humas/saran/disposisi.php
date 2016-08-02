  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
   
  <!-- Include the plugin's CSS and JS: -->
  <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>


  <script type="text/javascript">
      $(document).ready(function() {
          $('#clist').multiselect();
      });
  </script>

  <div class="page">
    <div class="page-header">
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Disposisi Saran</h4>
                <p><?php echo $this->session->flashdata('message');?></p>
                <div class="example">
                  <form autocomplete="off" action="<?php echo base_url();?>SaranController/disposisikan/<?php echo $id_saran;?>" method="post">
                    
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Topik</label>
                      <?php
                      foreach ($saran->result() as $row) {?>
                      <input type="text" class="form-control" value="<?php echo $row->topik;?>" name="topik">
                      <?php } ?>  
                    </div>

                    <div class="form-group">
                      <label >SKPD</label>
                      <div>
                        <select class="form-control" name="id_skpd[]" required="off" multiple="multiple" id="clist">
                          <option value="" disabled="disabled" selected="selected">Pilih SKPD</option>
                          <?php
                            foreach ($skpd->result() as $row) {
                              echo "<option value='".$row->id_skpd."' type='checkboxes'>".$row->nama."</option>"; 
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                      <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
                    </div>
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