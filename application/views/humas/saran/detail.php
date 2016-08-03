<style type="text/css">
  strong { 
    color: black;
  }
</style>

<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-content">
    <!-- Panel X-Editable -->
    <div class="panel">
      <header class="panel-heading">
        <h3 class="panel-title">Detail Saran</h3>
      </header>
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="editableUser">
              <tbody>
                <?php foreach ($saran->result() as $row){?>
                <form autocomplete="off" action="<?php echo base_url();?>SaranController/disposisi/<?php echo $row->id_saran;?>" method="post">
                  <tr>
                    <td>Nama</td>
                    <td>
                      <span class="notready"><?php echo $row->nama;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>
                      <span class="notready"><?php echo $row->alamat;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>
                      <span class="notready"><?php echo $row->email;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Telepon</td>
                    <td>
                      <span class="notready"><?php echo $row->telepon;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>IP</td>
                    <td>
                      <span class="notready"><?php echo $row->ip;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Host</td>
                    <td>
                      <span class="notready"><?php echo $row->host;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Saran</td>
                    <td>
                      <span class="notready"><?php echo $row->tanggal_saran;?> WIB</span>
                    </td>
                  </tr>
                  <tr>
                    <td style="width:20%">Topik</td>
                    <td>
                      <span class="notready"><?php echo $row->topik;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Saran</td>
                    <td>
                      <span class="notready"><?php echo $row->saran;?></span>
                    </td>
                  </tr>                
                  <tr>
                    <td>Lampiran Saran</td>
                    <td>                    
                      <span class="notready">
                        <?php if($row->lampiran_saran!=NULL){
                          echo "<img class='img-responsive pad' src='".base_url()."uploads/saran/".$row->lampiran_saran."' 
                          alt='Photo'> <?php ";
                        } ?>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Spam</td>
                    <td>
                      <span class="notready"><?php echo $row->isSpam;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Aktif</td>
                    <td>
                      <span class="notready"><?php echo $row->isAktif;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Status</td>
                    <td>
                      <span class="notready"><?php echo $row->isStatus;?></span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="form-group">
              <span><button type="submit" class="btn btn-primary" name="btn" value="disposisi"><?php echo "Disposisi"; ?></button></span>
              <span><button type="submit" class="btn btn-primary" name="btn"
              <?php 
              if($row->isSpam == "0"){
                echo "value = 'publish'>";
                echo "Publish";
              }
              else{
                echo "value = 'unpublish'>";
                echo "Unpublish";
              }?></button></span>

              <span><button type="submit" class="btn btn-primary" name="btn"
              <?php 
              if($row->isAktif == "0"){
                echo "value = 'aktif'>";
                echo "Aktif";
              }
              else{
                echo "value = 'nonaktif'>";
                echo "Nonaktif";
              }?></button></span>
            </form>
          </div>
      </div>
      
      <header class="panel-heading">
        <h3 class="panel-title">Respon SKPD</h3>
      </header>
      <div class="page-content tab-content page-content-table nav-tabs-animate">
        <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
          <table class="table is-indent">          
            <tbody>
              <?php foreach ($respon->result() as $row2){?>
                <form autocomplete="off" action="<?php echo base_url();?>crespon/publish/<?php echo $row2->id_respon;?>" method="post">
                <tr data-url="panel.tpl" data-toggle="slidePanel">
                  <td class="cell-60 responsive-hide">
                    <a>
                      <img class="" width="50px" src="<?php  echo base_url(); ?>assets/images/logo.png" alt="...">
                    </a>
                  </td>
                  <td>
                    <div>
                      <div class="metas">
                        <span class="username">
                          <strong><?php echo $row2->nama;?></strong>
                          <?php 
                          if($row2->isi_respon){?>
                            <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row2->tanggal_respon));?> WIB</span> 
                          <?php } ?>
                        </span>
                      </div>
                      <?php 
                      if($row2->isi_respon){?>
                        <div class="metas">                        
                          <span class="started"><?php echo $row2->kategori;?></span>
                        </div>
                        <div class="title">
                          <?php echo $row2->isi_respon; ?>
                        </div>
                        <?php if($row2->lampiran_respon){?>
                          <div class="metas">                 
                            <span class="tags">
                              <?php if($row->lampiran_saran!=NULL){
                                echo "<img class='img-responsive pad' src='".base_url()."uploads/respon/".$row2->lampiran_respon."' 
                                alt='Photo'> <?php ";
                              } ?>
                            </span>
                          </div>
                        <?php } ?>
                      <?php }
                      else{?>                                                                 
                        <div class="metas">                 
                          <span class="tags">(Belum ada Respon)</span>
                        </div>
                      <?php } ?>       
                    </div>
                    <div class="form-group">
                      <input type="hidden" value="<?php echo $row2->id_saran ?>" name="id_saran"/>
                    </div>
                    <div class="form-group">
                      <span><button type="submit" class="btn btn-primary" name="btn2"
                      <?php 
                      if($row2->isAktif == "0"){
                        echo "value = 'publish'>";
                        echo "Publish";
                      }
                      else{
                        echo "value = 'unpublish'>";
                        echo "Unpublish";
                      }?></button></span>
                    </div>
                </tr>
                </form>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>