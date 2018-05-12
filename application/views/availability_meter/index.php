
<div class="">
  	<div class="page-title">
	    <div class="title_left">
	      <h3>	<?= $page_title; ?> </h3>
	    </div>

   
  	</div>
  	<div class="clearfix"></div>
   
  	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

          
          <div class="x_panel">
        	<div class="x_content">
        		   
                  <table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>Description</th>
						
						<th style="text-align: center;">Set Point</th>
							
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($availability_meter as $am): ?>
						<tr>
						<td><?= $am->am_description; ?></td>
					
						<td  style="text-align: center;"> <?= $am->set_limit; ?></td>
					
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      
 
	            
          </div>
          
      	</div>
  		</div>		
	</div>	
</div>	



			