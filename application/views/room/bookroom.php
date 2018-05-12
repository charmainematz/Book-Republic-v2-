
   <div style="background-color: transparent;" class="panel">

    

     	<div class="panel-body">
              <form class="inline" action="<?=site_url('room/showAvailability')?>" method="GET" novalidate> 
                <div class="form-group col-md-3">
             
              	   <strong><h4> <label  style="color: #867666" class="control-label" for="out">No. of Guest</label></h4></strong>
                 <select name="pax" class="form-control">
                         
                          <option <?php if($pax==1) echo 'selected'?> value="1">1 adult</option>
                          <option  <?php if($pax==2) echo 'selected'?> value="2">2 adults</option>
                          <option <?php if($pax==3) echo 'selected'?> value="3">3 adults</option>
                          <option  <?php if($pax==4) echo 'selected'?> value="4">4 adults</option>
                          <option  <?php if($pax==5) echo 'selected'?> value="5">5 adults</option>
                          <option  <?php if($pax==6) echo 'selected'?> value="6">6 adults</option>
                          <option  <?php if($pax==7) echo 'selected'?> value="7">7 adults</option>
                          <option  <?php if($pax==8) echo 'selected'?> value="8">8 adults</option>
                          <option  <?php if($pax==9) echo 'selected'?> value="9">9 adults</option>
                          <option  <?php if($pax==10) echo 'selected'?> value="10">10 adults</option>
                          <option  <?php if($pax==11) echo 'selected'?> value="11">11 adults</option>
                          <option  <?php if($pax==12) echo 'selected'?> value="12">12 adults</option>
                          <option  <?php if($pax==13) echo 'selected'?> value="13">13 adult</option>
                          <option  <?php if($pax==14) echo 'selected'?> value="14">14 adults</option>
                          <option  <?php if($pax==15) echo 'selected'?> value="15">15 adults</option>
                 </select>
                </div>

                
          
 

                <div class="form-group col-md-3">
                    <h4> <label  style="color: #867666" class="control-label" for="out">Arrival Date</label></h4>
            		
            		    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="icon wb-calendar" aria-hidden="true"></i>
                      </span>
                          <input id="checkin" type="text" name="in" value="<?=$in?>" class="form-control"/>
                    </div>
                </div>
                <div class="form-group col-md-3">
                       <h4> <label  style="color: #867666" class="control-label" for="out">Departure Date</label></h4>
            		

            		    <div class="input-group">
                    <span class="input-group-addon">
                      <i class="icon wb-calendar" aria-hidden="true"></i>
                    </span>
                    <input type="text"  id="out" value="<?=$out?>" name="out" class="form-control" >
                  </div>
                </div>
               

 
                <div class="form-group col-md-3">
                 <h4> <label  style="color: #867666" class="control-label" for="out">Check Availability</label></h4>
                   <button name="homebutton" value="viewAvailability"  onclick="this.form.submit()" class="btn btn-primary">Check Date </button>
                </div>
              </form>
         
        </div>
      </div>
      <!-- End Panel Inline Form -->

 <div class="panel">
    <?php if($this->session->flashdata('message2')) {
            

            if($this->session->flashdata('message2')=='yes'){
              $message = 'Your chosen date is available! Secure your slot below.';
              $alert = 'alert-success';
            }else{
               $message = 'Your chosen date is unavailable. Please pick another date.';
                 $alert = 'alert-danger';
            } ?>
            <div class="alert <?=$alert?> alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                   <?php echo $message; ?>
                </div>
            
        <?php } ?>

     


        <div class="panel-body">

       
                  <table  class="room_details table table-hover dataTable table-striped width-full " data-plugin="dataTable">
					<thead>
					<tr>
            <th width="20%">Room</th>
						<th width="35%">Description</th>
						<th width="10%">Rate</th>
						<th width="10%">Action</th>				
					</tr>
					</thead>
					
					<tbody>
					<?php if(count($rooms)>0){?>
             <?php foreach ($rooms as $room): ?>
          				<tr >
          						<td> 
          							<h5><?= $room->room_name; ?></h5>
                      <h5>  Room Type ID:  <?= $room->room_type_id?></h5>
                        <h5><i class="icon fa-user-times" aria-hidden="true"></i> <?= $room->maximum_pax; ?></h5>
          							<?php $file= $this->room_photo_m->get_cover_photo($room->room_id);
          							if($file==""){
                              			$file = 'coming_soon.png';
                            			}
          							?>
          							<img  height="150px" width="250px" src="<?=site_url('upload/rooms/'.$file)?>" alt=" " class="img-responsive" />

          							<div class="example-wrap">
                         
                          <div class="example" id="exampleGallery">
                            <a class="inline-block" href="<?=site_url('upload/rooms/'.$file)?>" title="view-4">
                              <img class="img-responsive" src="<?=site_url('upload/rooms/'.$file)?>" alt="..."
                              width="50" />
                            </a>
                            <a class="inline-block" href="<?=site_url('upload/rooms/'.$file)?>" title="view-5">
                              <img class="img-responsive" src="<?=site_url('upload/rooms/'.$file)?>" alt="..."
                              width="50" />
                            </a>
                            <a class="inline-block" href="<?=site_url('upload/rooms/'.$file)?>" title="view-6">
                              <img class="img-responsive" src="<?=site_url('upload/rooms/'.$file)?>" alt="..."
                              width="50" />
                            </a>
                          </div>
                        </div>

          						</td>
          						
          						<td>
          							
          								<?= $room->description; ?><br><br>
          							Inclusions:
          						
          							<fieldset style=" border: 1px solid lightgray;">
          								<?php 
          								$inclusions= $this->room_inclusion_m->get_room_inclusion($room->room_id);
          								foreach($inclusions as $i){?>

          									<ul style="list-style-type:square">
          		  								<li><?=$i->inclusion_name;?></li>
          		 
          									</ul>
          								
          							<?php } ?>

          							</fieldset>

          							

          						</td>
          					
          						<td><?="Php ". $room->rate_per_night; ?></td>
          						<td>   
                         
                         
                            <input  id="<?="room_id".$room->room_id?>"  name="room_id" value="<?= $room->room_id?>" type="hidden">
                            <input  id="<?="in".$room->room_id?>" name="checkin_date" value="<?=$in?>" type="hidden">
                            <input  id="<?="out".$room->room_id?>"  name="checkout_date" value="<?=$out?>" type="hidden">
                            <input  id="<?="pax".$room->room_id?>" name="pax" value="<?=$pax?>" type="hidden">
                            <input  id="<?="cost".$room->room_id?>" name="cost" value="<?=$room->rate_per_night?>" type="hidden">
                            <input  id="<?="room_name".$room->room_id?>" name="room_name" value="<?=$room->room_name?>" type="hidden">
                              



                                    <?php if($room->room_type_id==8){?>
                                         <select  id="<?=$room->room_id?>" onchange ="book(this.id)" name="quantity" class="form-control bookroom" style="background-color: #46be8a; color:white">
                                          <option value="0"> Book bed/(s) </option>
                                       

                                        <?php for($i=1;$i<=$room->maximum_pax;$i++){ ?>
                                            <option value="<?=$i?>"><?=$i?> </option>

                                       <?php } ?>
                                        </select>
                                   <?php }else{?>
                                      <input   type="button" id="<?=$room->room_id?>" name="homebutton" value="Book Room" onclick="book(this.id)" class="bookroom book_btn btn btn-success"> 
                            <?php } ?>
                              
                             
          								    
                              
                          
          						
                      </td>
          						
          						
					       </tr>
					   <?php endforeach; ?>

          <?php }?>
					
					
					 </tbody>
	          </table>      
 				
	         
          </div>
</div>

