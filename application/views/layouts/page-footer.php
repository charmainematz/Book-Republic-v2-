 <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?=site_url('assets_frontend/plugins/jquery/jquery-1.9.1.min.js')?>"></script>
  <script src="<?=site_url('assets_frontend/plugins/jquery/jquery-migrate-1.1.0.min.js')?>"></script>

  <script  src="<?=site_url('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js')?>" ></script>
  <script src="<?=site_url('assets_frontend/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
    <!--[if lt IE 9]>
        <script src="assets/crossbrowserjs/html5shiv.js"></script>
        <script src="assets/crossbrowserjs/respond.min.js"></script>
        <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?=site_url('assets/plugins/slimscroll/jquery.slimscroll.min.js')?>" ></script>
     <script src="<?=site_url('assets/plugins/jquery-cookie/jquery.cookie.js')?>" ></script>
   
    <!-- ================== END BASE JS ================== -->
    
    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?=site_url('assets/plugins/gritter/js/jquery.gritter.js')?>" ></script>
   
     <script src="<?=site_url('assets/plugins/DataTables/js/jquery.dataTables.js')?>" ></script>
    <script src="<?=site_url('assets/plugins/DataTables/js/dataTables.responsive.js')?>"></script>
    <script src="<?=site_url('assets/js/table-manage-responsive.demo.min.js')?>"></script>
    <script src="<?=site_url('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')?>" ></script>

        <script src="<?=site_url('assets/js/form-plugins.demo.js')?>"></script>
    <script src="<?=site_url('assets/js/dashboard.min.js')?>" ></script>
    <script src="<?=site_url('assets/js/apps.min.js')?>" ></script>

    <script  src="<?=site_url('assets/vendor/blueimp-tmpl/tmpl.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-canvas-to-blob/canvas-to-blob.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-load-image/load-image.all.min.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload.js')?>"></script>

  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload-process.js')?>"></script>

  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload-image.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload-audio.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload-video.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload-validate.js')?>"></script>
  <script  src="<?=site_url('assets/vendor/blueimp-file-upload/jquery.fileupload-ui.js')?>"></script>


        <!-- ================== BEGIN PAGE LEVEL JS ================== -->
   
    
    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <!-- ================== END PAGE LEVEL JS ================== -->

    <?php if($page_title=='Books'):?>
           
    <?php endif?>
     <?php if($page_title=='Bookshelf'):?>
        <?php $this->load->view('book/scripts'); ?>
           
   <?php  endif ?>
    


     <script>    
      $(document).ready(function() {
          App.init();
          TableManageResponsive.init();
                  
      });

      [].forEach.call(document.querySelectorAll('img[data-src]'),    function(img) {
          img.setAttribute('src', img.getAttribute('data-src'));
          img.onload = function() {
          img.removeAttribute('data-src');
  };
});
  </script>

      <script>      
  // adds styles later      
  var style =  document.createElement('link')        
  style.rel = 'stylesheet'      
  style.href = '<?=site_url('assets/css/style.min.css')?>'      
  var first = document.getElementsByTagName('link')[0]      
  first.parentNode.insertBefore(style, first)    
</script>
</body>
</html>
