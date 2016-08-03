  <!-- Page -->
<div class="page">
  <div class="page-content">
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
                          <div style="width:80%;">
                            <?php                           
                            echo substr($row->saran, 0,250); 
                            if(strlen($row->saran) > 250){
                              echo '...';
                            }?>
                          </div>
                      </div>
                      <div class="title">
                        <a type="button" href="<?php echo base_url(); ?>SaranController/detail/<?php echo $row->id_saran;?>">Detail</a>
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
