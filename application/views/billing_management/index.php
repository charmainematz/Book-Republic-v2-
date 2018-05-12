 <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"><?=$page_title." List"?></h3>
        </header>
        <div class="panel-body">
       
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
					<thead>
					<tr>
						<th>Status</th>
						<th>Reference No</th>
						<th>Booked By</th>
						<th>Room</th>

	                     <th>Due Date</th>
	                  
	                     <th>Balance</th>
                            
					
						<th style="text-align: center;" width="20%">Manage Bill</th>
						
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($reservations as $reservation):?>
						<tr>
						<td>
							
						 <?= $reservation->payment_name; ?>	</td>
						<td><a  href="<?=site_url('booking/view/'.$reservation->reservation_id)?>" title=View ><?= $reservation->reference_no; ?></a></td>
						<td><?= $reservation->firstname." ".$reservation->lastname?></td>
						<td><?= $reservation->room_name; ?></td>
						<td>
							<?= $reservation->due_date; ?>
						</td>
						<td>
							<?php if($reservation->payment_name!='Unpaid'){?>
							<?= $reservation->balance; 
							}else{?>

							<?= ($reservation->cost+$reservation->addon_cost); 
							}
							?>

						</td>
						
						
						
						<td> 

								 <div  style="text-align: center;">
					              <button data-toggle="modal" class="btn btn-sm btn-icon btn-primary" onclick="add_payment('<?=$reservation->reference_no?>')" title=View >Add Payment</button>
                				</div>


						</td>
						
						
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      
 				
	         
          </div>
</div>
	


			