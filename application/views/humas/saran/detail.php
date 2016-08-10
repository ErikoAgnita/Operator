<style type="text/css">
  strong { 
    color: black;
  }
</style>

<div class="page">
<div class="page-content">
    <div class="panel">
      <header class="panel-heading">
        <h3 class="panel-title">Detail Saran</h3>
      </header>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="editableUser">
            <tbody>
              <?php foreach ($saran->result() as $row){?>
              <form autocomplete="off" action="<?php echo base_url();?>csaran/disposisi/<?php echo $row->id_saran;?>" method="post">
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
                        echo "<img width=600 height=600 class='img-responsive pad' src='".base_url()."uploads/saran/".$row->lampiran_saran."' 
                        alt='Photo'> <?php ";
                      } ?>
                    </span>
                  </td>
                </tr>
                <tr>
                  <td>Spam</td>
                  <td>
                    <span class="notready"><?php 
                      if($row->isSpam==TRUE){
                        echo "<span class=\"label label-danger label-lg\">Spam</span>";
                      }
                      else{
                        echo "<span class=\"label label-success label-lg\">Bukan Spam</span>";
                      }
                    ?></span>
                  </td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>
                    <span class="notready"><?php 
                      if($row->isAktif==1 && $row->isSpam == 0){
                        echo "<span class=\"label label-info label-lg\">Sudah dipublikasikan</span>";
                      }
                      else{
                        echo "<span class=\"label label-default label-lg\">Belum dipublikasikan</span>";
                      }
                    ?></span>
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
            <span><button type="submit" class="btn btn-warning" name="btn" value="disposisi"><i class="icon wb-tag"></i><?php echo " Disposisi"; ?></button></span>
              <?php if($row->isSpam == 1){
                      $valspam = "Bukan Spam";
                      $icospam = "icon wb-check";
                  }
                  else {
                      $valspam = "Spam";
                      $icospam = "icon wb-close";
                  }

                  if($row->isAktif == TRUE){
                      $valtif = "Non-Aktif";
                      $icotif = "icon wb-bookmark";
                  }
                  else {
                      $valtif = "Aktif";
                      $icotif = "icon wb-flag";                        
                  }
              ?>
              <span><button type="submit" class="btn btn-success" name="btn" value="<?php echo $valspam;?>"><i class="<?php echo $icospam; ?>"></i><?php echo " ".$valspam; ?></button></span>
              <span><button type="submit" class="btn btn-primary" name="btn" value="<?php echo $valtif;?>"><i class="<?php echo $icotif; ?>"></i><?php echo " ".$valtif; ?></button></span>
              <span><button type="submit" class="btn btn-danger" name="btn" value="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus?')"><i class="icon wb-trash"></i> Hapus</button></span>             
        </form>
          <span><a  type="button" class="btn btn-default active" onclick="window.open('<?php echo base_url();?>csaran/cetak/<?php echo $row->id_saran;?>')"><i class="icon wb-print"></i> Cetak</a></span> 
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
                                echo "<img width=600 height=600 class='img-responsive pad' src='".base_url()."uploads/respon/".$row2->lampiran_respon."' 
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
                      <?php 
                          if($row2->isAktif == "0"){
                                $val = "Publish";
                                $ico = "icon wb-check";
                            }
                            else {
                                $val = "Unpublish";
                                $ico = "icon wb-close";
                            }
                      ?>
                    <div class="form-group">
                      <span><button type="submit" class="btn btn-success" name="btn2" value="<?php echo $val;?>"><i class="<?php echo $ico; ?>"></i><?php echo " ".$val?></button></span>
                      <span><button type="submit" class="btn btn-danger" name="btn2" value="hapus" onclick="return confirm('Apakah Anda yakin akan menghapus?')"><i class="icon wb-trash"></i><?php echo " Hapus"; ?></button></span>
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
</div>