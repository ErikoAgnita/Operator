  <div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
    <div class="page-header">
      <h1 class="page-title">Detail Saran</h1>
      <ol class="breadcrumb">
        <li><a href="../index.html">Saran</a></li>
        <li class="active">Detail</li>
      </ol>
    </div>
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
                <form autocomplete="off" action="
                  <?php
                  $isStatus = $row->isStatus;
                  if($isStatus=='laporan baru' or $isStatus=='disposisi' or $isStatus=='publish'){
                    echo base_url();?>SaranController/disposisi/<?php echo $row->id_saran;
                  }
                  elseif($isStatus == 'respon baru'){
                    echo base_url();?>SaranController/nonAktif/<?php echo $row->id_saran;
                  }?>" 
                  method="post">
                  <tr>
                    <td style="width:20%">Topik</td>
                    <td>
                      <span class="notready"><?php echo $row->topik;?></span>
                    </td>
                  </tr>
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
              <?php
              $isStatus = $row->isStatus;
              if($isStatus=='laporan baru' or $isStatus=='disposisi' or $isStatus='publish'){
                ?><button type="submit" class="btn btn-primary"><?php echo "Disposisi"; ?></button><?php
              }
              elseif($isStatus == 'respon baru'){
                ?><button type="submit" class="btn btn-primary"><?php echo "Publish"; ?></button><?php
              }
              ?>
            </div>
          </div>

      
                      
          <div class="table-responsive">
          <header class="panel-heading">
            <h3 class="panel-title">Respon</h3>
          </header>
          <?php foreach ($respon->result() as $row2){?>
            <table class="table table-bordered table-striped" id="editableUser">
              <tbody>                
                <form autocomplete="off" action="" method="post">
                  <tr>
                    <td style="width:20%">SKPD</td>
                    <td>
                      <span class="notready"><?php echo $row2->id_skpd;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Kategori</td>
                    <td>
                      <span class="notready"><?php echo $row2->kategori;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Respon</td>
                    <td>
                      <span class="notready"><?php echo $row2->isi_respon;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Lampiran Respon</td>
                    <td>
                      <span class="notready"><?php echo $row2->lampiran_respon;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Tanggal Respon</td>
                    <td>
                      <span class="notready"><?php echo $row2->tanggal_respon;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>isAktif</td>
                    <td>
                      <span class="notready"><?php echo $row2->isAktif;?></span>
                    </td>
                  </tr>
                </form>                
              </tbody>
            </table>
            <?php } ?>
          </div>
      </div>
      <!-- End Panel X-Editable -->

    </div>
  </div>
  <script src="../../global/vendor/jquery/jquery.min.js"></script>
  <script src="../../global/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../../global/vendor/animsition/animsition.min.js"></script>
  <script src="../../global/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="../../global/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="../../global/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="../../global/vendor/switchery/switchery.min.js"></script>
  <script src="../../global/vendor/intro-js/intro.min.js"></script>
  <script src="../../global/vendor/screenfull/screenfull.min.js"></script>
  <script src="../../global/vendor/slidepanel/jquery-slidePanel.min.js"></script>
  <script src="../../global/vendor/x-editable/bootstrap-editable.min.js"></script>
  <script src="../../global/vendor/typeahead-js/bloodhound.min.js"></script>
  <script src="../../global/vendor/typeahead-js/typeahead.jquery.min.js"></script>
  <script src="../../global/vendor/x-editable/address.js"></script>
  <script src="../../global/vendor/select2/select2.min.js"></script>
  <script src="../../global/vendor/moment/moment.min.js"></script>
  <script src="../../global/js/core.min.js"></script>
  <script src="../assets/js/site.min.js"></script>
  <script src="../assets/js/sections/menu.min.js"></script>
  <script src="../assets/js/sections/menubar.min.js"></script>
  <script src="../assets/js/sections/gridmenu.min.js"></script>
  <script src="../assets/js/sections/sidebar.min.js"></script>
  <script src="../../global/js/configs/config-colors.min.js"></script>
  <script src="../assets/js/configs/config-tour.min.js"></script>
  <script src="../../global/js/components/asscrollable.min.js"></script>
  <script src="../../global/js/components/animsition.min.js"></script>
  <script src="../../global/js/components/slidepanel.min.js"></script>
  <script src="../../global/js/components/switchery.min.js"></script>
  <script src="../assets/examples/js/forms/editable.min.js"></script>

  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>