
<div class="">
  	<div class="page-title">
	    <div class="title_left">
	      <h3>       <a onclick="goBack()" class="btn btn-rounded btn-primary" type="button"><i class="fa fa-arrow-left"></i> </a>	<?= $page_title; ?> </h3>
	    </div>

   
  	</div>
  	<div class="clearfix"></div>

  	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel">
                <div class="" >
                  <h2> <i style="color:blue;" class="fa fa-info-circle"></i> 
                  	
						<?php if($m=='forapproval'){?>
                  	Reservations Awaiting Confirmation  :: <small> Approve or Disapprove booking requests.
                  		<?php }

                  			if($m=='approved'){?>
					Event Planner  :: <small> Plan and organize your events, negotiate with clients, and print reports/invoices.  

                  			<?php }else{?>

                  		
					Event Editor :: <small> Edit event and change status.  

                  			<?php }?>

                  	</small> <a class="pull-right close-link" href="#"><i class="fa fa-close"></i></a></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                    <li class="pull-right">
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
               
          </div>
          <div class="x_panel">
        	<div class="x_content">
        
                  <table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
					<tr>
						<th>Type</th>
						<th>Title</th>
						<th>Date</th>
						<th>Venue and Time</th>
						<th>Pax</th>
						<th width="20%">Contact Person</th>
						<th>Status</th>
						<th width="25%">

							
							Action
						</th>

					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($events as $event): ?>
						<tr>
						<td><?= $event->event_type_name; ?></td>
						<td><?= $event->event_title; ?></td>
						<td><?=date('M-d-y',strtotime($event->event_date))?></td>
						<td><?= $event->event_time." @ ".$event->event_venue; ?></td>
						<td><?= $event->event_pax; ?></td>
						<td>
						 	<?php $user=$this->client_m->get($event->client_id);
						 	echo $user->first_name.' '.$user->last_name?>
						</td>
						<td> <button class="<?='btn btn-xs '.$event->button_class;?>"><?= $event->status_name;?></button></td>
						<td>

							<?php if($m=='viewall'){ ?>
								 <a> 
                      
                        <form action="<?=site_url('event/changeStatus')?>" method="POST" class="form-horizontal form-label-left">
                    		    <?=  form_hidden('reservation_status_id',$event->reservation_status_id);?>
                    		      <?=  form_hidden('event_date',$event->event_date);?>
					       <div class="form-group">	
						     <div class="input-group">
			                          
			                    <?=  form_dropdown('status_id', $status, '', 'class="form-control"');?>
			                      

	                          	<span class="input-group-btn">
	                                   <button type="submit" class="btn btn-primary">Go!</button>
	                            </span>
	                        </div>
                         	</div>
                      	</form>
                      
                      </a>

							<?php }?>
						<?php if($m=='forapproval'){?>
					    
                    	<form action="<?=site_url('event/changeStatus')?>" method="POST" class="form-horizontal form-label-left">
                    		    <?=  form_hidden('reservation_status_id',$event->reservation_status_id);?>
                    		     
                    		         <?=  form_hidden('event_date',$event->event_date);?>
					       <div class="form-group">	
						     <div class="input-group">
			                          
			                    
			                       <select name="status_id" class="form-control" required>
                          <option value="">Select Action</option>
                          <option value="1">Approve</option>
                          <option value="4">Disapprove</option>
                        
                        </select>

	                          	<span class="input-group-btn">
	                                   <button type="submit" class="btn btn-primary">Go!</button>
	                            </span>
	                        </div>
                         	</div>
                      	</form>
                      
						
					     <?php }?>
					     <?php if($m=='approved'){?>
					     


					     
						     	 <a href="<?=site_url('event/planner/'.$event->reservation_id)?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Open Planner </a>
                          <a href="<?=site_url('event/invoice/'.$event->client_id)?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Print Invoice  </a>
                      		 
                      
					     	
					    
					     <?php } ?>
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



			