<!-- Header -->
<?php

    error_reporting(E_ALL & ~E_WARNING);

    if($_SESSION['username'] && $_SESSION['level']=='Operator'){
        //echo $_SESSION['username'];
        $userid_skpd = $_SESSION['userid_skpd'];
        $userid_nama = $_SESSION['name'];

        //echo $_SESSION['name'];
    }
    else{
        redirect('clogin/login');
    }
?>
<!DOCTYPE html>
<html class="no-js before-run" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <meta name="author" content="">

  <title>Kotak Saran Salatiga</title>

  <link rel="apple-touch-icon" href="<?php  echo base_url(); ?>assets/images/apple-touch-icon.png">
  <link rel="shortcut icon" href="<?php  echo base_url(); ?>assets/images/favicon.ico">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/AdminLTE.min.css">
  
 <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>  
<script src="<?php echo base_url();?>assets/js/jquery1-12-4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/bootstrap-extend.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/site.min.css">

  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/animsition/animsition.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/asscrollable/asScrollable.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/switchery/switchery.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/intro-js/introjs.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/slidepanel/slidePanel.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/flag-icon-css/flag-icon.css">

  <!-- Plugin -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/datatables-bootstrap/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/vendor/datatables-responsive/dataTables.responsive.css">

  <link rel="stylesheet" href="../../assets/vendor/jquery-wizard/jquery-wizard.css">
  <link rel="stylesheet" href="../../assets/vendor/formvalidation/formValidation.css">

  <!-- Fonts -->
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/fonts/web-icons/web-icons.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/fonts/brand-icons/brand-icons.min.css">
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

 <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
  <!-- Inline -->
  <style>
    @media (min-width: 768px) and (max-width: 992px) {
      .form-inline .control-label {
        display: block;
      }
      .form-inline .form-group {
        margin-bottom: 20px;
        vertical-align: baseline;
      }
    }
  </style>


  <!--[if lt IE 9]>
    <script src="../../assets/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../assets/vendor/media-match/media.match.min.js"></script>
    <script src="../../assets/vendor/respond/respond.min.js"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="<?php  echo base_url(); ?>assets/vendor/modernizr/modernizr.js"></script>
  <script src="<?php  echo base_url(); ?>assets/vendor/breakpoints/breakpoints.js"></script>
  <script>
    Breakpoints();
  </script>
  
  <script type="text/javascript">
    $(function() {
        $("#uploadFile").on("change", function()
        {
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file

                reader.onloadend = function(){ // set image data as background of div
                    $("#imagePreview").css("display", "inherit");
                    $("#imagePreview").css("background-image", "url("+this.result+")");
                }
            }
        });
        
        $("#delImg").onClick(function(){
            $("#imagePreview").css("display", "none");
        });
    });
    </script> 
  
</head>
<body>
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle hamburger hamburger-close navbar-toggle-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
  <!--    <button type="button" class="navbar-toggle collapsed" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button> -->
      <div class="navbar-brand navbar-brand-center" style="cursor:default">
        <img class="navbar-brand-logo" src="<?php  echo base_url(); ?>assets/images/logo.png" title="Kotak Saran Salatiga">
        <span class="navbar-brand-text" data-slug="uikit"> Kotak Saran Salatiga</span>
      </div>
    </div>

    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="hidden-float" id="toggleMenubar">
            <a data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
            </a>
          </li>
          <li class="hidden-xs" id="toggleFullscreen">
            <a class="icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
              <span class="sr-only">Toggle fullscreen</span>
            </a>
          </li>
    <!--      <li class="hidden-float">
            <a class="icon wb-search" data-toggle="collapse" href="#site-navbar-search" role="button">
              <span class="sr-only">Toggle Search</span>
            </a>
          </li> -->
        </ul>
        <!-- End Navbar Toolbar -->

        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li role="presentation">
            <a href="<?php echo base_url(); ?>clogin/logout" role="menuitem" onclick="return confirm('Apakah Anda Yakin Ingin Keluar?')"><i class="icon wb-power" aria-hidden="true"></i> Keluar</a>
          </li>    
        </ul>

         <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li role="presentation">
            <a class="icon wb-user"  href="<?php echo base_url(); ?>cpengguna/lihatawal" role="menuitem">&nbsp; <?php echo $userid_nama; ?>
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->

      <!-- Site Navbar Seach -->
  <!--     <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>

  </nav>
  
<!-- End Header -->

<!-- Menu -->
<div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu">
             <a class="animsition-link" href="<?php echo base_url(); ?>cpengguna/indexoperator" data-slug="uikit">
            <li class="site-menu-category">Operator</li> </a>
            <li class="site-menu-item">
              <a class="animsition-link" href="<?php echo base_url(); ?>cpengguna/lihatawal" data-slug="uikit">
                <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                <span class="site-menu-title">Profil</span>
                <span class="site-menu "></span>
             </a>
         <!--         <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>cpengguna/dinas_lihat" data-slug="uikit">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Lihat</span>
                  </a>
                </li>
          <!--      <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>/dinas_ubah" data-slug="uikit">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Ubah</span>
                  </a>
                </li> 
              </ul> -->
              </li>
            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)" data-slug="advanced">
                <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                <span class="site-menu-title">Laporan</span>
                <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub">
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>crespon/dariadmin/1" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Semua Saran</span>
                  </a>
                </li>
                <li class="site-menu-item">
                  <a class="animsition-link" href="<?php echo base_url(); ?>crespon/dariadmin/2" data-slug="advanced-lightbox">
                    <i class="site-menu-icon " aria-hidden="true"></i>
                    <span class="site-menu-title">Saran SKPD</span>
                  </a>
                </li>
              </ul>
            </li>
          </li>
        </div>
      </div>
    </div>
  </div>
  <!-- End Menu -->
