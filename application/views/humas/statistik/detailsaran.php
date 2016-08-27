  <div class="page">
    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Pilih Tahun dan Bulan</h3>
        </header>
        <div class="panel-body">
          <form class="form-horizontal" id="exampleStandardForm" autocomplete="on" method="POST" action="<?php echo base_url();?>Cstatistik/detailsaran">
                <div class="form-group">
                  <label class="col-sm-3 control-label">Tahun</label>
                  <div class="col-sm-9">
                      <select class="form-control" name="tahun" required="on">
                          <option value="">Pilih salah satu</option>
                          <option value="2015">2015</option>
                          <option value="2016">2016</option>
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Bulan</label>
                  <div class="col-sm-9">
                      <select class="form-control" name="bulan" required="on">
                          <option value="">Pilih salah satu</option>
                          <option value="1">Januari</option>
                          <option value="2">Februari</option>
                          <option value="3">Maret</option>
                          <option value="4">April</option>
                          <option value="5">Mei</option>
                          <option value="6">Juni</option>
                          <option value="7">Juli</option>
                          <option value="8">Agustus</option>
                          <option value="9">September</option>
                          <option value="10">Oktober</option>
                          <option value="11">Nopember</option>
                          <option value="12">Desember</option>
                        </select>
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" id="validateButton2">Pilih</button>
                </div>
              </form>
        </div>
      </div>
      <!-- End Panel Basic -->
      
    </div>
          
    <div class="page-content">
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div><?php foreach ($diti as $row){?>
          <h3 class="panel-title">Total Saran yang Masuk dari Masyarakat Tahun <?php echo $row->tahun;?> Bulan ke- <?php echo $row->bulan;?></h3>
        </header><?php }?>
        <header class="panel-heading">
          <div class="panel-actions"></div><?php foreach ($smb as $row){?>
          <h3 class="panel-title">Total Saran <?php echo $row->jumlah_saran;?> </h3>
        </header><?php }?>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Nama</th>
               <th>Alamat</th>
               <th>Saran</th>
               <th>Tanggal Saran</th>
               <th>Status Spam</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($detailsaran as $ds){?>
              <tr>
              <td style="width:10%"><?php echo $ds->nama;?></td>
              <td style="width:10%"><?php echo $ds->alamat;?></td>
              <td style="width:50%"><?php echo $ds->saran;?></td>
              <td style="width:15%"><?php echo $ds->tanggal_saran;?></td>             
              <td style="width:10%"><?php echo $ds->isSpam;?></td><?php }?>  <!-- bukan spam  -->              
              </tr>
            </tbody>
          </table>
</div>
    </div>              
      </div>
       </div>    
      </div>
