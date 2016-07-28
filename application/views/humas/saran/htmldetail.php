
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Detail Saran</h1>
      <ol class="breadcrumb">
        <li>Saran</li>
        <li>Detail</li>
      </ol>
    </div>
    <div class="page-content">
      <div class="panel">
        <div class="panel-body container-fluid">
          <div class="row row-lg">
            <div class="col-sm-6">
              <!-- Example Basic Form -->
              <div class="example-wrap">
                <h4 class="example-title">Detail Saran</h4>
                <div class="example">
                <?php foreach ($saran->result() as $row){?>
                  <form autocomplete="off" action="
                  <?php
                  $isStatus = $row->isStatus;
                  if($isStatus=='Laporan Baru'){
                    echo base_url();?>SaranController/disposisi/<?php echo $row->id_saran;
                  }
                  elseif($isStatus == 'Respon Baru'){
                    echo base_url();?>SaranController/publish/<?php echo $row->id_saran;
                  }?>" 
                  method="post">
                    <a href="<?php echo base_url(); ?>SaranController/ubah/<?php echo $row->id_saran;?>" class="btn btn-primary btn-rounded"><i class="icon-add position-left"></i>Ubah</a>
                    <a href="<?php echo base_url(); ?>SaranController/hapus/<?php echo $row->id_saran;?>" class="btn btn-primary btn-rounded"><i class="icon-add position-left"></i>Hapus</a>
                     <div class="form-group">      
                        <label class="control-label" for="inputBasicFirstName">Topik</label>
                        <input type="text" class="form-control" value="<?php echo $row->topik;?>" name="topik">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Nama</label>
                      <input type="text" class="form-control" value="<?php echo $row->nama;?>" name="nama">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicEmail">Alamat</label>
                      <input type="text" class="form-control" value="<?php echo $row->alamat;?>" name="alamat">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Email</label>
                      <input type="text" class="form-control" value="<?php echo $row->email;?>" name="email">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Telepon</label>
                      <input type="text" class="form-control" value="<?php echo $row->telepon;?>" name="telepon">
                    </div>                    
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">IP</label>
                      <input type="text" class="form-control" value="<?php echo $row->ip;?>" name="ip">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Host</label>
                      <input type="text" class="form-control" value="<?php echo $row->host;?>" name="host">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Saran</label>
                      <input type="text" class="form-control" value="<?php echo $row->saran;?>" name="saran">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Tanggal Saran</label>
                      <input type="text" class="form-control" value="<?php echo $row->tanggal_saran;?>" name="tanggal_saran">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Lampiran Saran</label>
                      <input type="text" class="form-control" value="<?php echo $row->lampiran_saran;?>" name="lampiran_saran">
                    </div>                    
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Spam</label>
                      <input type="text" class="form-control" value="<?php echo $row->isSpam;?>" name="isSpam">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Aktif</label>
                      <input type="text" class="form-control" value="<?php echo $row->isAktif;?>" name="isAktif">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Status Laporan</label>
                      <input type="text" class="form-control" value="
                      <?php 
                      $isStatus = $row->isStatus;
                      if($isStatus==0){
                        echo "Laporan Baru";
                      }
                      elseif($isStatus == 1){
                        echo "Telah Didisposisi";
                      }
                      elseif($isStatus == 2){
                        echo "Respon SKPD Masuk";
                      }
                      elseif($isStatus == 3){
                        echo "Respon dipublish";
                      }
                      ?>
                      " name="isStatus">
                    </div>
                      <!-- <input type="text" class="form-control" value="<?php echo $row->STATUS_LAPORAN;?>" name="status_laporan"> -->
                    <!--
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Respon Humas</label>
                      <input type="text" class="form-control" value="<?php echo $row->RESPON_HUMAS;?>" name="respon_humas">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputBasicPassword">Tanggal Disposisi</label>
                      <input type="text" class="form-control" value="<?php echo $row->TANGGAL_DISPOSISI;?>" name="tanggal_disposisi">
                    </div>-->                    
                    <div class="form-group">
                      <?php
                      $isStatus = $row->isStatus;
                      if($isStatus=='laporan baru'){
                        ?><button type="submit" class="btn btn-primary"><?php echo "Disposisi"; ?></button><?php
                      }
                      elseif($isStatus == 'Respon Masuk'){
                        ?><button type="submit" class="btn btn-primary"><?php echo "Publish"; ?></button><?php
                      }
                      ?>
                      <!-- <button type="submit" class="btn btn-primary">Ubah</button> -->
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