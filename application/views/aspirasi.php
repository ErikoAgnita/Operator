
    <div class="container" style="background-color:#525252; padding-top:10px; padding-bottom:10px">

     
      <!-- Content Wrapper. Contains page content -->
      <!--<div class="content-wrapper">-->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="page-header" style="text-aligntment:center; color:#62a8ea;">
            <b>Kotak Saran Pemerintah Kota Salatiga</b>
          </h1>
     
        </section>

        <!-- Main content -->
        <section class="content">
            <?php echo $this->session->flashdata('pesan'); ?>
            
          <div class="row">
                <!--==========-->
                <div class="col-md-6">
                    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jssor.slider-20.min.js"></script>
    <script>
        jssor_1_slider_init = function() {
            
            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:1200,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];
            
            var jssor_1_options = {
              $AutoPlay: true,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 10,
                $SpacingX: 8,
                $SpacingY: 8,
                $Align: 360
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 550);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", $Jssor$.$WindowResizeFilter(window, ScaleSlider));
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>

    <style>
        
        .jssora05l, .jssora05r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 40px;
            cursor: pointer;
            background: url('img/a17.png') no-repeat;
            overflow: hidden;
        }
        .jssora05l { background-position: -10px -40px; }
        .jssora05r { background-position: -70px -40px; }
        .jssora05l:hover { background-position: -130px -40px; }
        .jssora05r:hover { background-position: -190px -40px; }
        .jssora05l.jssora05ldn { background-position: -250px -40px; }
        .jssora05r.jssora05rdn { background-position: -310px -40px; }

        .jssort01 .p {
            position: absolute;
            top: 0;
            left: 0;
            width: 72px;
            height: 72px;
        }
        
        .jssort01 .t {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        .jssort01 .w {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
        }
        
        .jssort01 .c {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
            box-sizing: content-box;
            background: url('img/t01.png') -800px -800px no-repeat;
            _background: none;
        }
        
        .jssort01 .pav .c {
            top: 2px;
            _top: 0px;
            left: 2px;
            _left: 0px;
            width: 68px;
            height: 68px;
            border: #000 0px solid;
            _border: #fff 2px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p:hover .c {
            top: 0px;
            left: 0px;
            width: 70px;
            height: 70px;
            border: #fff 1px solid;
            background-position: 50% 50%;
        }
        
        .jssort01 .p.pdn .c {
            background-position: 50% 50%;
            width: 68px;
            height: 68px;
            border: #000 2px solid;
        }
        
        * html .jssort01 .c, * html .jssort01 .pdn .c, * html .jssort01 .pav .c {
            /* ie quirks mode adjust */
            width /**/: 72px;
            height /**/: 72px;
        }
        .error {
        color:red;
        font-size:13px;
        margin-bottom:-15px
        }
        
        @media(max-width:975px) {
            .input-group{
                width:100%;
            }
            .navbar-brand img{
                width:300px;
                height:auto;
            }
        }
        @media(min-width:975px) {
            .input-group{
                width:83%;
            }
            .navbar-brand img{
                width:400px;
                height:auto;
            }
        }
    </style>


    <div id="jssor_1" style="position: relative;margin: 0 auto;top: 0px;left: 0px;overflow: hidden;background-color: #24262e; width: 860px;
                height: 640px;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('<?php echo base_url(); ?>assets/images/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px;overflow: hidden;  width: 860px;height: 540px;">
            <?php if($aspirasi!=0){
                foreach($aspirasi as $as){ ?>
            
                <div style="display: inline-block;">
                    <div class="slideImg"><p><?php echo substr($as->saran,0,100); echo "<b> . . .</b>" ?></p></div>
                    <img style="z-index:-1;" data-u="image" src="<?php echo base_url(); ?>uploads/saran/<?php echo $as->lampiran_saran; ?>" />
                </div>
            <?php }} else  {?>
                <div style="display: inline-block;">
                    <img style="z-index:-1;" data-u="image" src="<?php echo base_url(); ?>assets/images/balaikota_salatiga.jpg" />
                </div>
            <?php } ?>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
            <!-- Thumbnail Item Skin Begin -->
            <div data-u="slides" style="cursor: default;">
                <div data-u="prototype" class="p">
                    <div class="w">
                        <div data-u="thumbnailtemplate" class="t"></div>
                    </div>
                    <div class="c"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora05l" style="top:158px;left:8px;width:40px;height:40px;"></span>
        <span data-u="arrowright" class="jssora05r" style="top:158px;right:8px;width:40px;height:40px;"></span>
        
    </div>
    <script>
        jssor_1_slider_init();
    </script>
                </div>
              <!--==========-->
                  <div class="col-md-6">
                      <form role="form" method="POST" enctype="multipart/form-data" action="<?php echo base_url();?>csaran/add_saran/" >
                        <div class="form-group" style="color:#62a8ea;">
                            <label class="col-sm-2 control-label">Nama<small style="color:yellow;"> *</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><i class="fa fa-user"></i></span>
                                <a data-toggle="tooltip" title="Hanya gunakan abjad untuk mengisi nama"><input type="text" class="form-control" placeholder="(Minimal 4 karakter dan gunakan abjad)" name="nama" value="<?php echo set_value('nama'); ?>">
                            </div></a>
                            <?php
                                echo form_error('nama','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                ?>
                            <label class="col-sm-2 control-label">Alamat<small style="color:yellow;"> *</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><i class="fa fa-home"></i></span>
                                <a data-toggle="tooltip" title="Gunakan abjad atau nomor untuk mengisi alamat"><input type="text" class="form-control" placeholder="(Gunakan abjad dan nomor)" name="almt" value="<?php echo set_value('almt'); ?>" ></a>
                            </div>
                            <?php
                                echo form_error('almt','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                ?>
                            <label class="col-sm-2 control-label">HP<small style="color:yellow;"> *</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><i class="fa fa-phone"></i></span>
				<a data-toggle="tooltip" title="Hanya gunakan nomor untuk mengisi HP"><input type="text" class="form-control" placeholder="(Gunakan nomor)" value="<?php echo set_value('telp'); ?>" name="telp"></a>
                            </div>
                            <?php
                                echo form_error('telp','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                ?>
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><i class="fa fa-envelope"></i></span>
				<input type="email" class="form-control" placeholder="(Gunakan format penulisan email)" name="email" value="<?php echo set_value('email'); ?>" >
                            </div>
                            <?php
                                echo form_error('email','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                ?>
                            <label class="col-sm-2 control-label">Saran<small style="color:yellow;"> *</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><i class="fa fa-comments"></i></span>
                               <a data-toggle="tooltip" title="Hindari penggunaan tanda baca #*;:$\<>">
                                <?php
                                    $aspr = array('name' => 'aspr',
                                                    'value' => set_value('aspr'),
                                                    'class' => 'form-control',
                                                    'placeholder' => 'Salurkan kritik atau saran anda (Hindari penggunaan tanda baca #*;:$\<>)',
                                                    'rows' => 5,
                                     );
                                    echo form_textarea($aspr);
                                ?></a>
                            </div>
                          <?php
                                echo form_error('aspr','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                ?>
                            <label class="col-sm-2 control-label">Lampirkan Foto<small style="color:yellow;">**</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><i class="fa fa-upload"></i></span>
                                <a data-toggle="tooltip" title="Maksimal 2Mb"><input id="uploadFile" type="file" name="image" class="form-control" data-provides="uploadFile"/></a>
                                <div id="imagePreview"></div>
                            </div>
                        </div>
                      <div class="form-group" style="color:#62a8ea;">
                      <label class="col-sm-2 control-label">Kode Keamanan<small style="color:yellow;">*</small></label>
                            <div class="input-group">
                                <span class="input-group-addon"style="width:15%"><?php echo $captcha['image']; ?></span>
                                <a data-toggle="tooltip" title="Buka kembali halaman http://saran.salatiga.go.id/ apabila kode keamanan tidak berfungsi dan pastikan pengisian form anda sudah benar sebelum menekan tombol kirim"><input name="userCaptcha" style="height: 50px; font-size: 14px;  padding: 10px;" class="form-control" autocomplete="off" placeholder="Kode Keamanan"  value="<?php if(!empty($userCaptcha)){ echo $userCaptcha;} ?>"></input></a>
                            </div>
                      <?php
                                echo form_error('userCaptcha','<div class="alert alert-danger"><button href="#" class="close" data-dismiss="alert">&times;</button>','</div>');
                                ?>
                        </div>
                        <div class="input-group">
                            <label class="col-sm-12 control-label" style="color:white;"><small>Keterangan :<br>&nbsp;&nbsp;<span style="color:yellow;">*</span>harus diisi<br>&nbsp;&nbsp;<span style="color:yellow;">**</span>Foto maksimal 2Mb</small></label>
                            <label></label>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-sm btn-success btn-flat btn-block" ><i class="fa fa-send"> &nbsp;Kirim</i></button>
                        </div>
                    </form>

                    </div>
              <!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      <!--</div> /.content-wrapper -->
      </div>
