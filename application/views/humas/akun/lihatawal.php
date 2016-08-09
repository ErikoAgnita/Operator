<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-content">
    <!-- Panel X-Editable -->
    
    <h2 class="intro-text text-center">Profil Admin</h2>
    <br>
    <div class="panel">
      <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="editableUser">
              <tbody>
                <?php foreach ($adata as $row){?>
                <h3 class="intro-text text-center">Satuan Kerja Perangkat Daerah</h3>
                     <h3 class="intro-text text-center"><?php echo strtoupper ($row->kode_unit);?></h3><br>
                       <p><?=$this->session->flashdata('pesanprofil')?> </p>
                       <p><?=$this->session->flashdata('pesanpass')?> </p>

                  <form action="<?php echo base_url();?>cpengguna/admin_lihat" method="post">
                   <tr>
                    <td style="width:20%">Username</td>
                    <td>
                      <span class="notready"><?php echo $row->username;?></span>
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
                    <td>Telepon</td>
                    <td>
                      <span class="notready"><?php echo $row->telepon;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Handphone</td>
                    <td>
                      <span class="notready"><?php echo $row->handphone;?></span>
                    </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>
                      <span class="notready"><?php echo $row->email;?></span>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="form-group">
              <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>&nbsp;&nbsp;<?php echo "Ubah"; ?></button>
            </div>
            </form>
          </div>
      </div>

    </div>
  </div>
</div>