<?php $this->load->view('layouts/page-header'); ?>  
  <body>
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade in"><span class="spinner"></span></div>
    <!-- end #page-loader -->
   <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
       	<?php $this->load->view('layouts/header'); ?>   

<?php if ($this->ion_auth->is_admin()) {?>
       	<?php $this->load->view('layouts/nav'); ?>   
<?php }else{?>
  <?php $this->load->view('layouts/nav_user'); ?> 
  <?php }?>

        <div id="content" class="content">
              <!-- Breadcrumbs-->

              <!-- begin breadcrumb -->
              <ol class="breadcrumb pull-right">
                  <?php if($page_title!='Dashboard'){?>
                <li><a href="<?=site_url('auth/home')?>">Home</a></li>
                <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
               
              
                <li class="active"><?=$c?></li>
                <?php }?>
              </ol>
              <!-- end breadcrumb -->
              <?php $this->load->view($subview); ?>
        </div>
  </div>

  <?php if($page_title=='Bookshelf'){?>
   <?php $this->load->view('layouts/browse_footer'); ?>

  <?php }else{?>
  <?php $this->load->view('layouts/page-footer'); ?>
   <?php }?>