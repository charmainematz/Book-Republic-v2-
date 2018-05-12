<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title><?php echo $page_title.'::'?> Book Republic</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes" name="viewport" />
  <meta content="Book Republic" name="description" />
  <meta content="Charmaine Matienzo" name="author" />
  <meta content="book swapping, book republic, computer science, uplb" name="keywords" />
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <link href="<?=site_url('assets/plugins/bootstrap/css/bootstrap.min.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet">
  <link href="<?=site_url('assets/css/theme/default.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet" id="theme">
  <link href="<?=site_url('assets/css/style.min.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet">
 
    <link href="<?=site_url('assets/plugins/font-awesome/css/font-awesome.min.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet">
   <link href="<?=site_url('assets/plugins/DataTables/css/data-table.css').'?'.date('l jS \of F Y h:i:s A');?>"  rel="stylesheet" />
   <link href="<?=site_url('assets/css/animate.min.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet">
   
  <link href="<?=site_url('assets/css/style-responsive.min.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet">
<link href="<?=site_url('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet" />
  <noscript>
   


  
 <link rel="stylesheet"  href="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload.css').'?'.date('l jS \of F Y h:i:s A');?>" >

  <link rel="stylesheet" href="<?=site_url('assets/vendor/dropzone/basic.css').'?'.date('l jS \of F Y h:i:s A');?>">
  <link rel="stylesheet" href="<?=site_url('assets/vendor/dropzone/dropzone.css').'?'.date('l jS \of F Y h:i:s A');?>">
 <link href="<?=site_url('assets/plugins/gritter/css/jquery.gritter.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet" />
   
  </noscript>

 
  <!-- ================== END BASE CSS STYLE ================== -->

<?php if($page_title=='Dashboard'):?>
 <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  <link href="<?=site_url('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet" />
  <link href="<?=site_url('assets/plugins/bootstrap-datepicker/css/datepicker.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet" />
  <link href="<?=site_url('assets/plugins/bootstrap-datepicker/css/datepicker3.css').'?'.date('l jS \of F Y h:i:s A');?>" rel="stylesheet" />

 
  <?php endif?>


  <?php if($page_title=='Collections'):?>
      <link href="<?=site_url('assets/plugins/isotope/isotope.css')?>" rel="stylesheet"  />
    <link href="<?=site_url('assets/plugins/lightbox/css/lightbox.css')?>" rel="stylesheet" />

  <?php endif;?>

  <!-- ================== BEGIN BASE JS ================== -->
  <script async src="<?=site_url('assets/plugins/pace/pace.min.js')?>"></script>
  <!-- ================== END BASE JS ================== -->


</head>