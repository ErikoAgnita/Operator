  <!-- Page -->
  <div class="page">
    <div class="page-header">
      <h1 class="page-title">Pengguna</h1>
      <ol class="breadcrumb">
        <li>Pengguna</li>
        <li>Data Pengguna</li>
      </ol>
    </div>
     <div class="page-content">
       <form role="form" method="POST" action="<?php echo base_url();?>Cpengguna/search/" >
         <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="<?php echo set_value('cari'); ?>" name="cari" placeholder="Cari Nama Pengguna ...">
            <span class="input-group-btn">
              <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
            </span>
          </div>
     </form>
   </br>
     <?php echo $this->session->flashdata('pengpesan'); ?>
      <!-- Panel Basic -->
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Lihat Daftar Pengguna</h3>
        </header>
        <div class="panel-body">
          <div class="table-responsive">
          <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Handphone</th>
                <th>Email</th>
                <th>Bagian SKPD</th>
                <th>Level</th>
                <th>Keterangan</th>
                <th>Aksi</th>
              </tr>
            </thead>            
            <tbody>
             <?php $no = $this->uri->segment('3') + 1; ?>
              <?php foreach ($pengguna as $row){?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $row->nama_pengguna;?></td>
                <td><?php echo $row->alamat;?></td>
                <td><?php echo $row->handphone;?></td>
                <td><?php echo $row->email;?></td>
                <td><?php echo $row->nama_dinas;?></td>
                <td><?php echo $row->level;?></td>                
                <td><?php echo $row->keterangan;?></td>
                 <td class="text-nowrap">
                  <!-- Trigger the modal with a button -->
                  <!-- <button href="#" type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="modal" data-original-title="Detail" data-target="#myModal"><i class="icon wb-eye" aria-hidden="true"></i> -->
                   <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Detail">
                    <a href="#myModal<?php echo $row->id_pengguna;?>" data-toggle="modal"><i class="icon wb-eye" aria-hidden="true"></i></a>
                  </button>
                  <!--<button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Ubah">
                    <a href="<?php //echo base_url(); ?>Cpengguna/update/<?php //echo $row->id_pengguna;?>"><i class="icon wb-wrench" aria-hidden="true"></i></a>
                  </button>-->
                  <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip" data-original-title="Hapus">
                    <a href="<?php echo base_url(); ?>Cpengguna/hapus/<?php echo $row->id_pengguna;?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->nama_pengguna;?>')"><i class="icon wb-trash" aria-hidden="true"></i></a>
                  </button>
                </td>
            
                <!-- Modal -->
<!-- Trigger the modal with a button -->




              </tr>
              <?php }?>
              </tbody>
            </table> 
<?php foreach ($pengguna as $row){?> 
            <!-- Modal -->
<div id="myModal<?php echo $row->id_pengguna;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class='user-block'>
              <img class='img-circle' src='<?php echo base_url(); ?>assets/images/people.png' alt='masyarakat'>
              <span class='username'><label><?php echo $row->nama_pengguna; ?></label></span>
              <span class='description'><?php echo $row->nama_dinas; ?></span>
              <span class='description'>Terakhir di ubah pada <?php echo date("d M Y H:i:s",strtotime($row->last_update)); ?></span>
          </div>
        <!--<h4 class="modal-title">Modal Header</h4>-->
      </div>
      <div class="modal-body">
        <table class="table table-hover dataTable table-striped width-full" style="width:100%">
        <tr>
          <td>Nama Pengguna</td>
          <td><?php echo $row->nama_pengguna; ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><?php echo $row->alamat; ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><?php echo $row->telepon; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row->email; ?></td>
        </tr>
        <tr>
          <td>Bagian SKPD</td>
          <td><?php echo $row->nama_dinas; ?></td>
        </tr>
        <tr>
          <td>Username</td>
          <td><?php echo $row->username; ?></td>
        </tr>
        <tr>
          <td>Terakhir Login</td>
          <td><?php echo date("d/m/Y  H:i:s",strtotime($row->last_login)); ?></td>
        </tr>
        <tr>
          <td>Terakhir di Ubah</td>
          <td><?php echo date("d/m/Y  H:i:s",strtotime($row->last_update)); ?></td>
        </tr>
        <tr>
          <td>Level</td>
          <td><?php echo $row->level; ?></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td><?php if($row->isAktif==1){
                        echo "<span class=\"label label-success\">Aktif</span>";
                    }
                    else echo "<span class=\"label label-default\">Tidak Aktif</span>";
              
              ?></td>
        </tr>
        <br>
</table>
        

      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-info">-->
          <a type="button" class="btn btn-info" href="<?php echo base_url(); ?>Cpengguna/update/<?php echo $row->id_pengguna;?>"><i class="fa fa-edit"></i>&nbsp;&nbsp;Ubah</a>
        <!--</button>-->
          <a type="button" class="btn btn-success" href="<?php echo base_url(); ?>Cpengguna/ganti_password/<?php echo $row->id_pengguna;?>"><i class="icon wb-wrench"></i>&nbsp;&nbsp;Ganti Password</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon wb-close"></i>&nbsp;&nbsp;Tutup</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->   
<?php }?>
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
      <!-- End Panel Basic -->
    </div>
  </div>
  <!-- End Page -->