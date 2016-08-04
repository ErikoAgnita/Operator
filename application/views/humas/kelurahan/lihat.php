<!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Kelurahan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kelurahan</li>
        <li>Data Kelurahan</li>
      </ol>
    </div>
    <div class="page-content">
       <form role="form" method="POST" action="<?php echo base_url();?>Ckelurahan/search/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari Nama Kelurahan ...">
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
     </form>
   </br>
     <?php echo $this->session->flashdata('pesan'); ?>
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Kelurahan</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kecamatan</th>
                <th>Nama Kecamatan</th>
                <th>Kode Kelurahan</th>
                <th>Nama Kelurahan</th>
                <th>isAktif</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php foreach ($kelurahan as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->kode_kecamatan;?></td>
                <td><?php echo $row->nama_kecamatan;?></td>
                <td><?php echo $row->kode_kelurahan;?></td>
                <td><?php echo $row->nama_kelurahan;?></td>
                <td><?php echo $row->isAktif;?></td>
                <td class="text-nowrap">
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>Ckelurahan/update/<?php echo $row->kode_kelurahan;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Ckelurahan/hapus/<?php echo $row->kode_kelurahan;?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama_kelurahan;?>')"><i class="icon wb-close" aria-hidden="true"></i></a>
                  </button>
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
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->