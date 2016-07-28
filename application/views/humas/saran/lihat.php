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
          <div class="page-content tab-content page-content-table nav-tabs-animate">
            <div class="tab-pane animation-fade active" id="forum-newest" role="tabpanel">
              <table class="table is-indent">
                <tbody>
                  <?php foreach ($saran->result() as $row){?>
                  <tr data-url="panel.tpl" data-toggle="slidePanel">
                    <td class="pre-cell"></td>
                    <td class="cell-60 responsive-hide">
                      <a class="avatar" href="javascript:void(0)">
                        <img class="img-responsive" src="<?php  echo base_url(); ?>assets/images/people.png" alt="...">
                      </a>
                    </td>

                    <td>
                      <div class="content">
                        <div class="metas">
                          <span class="author"><?php echo $row->nama;?></span>
                          <span class="started">alamat: <?php echo $row->alamat;?></span>
                        </div>
                        <div class="metas">
                          <span class="tags"><?php echo $row->tanggal_saran.'  WIB';?></span>
                        </div>
                        <div class="title">
                          <?php                           
                          echo substr($row->saran, 0,200); 
                          if(strlen($row->saran) > 200){
                            echo '...'; 
                          }?>
                        </div>
                        <div class="title">
                          <a href="<?php echo base_url(); ?>SaranController/detail/<?php echo $row->id_saran;?>">Detail</a>
                        </div>
                        
                      </div>
                    </td>
                    <td class="cell-80 forum-posts">
                    </td>
                    <td class="suf-cell"></td>
                  </tr>
                  <?php }?>   
                </tbody>
              </table>
              <ul class="pagination pagination-gap">
                <li class="disabled"><a href="javascript:void(0)">Previous</a></li>
                <li class="active"><a href="javascript:void(0)">1 <span class="sr-only">(current)</span></a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)">5</a></li>
                <li><a href="javascript:void(0)">Next</a></li>
              </ul>
            </div>
          </div>



  <!-- Core  -->
  <script src="../../../global/vendor/jquery/jquery.min.js"></script>
  <script src="../../../global/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="../../../global/vendor/animsition/animsition.min.js"></script>
  <script src="../../../global/vendor/asscroll/jquery-asScroll.min.js"></script>
  <script src="../../../global/vendor/mousewheel/jquery.mousewheel.min.js"></script>
  <script src="../../../global/vendor/asscrollable/jquery.asScrollable.all.min.js"></script>
  <script src="../../../global/vendor/ashoverscroll/jquery-asHoverScroll.min.js"></script>

  <!-- Plugins -->
  <script src="../../../global/vendor/switchery/switchery.min.js"></script>
  <script src="../../../global/vendor/intro-js/intro.min.js"></script>
  <script src="../../../global/vendor/screenfull/screenfull.min.js"></script>
  <script src="../../../global/vendor/slidepanel/jquery-slidePanel.min.js"></script>

  <!-- Plugins For This Page -->
  <script src="../../../global/vendor/slidepanel/jquery-slidePanel.min.js"></script>
  <script src="../../../global/vendor/bootstrap-markdown/bootstrap-markdown.js"></script>
  <script src="../../../global/vendor/bootstrap-select/bootstrap-select.min.js"></script>
  <script src="../../../global/vendor/marked/marked.min.js"></script>
  <script src="../../../global/vendor/to-markdown/to-markdown.js"></script>

  <!-- Scripts -->
  <script src="../../../global/js/core.min.js"></script>
  <script src="../../assets/js/site.min.js"></script>

  <script src="../../assets/js/sections/menu.min.js"></script>
  <script src="../../assets/js/sections/menubar.min.js"></script>
  <script src="../../assets/js/sections/gridmenu.min.js"></script>
  <script src="../../assets/js/sections/sidebar.min.js"></script>

  <script src="../../../global/js/configs/config-colors.min.js"></script>
  <script src="../../assets/js/configs/config-tour.min.js"></script>

  <script src="../../../global/js/components/asscrollable.min.js"></script>
  <script src="../../../global/js/components/animsition.min.js"></script>
  <script src="../../../global/js/components/slidepanel.min.js"></script>
  <script src="../../../global/js/components/switchery.min.js"></script>

  <script src="../../../global/js/components/bootstrap-select.min.js"></script>


  <script src="../../assets/js/app.min.js"></script>

  <script src="../../assets/examples/js/apps/forum.min.js"></script>


  <!-- Google Analytics -->
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
