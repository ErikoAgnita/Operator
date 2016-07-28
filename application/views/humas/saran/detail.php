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
                      <span class="notready"><?php echo $row->tanggal_saran;?></span>
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
                      <span class="notready"><?php echo $row->lampiran_saran;?></span>
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
              <button type="submit" class="btn btn-primary"><?php echo "Disposisi"; ?></button>
            </div>
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
                <form  action="
                <?php
                $isAktif = $row2->isAktif;
                if($isAktif== "0"){
                  echo base_url();?>crespon/publish/<?php echo $row2->id_respon;
                }
                else{
                  echo base_url();?>crespon/unpublish/<?php echo $row2->id_respon;
                }?>">
                <tr data-url="panel.tpl" data-toggle="slidePanel">
                  <td class="pre-cell"></td>
                  <td class="cell-60 responsive-hide">
                    <a>
                      <img class="img-responsive" src="<?php  echo base_url(); ?>assets/images/logo.png" alt="...">
                    </a>
                  </td>

                  <td>
                    <div class="content">
                      <div class="metas">
                        <span class="author"><?php echo $row2->id_skpd;?></span>
                      </div>
                      <?php 
                      if($row2->isi_respon){?>
                      <div class="metas">                        
                        <span class="started"><?php echo $row2->kategori;?></span>
                      </div>                      
                      <div class="metas">                        
                        <span class="tags"><?php echo $row2->tanggal_respon.' WIB';?></span>
                      </div>
                      <div class="title">
                        <?php echo $row2->isi_respon; ?>
                      </div>                                            
                      <div class="metas">                 
                        <span class="tags"><?php echo $row2->lampiran_respon;?></span>
                      </div>
                      <?php }
                      else{?>                                                                 
                      <div class="metas">                 
                        <span class="tags">(Belum ada Respon)</span>
                      </div>
                      <?php } ?>       
                    </div>
                    <!--<button type="submit" class="btn btn-primary">Publish</button> -->
                    <div class="form-group">
                      <?php
                      $isAktif = $row2->isAktif;
                      if($isAktif== "0"){
                        ?><button type="submit" class="btn btn-primary"><?php echo "Publish"; ?></button><?php
                      }
                      else{
                        ?><button type="submit" class="btn btn-primary"><?php echo "Unpublish"; ?></button><?php
                      }
                      ?>
                    </div>

                  </td>
                  <td class="cell-80 forum-posts">
                  </td>
                  <td class="suf-cell"></td>
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