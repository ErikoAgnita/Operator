 <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Kecamatan Kota Salatiga</h1>
      <ol class="breadcrumb">
        <li>Kecamatan</li>
        <li>Data Kecamatan</li>
      </ol>
    </div>
    <div class="page-content">
         <form role="form" method="POST" action="<?php echo base_url();?>Ckecamatan/search/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari Nama Kecamatan ...">
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
          <h3 class="panel-title">Lihat Daftar Kecamatan</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Kecamatan</th>
                <th>Nama Kecamatan</th>
                <th>isAktif</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
              <?php $no = $this->uri->segment('3') + 1; ?>
              <?php foreach ($kecamatan as $re){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $re->kode_kecamatan;?></td>
                <td><?php echo $re->nama_kecamatan;?></td>
                <td><?php echo $re->isAktif;?></td>
                <td class="text-nowrap">
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php echo base_url(); ?>Ckecamatan/update_data/<?php echo $re->kode_kecamatan;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Ckecamatan/hapus/<?php echo $re->kode_kecamatan;?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $re->nama_kecamatan;?>')"><i class="icon wb-trash" aria-hidden="true"></i></a>
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