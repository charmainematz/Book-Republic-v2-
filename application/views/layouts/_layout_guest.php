
	<?php $this->load->view('layouts/page-header'); ?>	
 	<body  class="site-menubar-flipped">
  	

       <?php
		$this->load->view('layouts/header_guest');
			$this->load->view('layouts/nav_guest'); ?>
	

  	 	<div class="page ">

    <div class="page-content container-fluid">
  	
	     <?php $this->load->view($subview); ?>
	    
 	 <!-- End Page -->
 	</div>
 </div>
	        		
	<?php $this->load->view('layouts/page-footer'); ?>
	<!-- /page content already at footer --> 

	  
	