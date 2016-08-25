<style type="text/css">
  strong { 
    color: black;
  }
</style>

  <!-- Page -->
<div class="page">
  <div class="page-content">
        <form role="form" method="POST" action="<?php echo base_url();?>csaran/search_saran/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari . . .">
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
     </form>
</br>
      <?php echo $this->session->flashdata('pesancari'); ?>
    <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <h3 class="panel-title">Daftar Saran</h3>
      </header>

    <!-- Forum Nav -->
      <div class="page-nav-tabs">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        </ul>
      </div>

      <!-- Forum Content -->
      <div class="panel-body">
        <div class="page-content tab-content page-content-table nav-tabs-animate">
          <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
            <table class="table is-indent">
              <tbody>
                <?php foreach ($saran as $row){?>
                <tr data-url="panel.tpl" data-toggle="slidePanel">
                  <td class="cell-60 responsive-hide">
                    <a class="avatar" href="javascript:void(0)">
                      <img class='img-circle' src='<?php echo base_url(); ?>assets/images/comment.png' alt='masyarakat'>
                    </a>
                  </td>
                  <td>
                    <div>
                      <div class="metas">
                        <span class="username">
			  <strong><?php echo $row->nama;?></strong>
                          <span class="started">(<?php echo $row->alamat;?>)</span>
                          <span class='text-muted pull-right'><?php echo "<i>".date("d M Y H:i:s",strtotime($row->tanggal_saran));?> WIB</i></span>
                        </span>
                      </div>
                      
                      <!-- Belum bisa -->
                      <div class="metas">
                      <!--   <span class="disposisi">
                          <?php echo "<b>Disposisi Ke: </b>"; ?>
                        </span>
                      </div> -->

                      <div class="metas">
                        <span class="disposisi">
                          <?php
                          if($respon){
                            echo "<b>Disposisi ke: </b>";
                            $count=0;
                            foreach($respon as $res){
                              if($row->id_saran==$res->id_saran){
                                $count++;
                                if($count>1){
                                  echo ", ";
                                }                                
                                echo $res->kodeUnit;
                              }                              
                            }
                          }
                          else { echo "<b>Disposisi ke: - </b>"; 
                          } ?>
                        </span>
                      </div>

                      <div class="metas">
                        <span class="direspon">
                          <?php
                          if($balasan){
                            echo "<b>Direspon oleh: </b>";
                            $count=0;
                            foreach($balasan as $bls){
                              if($row->id_saran==$bls->id_saran){
                                $count++;
                                if($count>1){
                                  echo ", ";
                                }                                
                                echo $bls->kodeUnit;
                              }                              
                            }
                          }
                          else { echo "<b>Direspon oleh: - </b>"; 
                          } ?>
                        </span>
                      </div>
                      
                      <div class="metas">
                        <span class="topik">
                          <?php if($row->topik){ echo "<b>Topik: ".$row->topik."</b>"; } 
                                else { echo "<b>Topik: - </b>"; }
                          ?>
                        </span>
                      </div>
                      <div class="title">
                          <div>
                            <?php                           
                            echo substr($row->saran, 0,500); 
                            if(strlen($row->saran) > 500){
                              echo '...';
                            }?>
                          </div>
                      </div>
                      <div class="title"><br>
                        <a type="button" class="btn btn-round btn-info" href="<?php echo base_url(); ?>csaran/detail/<?php echo $row->id_saran;?>">Detail</a>
                        <div class="pull-right">
                            <div class="btn-group">
                                <?php 
                                    //$wrnB=$wrnD=$wrnR=$wrnP=$wrnS= "badge-default";
                                        if($row->isStatus=='laporan baru' and $row->isSpam==0 and $row->isAktif==0){
                                            $wrnB = "badge-warning";    $titleB = "Ada pesan baru";
                                            $wrnD = "badge-default";    $titleD = "Belum didisposisikan";
                                            $wrnR = "badge-default";    $titleR = "Belum ada respon";
                                            $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        else if($row->isStatus=='disposisi'and $row->isSpam==0){
                                            $wrnD = "badge-warning";    $titleD = "Sudah didisposisikan";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnR = "badge-default";    $titleR = "Belum ada respon dari SKPD";
                                            $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        else if($row->isStatus=='respon baru'and $row->isSpam==0){
                                            $wrnR = "badge-warning";    $titleR = "Ada respon dari SKPD";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnD = "badge-default";    $titleD = "Sudah didisposisikan";
                                            $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        if($row->isSpam==1 ){
                                            $wrnS = "badge-danger";     $titleS = "Pesan Spam";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnR = "badge-default";    $titleR = "Tidak ada respon dari SKPD";
                                            $wrnD = "badge-default";    $titleD = "Tidak didisposisikan";
                                            $wrnP = "badge-default";    $titleP = "Tidak dipublikasikan";
                                        }
                                        if($row->isAktif==1 && $row->isSpam==0){
                                                if ($row->isStatus=='disposisi'){
                                                  $wrnD = "badge-warning";    $titleD = "Sudah didisposisikan lagi";
                                                  $wrnR = "badge-default";    $titleR = "Belum ada respon dari SKPD";
                                                  $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                                }
                                                else if ($row->isStatus=='respon baru'){
                                                  $wrnD = "badge-default";    $titleD = "Sudah didisposisikan";
                                                  $wrnR = "badge-warning";    $titleR = "Ada respon dari SKPD";
                                                  $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                                }
                                                else{
                                                  $wrnB = "badge-info";    $titleB = "Pesan belum dibaca";
                                                  $wrnD = "badge-default";    $titleD = "Belum didisposisikan";
                                                  $wrnR = "badge-default";    $titleR = "Belum ada respon dari SKPD";
                                                }
                                            $wrnP = "badge-success";    $titleP = "Sudah dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                ?>
                                
                                <span class="badge badge-radius badge-lg <?php echo $wrnB; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleB; ?>"><i class="fa fa-envelope"></i></span>
                                <span class="badge badge-radius badge-lg <?php echo $wrnD; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleD; ?>"><i class="fa fa-tags"></i></span>
                                <span class="badge badge-radius badge-lg <?php echo $wrnR; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleR; ?>"><i class="fa fa-commenting"></i></span>
                                <span class="badge badge-radius badge-lg <?php echo $wrnP; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleP; ?>"><i class="fa fa-map-pin"></i></span>
                                <span class="badge badge-radius badge-lg <?php echo $wrnS; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleS; ?>"><i class="fa fa-ban"></i></span>


                    </div>
                            
                        </div>
                      </div>                        
                    </div>
                  </td>
                </tr>
                <?php }?>   
              </tbody>
            </table>
              <div class="pull-right">
                  <nav>           
                      <ul class="pagination">
                          <li> <?php echo $links; ?> </li>
                      </ul>
                  </nav>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
