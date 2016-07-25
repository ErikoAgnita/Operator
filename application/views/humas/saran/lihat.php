  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Saran</h1>
      <ol class="breadcrumb">
        <li>Saran</li>
        <li>Lihat</li>
      </ol>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Saran</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aspirasi</th>
                <th>Tanggal Lapor</th>
                <th>Status Laporan</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php foreach ($saran->result() as $row){?>
              <tr>
                <td><?php echo $row->ID_SARAN;?></td>
                <td><?php echo $row->NAMA;?></td>
                <td><?php echo $row->ALAMAT;?></td>
                <td><?php echo $row->ASPIRASI;?></td>
                <td><?php echo $row->TANGGAL_LAPOR;?></td>
                <td><?php echo $row->STATUS_LAPORAN;?></td>
                <td class="text-nowrap">
                  <a href="<?php echo base_url(); ?>SaranController/detail/<?php echo $row->ID_SARAN;?>">Detail</a>
                </td>
              </tr>
              <?php }?>              
            </tbody>
          </table>
        </div>
      </div>
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->