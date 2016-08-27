Page -->
  <div class="page">
     <div class="page-content">
      <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <h3 class="panel-title">Ubah Respon</h3>
      </header>

      <div class="page-nav-tabs">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        </ul>
      </div>
        <div class="panel-body container-fluid">
            <div class="col-sm-12">
              <!-- Example Basic Form -->
              <div class="example-wrap">  
                <div class="example">
                <?php 
                foreach ($respon->result() as $res) { ?>
                  <form action="<?php echo base_url().'crespon/ubah_respon/'.$res->id_respon; ?>" method="post" autocomplete="off">

                  <?php 
                  foreach ($saran->result() as $row) { ?>
                    <div class="form-group">
                      <label class="control-label" for="">Nama Pelapor</label>
                      <input type="text" class="form-control" id="" value="<?php echo $row->nama; ?>" name="nama" autocomplete="off" readonly="true">
                    </div>

                    <!-- <div class="form-group">
                      <label class="control-label" for="">Alamat</label>
                      <input type="text" class="form-control" id="" value="<?php echo $row->alamat; ?>" name="nama" autocomplete="off" readonly="true"/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="">Tanggal</label>
                      <input type="text" class="form-control" id="" value="<?php echo $row->tanggal_saran; ?>" name="nama" autocomplete="off" readonly="true"/>
                    </div> -->                  

                    <?php
                      echo "<div class='form-group'>";
                      echo form_label('Isi Saran');
                      $data_saran = array(
                        'name' => 'saran',
                        'rows' => '10',
                        'cols' => '100',                            
                        'id' => 'saran_id',
                        'class' => 'form-control',
                        'value' => $row->saran,
                        'readonly' => true,
                        );
                      echo form_textarea($data_saran);

                      echo form_hidden('id_saran', $row->id_saran);
                    }
                    ?>
                  </div>

                  <?php
                    echo "<div class='form-group'>";
                    echo form_label('Isi Respon'); echo "<span style='color:red'>*</span>";
		    echo form_error('isi_respon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                    $data_respon = array(
                      'name' => 'isi_respon',
                      'rows' => '10',
                      'cols' => '100',                            
                      'id' => 'respon_id',
                      'class' => 'form-control',
                      'value' => $res->isi_respon,
                      );
                    echo form_textarea($data_respon);
                  }
                  ?>
                  </div>


                  <div class="form-group">
                    <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                  </div>
                  <div class="input-group">
                    <label class="control-label" style="color:red;"><small>*harus diisi</small></label>
                    <label></label>
                </div>
                </form>
                <?php ?>
                </div>
              </div>
              <!-- End Example Basic Form -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Page