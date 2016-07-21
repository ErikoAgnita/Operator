  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Daftar Dinas</h1>
      <ol class="breadcrumb">
        <li>Dinas</li>
        <li>Lihat</li>
      </ol>
    </div>

    <div class="page-content">
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Dinas</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dinas</th>
                <th>Username</th>
                <th>Telepon</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php foreach ($h->result() as $row){?>
              <tr>
                <td><?php echo $row->ID_DINAS1;?></td>
                <td><?php echo $row->NAMA_DINAS;?></td>
                <td><?php echo $row->USERNAME;?></td>
                <td><?php echo $row->TELP;?></td>
                <td class="text-nowrap">
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>DinasController/ubah"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>DinasController/hapus"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>
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