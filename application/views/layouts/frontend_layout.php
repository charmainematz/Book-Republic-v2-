<?php $this->load->view('layouts/frontend_header'); ?>  
  <body data-spy="scroll" data-target="#header-navbar" data-offset="51">
  	
  	<div id="page-container" class="fade " style="width: 100%">
   <?php $this->load->view('layouts/frontend_top'); ?>   
   
  <?php $this->load->view($subview); ?>

  <?php $this->load->view('layouts/frontend_footer'); ?>
   

