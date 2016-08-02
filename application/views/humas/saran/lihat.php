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
                  <div>
                    <div class="metas">
                      <span class="username">
                        <?php echo $row->nama;?>
                        <span class="started">(<?php echo $row->alamat;?>)</span>
                        <span class='text-muted pull-right'><?php echo date("d M Y H:i:s",strtotime($row->tanggal_saran));?> WIB</span>
                      </span>
                    </div>
                    <div class="title">
                      <?php                           
                      echo substr($row->saran, 0,250); 
                      if(strlen($row->saran) > 250){
                        echo '...';
                      }?>
                    </div>
                    <div class="title">
                      <a href="<?php echo base_url(); ?>SaranController/detail/<?php echo $row->id_saran;?>">Detail</a>
                    </div>                        
                  </div>
                </td>
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
    </div>
  </div>
</div>


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
