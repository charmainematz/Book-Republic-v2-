
<div class="">
  	<div class="page-title">
	    <div class="title_left">
	      <h3>	<?= $page_title; ?> </h3>
	    </div>

   
  	</div>
  	<div class="clearfix"></div>
   
  	<div class="row">
  		  <h2>Slots Available</h2>
                   
                 
        <div  class="jumbotron" id="show-next-month" data-toggle="calendar" style="text-align: center">
                   
                
               
                </div> 
        
		<div class="col-md-12 col-sm-12 col-xs-12">

          
          <div class="x_panel">
        	<div class="x_content">
        		   
                  <table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>Date</th>						
						<th>Events</th>
						<th style="text-align: center">Status</th>
						<th width="40%" style="text-align: center;">Edit Availability</th>


							
					</tr>
					</thead>
					
					<tbody>
					 <?php foreach ($null_dates as $null_date): ?>
						<tr>
						<td><?=date('M-d-y',strtotime($null_date->event_date))?></td>
						<td>
							<?php
								$ctr=1;
								$events=$this->event_m->getByDate($null_date->event_date);

								foreach($events as $event){ ?>
								<a href="<?=site_url('event/planner/'.$event->reservation_id)?>"> <?=$ctr.". ".$event->event_title;?> <a><br>
									 
											
									<?php $ctr=$ctr+1;
								}?>
						</td>
						<td  style="text-align: center">
							<?php
								if($null_date->active==1){
									echo ' <button type="button" class="btn btn-danger btn-xs">Closed</button>';
								}
								else{
									echo  ' <button type="button" class="btn btn-success btn-xs">Open</button>';
								
								}
							?>
							
						</td>
						<td  style="text-align: center;"> 

							<form action="<?=site_url('calendar/changeAvailability')?>" method="POST" class="form-horizontal form-label-left">
                    		    <?=  form_hidden('null_date_id',$null_date->null_date_id);?>
                    		    <?=  form_hidden('event_date',$event->event_date);?>

							       <div class="form-group">	
								     <div id="gender" class="btn-group" data-toggle="buttons">

								     	<?php foreach($ams as $am):?>
				                          <label class="<?php 
				                          		
				                          			if($null_date->availability_meter==$am->am_id){
				                          				echo 'btn btn-primary active';} 
				                          			else{
				                          				echo 'btn btn-default';
				                          			}?>" 
				                          			data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
				                            <input type="radio" name="am_id" id="availability" value="<?=$am->am_id?>"> &nbsp; <?=$am->am_description;?> &nbsp;
				                          </label>

			                         	<?php endforeach ?>
			                         
		                       		 </div>
                       		 	
                         			</div>
                         				<span class="input-group-btn">
                         					<span class="fa fa-pencil"> </span>
			                                   <button type="submit" class="btn btn-default btn-rounded btn-sm">Change</button>
			                            </span>
                      	</form>
                      

						</td>
					
						
					</tr>
					 <?php endforeach ?> 
					
					
					 </tbody>
	          </table>      
 
	            
          </div>
          
      	</div>
  		</div>		
	</div>	
</div>	



			