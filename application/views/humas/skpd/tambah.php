<!-- Page -->
<div class="page">
    <div class="page-header">
    <h1 class="page-title">Satuan Kerja Perangkat Daerah (SKPD)</h1>
        <ol class="breadcrumb">
            <li>SKPD</li>
            <li>Buat SKPD</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
                <div class="panel-body container-fluid">
                    <div class="row row-lg">
                        <form action="<?php echo base_url()?>Cskpd/do_tambah" method="post" enctype="multipart/form-data" autocomplete="off">
                            <div class="example-wrap">
                                <div class="example">
                                    <div class="col-sm-6">
                                    <!-- Example Basic Form -->
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicKodeUnit">Kode Unit</label>
                                            <input type="text" class="form-control" id="inputBasicKodeUnit" name="kodeUnit" value="<?php echo set_value('kodeUnit'); ?>" placeholder="humas" autocomplete="off" />
                                         <?php
                                          echo form_error('kodeUnit','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                          ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicBagian">Bagian</label>
                                            <input type="text" class="form-control" id="inputBasicBagian" name="bagian" value="<?php echo set_value('bagian'); ?>" placeholder="00" autocomplete="off" />
                                        <?php
                                          echo form_error('bagian','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                          ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicBentuk">Bentuk</label>
                                            <input type="text" class="form-control" id="inputBasicBentuk" name="bentuk" value="<?php echo set_value('bentuk'); ?>" autocomplete="off" />
                                        <?php
                                        echo form_error('bentuk','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicNama">Nama SKPD</label>
                                            <input type="text" class="form-control" id="inputBasicNama" name="nama" value="<?php echo set_value('nama'); ?>" placeholder="Bagian Hubungan Masyarakat Setda" autocomplete="off" />
                                        <?php
                                        echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicAlamat">Alamat</label>
                                            <input type="text" class="form-control" id="inputBasicAlamat" name="alamat" value="<?php echo set_value('alamat'); ?>" placeholder="Jl. Letjend. Sukowati No. 51, Salatiga, Jawa Tengah 50724" autocomplete="off" />
                                        <?php
                                        echo form_error('alamat','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicTelepon">Telepon</label>
                                            <input type="text" class="form-control" id="inputBasicTelepon" name="telepon" value="<?php echo set_value('telepon'); ?>" placeholder="(0298) 326767"autocomplete="off" />
                                        <?php
                                        echo form_error('telepon','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                    <!-- End Example Basic Form -->
                                    </div>
                                    <div class="col-sm-6">
                                    <!-- Example Basic Form -->
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicFax">Fax</label>
                                            <input type="text" class="form-control" id="inputBasicFax" value="<?php echo set_value('fax'); ?>" name="fax" autocomplete="off" />
                                        <?php
                                        echo form_error('fax','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicEmail">Email</label>
                                            <input type="email" class="form-control" id="inputBasicEmail" name="email" value="<?php echo set_value('email'); ?>" placeholder="humas@salatigakota.go.id" autocomplete="off" />
                                        <?php
                                        echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicWebsite">Website</label>
                                            <input type="text" class="form-control" id="inputBasicWebsite" name="website" value="<?php echo set_value('website'); ?>" placeholder="http://www.salatigakota.go.id" autocomplete="off" />
                                        <?php
                                        echo form_error('website','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicUrut">Urut</label>
                                            <input type="text" class="form-control" id="inputBasicUrut" name="urut" value="<?php echo set_value('urut'); ?>" autocomplete="off" />
                                        <?php
                                        echo form_error('urut','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="inputBasicTema">Tema</label>
                                            <input type="text" class="form-control" id="inputBasicTema" name="tema" value="<?php echo set_value('tema'); ?>" placeholder="Kuning" autocomplete="off" />
                                        </div>
                                        <?php
                                        echo form_error('tema','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                        ?>
                                        <div class="form-group">
                                            <div class="pull-right">
                                                <button type="submit" class="btn btn-primary "><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan</button>
                                            </div>
                                        </div>
                                    <!-- End Example Basic Form -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- End Page -->