 <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"><?=$page_title." List"?></h3>
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
						<th>Status </th>		
						<th style="text-align: center;" width="15%">---</th>
						
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
						
						<td> <?= $reservation->status_id; ?></td>
						<td style="text-align: center;">
							<a style="text-decoration: none;"  class="btn btn-sm btn-icon btn-primary" href="<?=site_url('booking/view/'.$reservation->reservation_id)?>" title=View >View</a>
					
					

						
						</td>
						
					</tr>
					<?php } ?>
					
					
					 </tbody>
	          </table>      
 				
	         
          </div>
</div>
	


			