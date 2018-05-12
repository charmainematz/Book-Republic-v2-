  </div>
    <!-- end #page-container -->
  
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
  <script src="<?=site_url('assets_frontend/plugins/jquery-cookie/jquery.cookie.js')?>"></script>
  <script src="<?=site_url('assets_frontend/plugins/scrollMonitor/scrollMonitor.js')?>"></script>


  <script src="<?=site_url('assets_frontend/js/apps.min.js')?>"></script>
 
  <!-- ================== END BASE JS ================== -->



    <script src="<?=site_url('assets/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>
  
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?=site_url('assets/js/login-v2.demo.min.js')?>"></script>


  <!-- ================== END PAGE LEVEL JS ================== -->



  <script>    
      $(document).ready(function() {
          App.init();
          LoginV2.init();
      
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
  style.href = '<?=site_url('assets_frontend/css/style.min.css')?>'      
  var first = document.getElementsByTagName('link')[0]      
  first.parentNode.insertBefore(style, first)    
</script>
</body>
</html>
