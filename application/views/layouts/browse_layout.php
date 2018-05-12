<?php $this->load->view('layouts/page-header'); ?>  
  <body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
   <div id="page-container" class="fade page-header-fixed">


   	<?php $this->load->view('layouts/header'); ?> 


    
    <?php if ($this->ion_auth->logged_in()):?>

        <?php if ($this->ion_auth->is_admin()) { ?>

        <?php $this->load->view('layouts/nav'); ?>     
        <?php }else
          if ($this->user_m->isUser('2')==1) { ?>

            <?php $this->load->view('layouts/nav_user'); ?>     
        <?php }?>

<?php endif;?>
 <div id="content" class="content">

  <?php $this->load->view($subview); ?>
     	</div>
  </div>
  <?php $this->load->view('layouts/browse_footer'); ?>
   