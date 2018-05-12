 <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"><?= 'Current Checkins'?></h3>
        </header>
        <div class="panel-body">
       
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
					<thead>
					<tr>
						<th>Reference No</th>
						<th>Booked By</th>
						<th>Room</th>
						<th>Check in </th>
						<th>Check out </th>
						<th>No. of Guest </th>
						<th>Reservation Status </th>
						<th>Payment Status </th>
						<th style="text-align: center;" width="20%">---</th>
						
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($reservations as $reservation){?>
						<tr>
						<td><?= $reservation->reference_no; ?></td>
						<td><?= $reservation->firstname." ".$reservation->lastname?></td>
						<td><?= $reservation->room_name; ?></td>
						<td><?= $reservation->checkin_date; ?></td>
						<td><?= $reservation->checkout_date; ?></td>
						<td><?= $reservation->pax; ?></td>
						<td>
							

			                <div class="example">
			                  <select name="booking_status" class="show-tick" data-plugin="selectpicker">
			                  	<?php foreach ($status as $stat):?>
			                    	<option <?php if($reservation->status_id==$stat->status_id){ echo 'selected';}?> value="<?=$stat->status_id?>"><?=$stat->status_name?></option>

			               		<?php endforeach;?>
			                  </select>
			                </div>

						</td>
						<td> 

								 <div class="example">
					                  <select name="payment_status" class="show-tick" data-plugin="selectpicker">
					                  	<?php foreach ($payment as $pay):?>
					                    	<option <?php if($reservation->reservation_payment_status_id==$pay->payment_id){echo 'selected';}?> value="<?=$pay->payment_id?>"><?=$pay->payment_name?></option>
					               		<?php endforeach;?>
					                  </select>
                				</div>


						</td>
						
						<td style="text-align: center;">
							<a style="text-decoration: none;"  class="btn btn-sm btn-icon btn-primary" href="<?=site_url('booking/view/'.$reservation->reservation_id)?>" title=View ><i class="icon wb-eye" aria-hidden="true"></i></a>
					
					

						
						</td>
						
					</tr>
					<?php } ?>
					
					
					 </tbody>
	          </table>      
 				
	         
          </div>
</div>
	


			