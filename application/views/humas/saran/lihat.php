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
                          <?php echo "<b>".$row->nama."</b>";?>
                          <span class="started">(<?php echo $row->alamat;?>)</span>
                          <span class='text-muted pull-right'><?php echo "<i>".date("d M Y H:i:s",strtotime($row->tanggal_saran));?> WIB</i></span>
                        </span>
                      </div>
                      <div class="title">
                          <div style="width:90%;">
                            <?php                           
                            echo substr($row->saran, 0,500); 
                            if(strlen($row->saran) > 500){
                              echo '...';
                            }?>
                          </div>
                      </div>
                      <div class="title">
                        <a type="button" href="<?php echo base_url(); ?>csaran/detail/<?php echo $row->id_saran;?>">Detail</a>
                        <div class="pull-right">
                            <div class="btn-group">
                                <?php 
                                        if($row->isStatus=='laporan baru'){
                                            $wrnB = "badge-warning";       $titleB = "Ada pesan baru";
                                            $wrnD = "badge-default";    $titleD = "Belum didisposisikan";
                                            $wrnR = "badge-default";    $titleR = "Belum ada respon";
                                            $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        else if($row->isStatus=='disposisi'){
                                            $wrnD = "badge-warning";       $titleD = "Sudah didisposisikan";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnR = "badge-default";    $titleR = "Belum ada respon dari SKPD";
                                            $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        else if($row->isStatus=='respon baru'){
                                            $wrnR = "badge-warning";       $titleR = "Ada respon dari SKPD";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnD = "badge-default";    $titleD = "Sudah didisposisikan";
                                            $wrnP = "badge-default";    $titleP = "Belum dipublikasikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        if($row->isAktif==1 && $row->isSpam==0){
                                            $wrnP = "badge-success";    $titleP = "Sudah dipublikasikan";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnR = "badge-default";    $titleR = "Ada respon dari SKPD";
                                            $wrnD = "badge-default";    $titleD = "Sudah didisposisikan";
                                            $wrnS = "badge-default";    $titleS = "Bukan Spam";
                                        }
                                        if($row->isSpam==1){
                                            $wrnS = "badge-danger";     $titleS = "Pesan Spam";
                                            $wrnB = "badge-default";    $titleB = "Pesan sudah dibaca";
                                            $wrnR = "badge-default";    $titleR = "Tidak ada respon dari SKPD";
                                            $wrnD = "badge-default";    $titleD = "Tidak didisposisikan";
                                            $wrnP = "badge-default";    $titleP = "Tidak dipublikasikan";
                                        }
                                ?>
                                <span class="badge badge-radius <?php echo $wrnB; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleB; ?>">&#9679;</span>
                                <span class="badge badge-radius <?php echo $wrnD; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleD; ?>">&#9679;</span>
                                <span class="badge badge-radius <?php echo $wrnR; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleR; ?>">&#9679;</span>
                                <span class="badge badge-radius <?php echo $wrnP; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleP; ?>">&#9679;</span>
                                <span class="badge badge-radius <?php echo $wrnS; ?>" data-toggle="tooltip" data-original-title="<?php echo $titleS; ?>">&#9679;</span>

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
