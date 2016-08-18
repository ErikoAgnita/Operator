  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css"/>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
   
  <!-- Include the plugin's CSS and JS: -->
  <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css"/>

    <div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
    <div class="page-content">
      <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <h3 class="panel-title">Disposisi Saran</h3>
      </header>

      <div class="page-nav-tabs">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        </ul>
      </div>

      <div class="panel-body">
        <div class="page-content tab-content page-content-table nav-tabs-animate">
          <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
            <table class="table is-indent" style="background-color:#e6f2ff">              
              <div class="col-sm-12">
              <?php foreach ($saran->result() as $row){?>
              <tr data-url="panel.tpl" data-toggle="slidePanel">
                <td>
                  <div>
                    <div class="metas">
                      <span class="username">
                        <?php echo "<b>".$row->nama."</b>";?>
                        <span class="started">(<?php echo $row->alamat;?>)</span>
                        <span class='text-muted pull-right'><?php echo "<i>".date("d M Y H:i:s",strtotime($row->tanggal_saran));?> WIB</i></span>
                      </span>
                    </div>
                    <div class="title">
                        <div><?php echo $row->saran;?></div>
                    </div>
                  </div>                          
                </td>
              </tr>
              <?php }?>   
              </div>              
            </table>
            <!-- <div class="panel-body container-fluid">
              <div class="row row-lg"> -->
                <!-- <div class="col-sm-12"> -->
                  <!-- Example Basic Form -->
              <div class="example-wrap">
                <p><?php echo $this->session->flashdata('message');?></p>
                <div class="example">

                  <form autocomplete="off" action="<?php echo base_url();?>csaran/disposisikan/<?php echo $id_saran;?>" method="post">

                  <div class="col-sm-12">
                    <div class="col-sm-6">
                    <?php
                    foreach ($saran->result() as $row) {
                      echo "<div class='form-group'>";
                      echo form_label('Topik'); echo "<span style='color:red'>*</span>";
                      echo form_error('topik');
                      $data_topik = array(
                        'name' => 'topik',
                        'rows' => 2,
                        'cols' => 100,                            
                        'id' => 'topik_id',
                        'class' => 'form-control',
                        'value' => $row->topik,
                        );
                        echo form_textarea($data_topik);
                      }
                    echo "</div>";
                    ?>
                    <div class="col-sm-6"></div>
                  </div>
                    
                    <div class="col-sm-12">
                      <div class="form-group">
                        <div class="col-sm-6">                                            
                        <?php 
                          echo form_label('PILIH SKPD'); echo "<span style='color:red'>*</span>";                          
                          echo form_error('id_skpd');
                        echo "</div>";
                        echo "<div class='col-sm-12'>";
                          foreach($skpd->result() as $row2){
                            echo "<div class='col-sm-3'>";
                            $data_checkbox = array(
                              'name' => 'id_skpd[]',
                              'id' => $row2->id_skpd,
                              'value' => $row2->id_skpd,
                              );
                            echo "<div id = \"checkbox_list\">";
                            echo form_checkbox($data_checkbox);
                            echo form_label($row2->kodeUnit);
                            echo "</div>";
                        echo "</div>";
                          }
                        ?>                      
                    </div>
                  </div>             

                  <div class="col-sm-12">
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary"><?php echo "Kirim"; ?></button>
                    </div>
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