<style type="text/css">
  strong { 
    color: black;
  }
</style>


  <!-- Page -->
<div class="page">
  <div class="page-content">
        <!-- <form role="form" method="POST" action="<?php echo base_url();?>csaran/search_saran/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari . . .">
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
     </form>
</br>
      <?php echo $this->session->flashdata('pesancari'); ?> -->
    <div class="panel">
      <header class="panel-heading">
        <div class="panel-actions"></div>
        <h3 class="panel-title">Daftar Respon Belum Dipublish</h3>
      </header>

    <!-- Forum Nav -->
      <div class="page-nav-tabs">
        <ul class="nav nav-tabs nav-tabs-line" data-plugin="nav-tabs" role="tablist">
        </ul>
      </div>

      <!-- Forum Content -->
      
      <div class="panel-body">
        <?php if($respon) { ?>
        <div class="page-content tab-content page-content-table nav-tabs-animate">        
          <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
            <table class="table is-indent">
              <tbody>
                <?php foreach ($respon as $row){?>
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
                          <strong><?php echo "<b>".$row->nama."</b>";?></strong>
                          <span class='text-muted pull-right'><?php echo "<i>".date("d M Y H:i:s",strtotime($row->tanggal_respon));?></i></span>
                        </span>
                      </div>
                      <div class="metas">
                        <span class="kategori">
                          <?php if($row->kategori){ echo "<b>Topik: ".$row->kategori."</b>"; } 
                                else { echo "<b>Kategori: - </b>"; }
                          ?>
                        </span>
                      </div>
                      <div class="metas">
                        <span class="tgl_disposisi">
                          <?php if($row->tanggal_disposisi){ echo "<b>Tanggal Disposisi: ".$row->tanggal_disposisi."</b>"; } 
                                else { echo "<b>Tanggal Disposisi: - </b>"; }
                          ?>
                        </span>
                      </div>
                      <div class="title">
                          <div style="width:90%;">
                            <?php                           
                            echo substr($row->isi_respon, 0,500); 
                            if(strlen($row->isi_respon) > 500){
                              echo '...';
                            }?>
                          </div>
                      </div>
                      <div class="title">
                        <a type="button" class="btn btn-round btn-info" href="<?php echo base_url(); ?>csaran/detail/<?php echo $row->id_saran;?>">Detail</a>
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
      <?php }
      else{ ?>
        <strong>(Tidak ada Respon)</strong>
      <?php } ?>
    </div>
  </div>
</div>
</div>