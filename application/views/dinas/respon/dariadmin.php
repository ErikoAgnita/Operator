  <!-- Page -->
<div class="page">
  <div class="page-content">
    <form role="form" method="POST" action="<?php echo base_url();?>csaran/search_saranop/" >
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
                      <img class="img-responsive" src="<?php  echo base_url(); ?>assets/images/comment.png" alt="...">
                    </a>
                  </td>
                  <td>
                    <div>
                      <div class="metas">
                        <span class="username">
                          <span><?php echo $row->nama;?></span>
                          <span class="started">(<?php echo $row->alamat;?>)</span>
                          <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row->tanggal_saran));?> WIB</span>
                        </span>
                      </div>
                      <div class="title">
                           <span> Topik : <?php echo $row->topik;?></span>
                           <div class="title">
                              <div>
                                <?php                           
                                echo substr($row->saran, 0,500); 
                                if(strlen($row->saran) > 500){
                                  echo ' . . .';
                                }?>
                              </div>
                            </div>
                          <div class="title">
                            <a href="<?php echo base_url(); ?>crespon/respon/<?php echo $row->id_saran;?>">Detail</a>
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
