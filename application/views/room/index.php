 <div class="row">
   <div class="col-sm-4">
          <!-- Widget -->
          <a onclick="add_room()" data-toggle="modal">
          <div class="widget">
            <div class="widget-content padding-30 bg-blue-600">
              <div class="widget-watermark darker font-size-60 margin-15"> <i class="icon wb-plus" aria-hidden="true"></i></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
              
                  <span class="counter-number-related text-capitalize"><?=count($rooms)?> Rooms </span>

                </div>
               <div class="counter-label text-capitalize">Add New Room</div>
              </div>
            </div>
          </div>
          </a>
          <!-- End Widget -->
        </div>

        <div class="col-sm-4">

          
          <!-- Widget -->
          <div class="widget">
            <div class="widget-content padding-30 bg-green-600">
              <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-check" aria-hidden="true"></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number"><?=count($vacant)?></span>
                  <span class="counter-number-related text-capitalize">Vacant</span>
                </div>
                <div class="counter-label text-capitalize">rooms</div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </div>
        <div class="col-sm-4">
          <!-- Widget -->
          <div class="widget">
            <div class="widget-content padding-30 bg-red-600">
              <div class="widget-watermark darker font-size-60 margin-15"><i class="icon wb-close" aria-hidden="true"></i></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number"><?=count($occupied)?></span>
                  <span class="counter-number-related text-capitalize">Occupied</span>
                </div>
                <div class="counter-label text-capitalize">rooms</div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </div>
  </div>

 <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">Room List</h3>
        </header>
        <div class="panel-body">
       
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
          <thead>
          <tr><th width="30%"></th>
            <th width="15%">Name</th>
            <th>Description</th>
            <th>Rate</th>
            <th>Vacancy</th>
            <th style="text-align: center;" width="20%">Actions</th>
            
          </tr>
          </thead>
          
          <tbody>
          <?php foreach ($rooms as $room): ?>
            <tr>
            <td> 
              <?php $file= $this->room_photo_m->get_cover_photo($room->room_id);
              if($file==""){
                          $file = 'coming_soon.png';
                        }
              ?>
              <img  height="150px" width="250px" src="<?=site_url('upload/rooms/'.$file)?>" alt=" " class="img-responsive" /></td>
            <td><?= $room->room_name; ?></td>
            <td><?= $room->description; ?></td>
          
            <td><?= $room->rate_per_night; ?></td>
            <td> 

              <div class="pull-left margin-right-20">
                <?php
                  $url =site_url('room/setToVacant');
                  if($room->room_status_id==5){
                    $url = site_url('room/setToOccupied');

                  }
                ?>
                          <form method="POST" action="<?=$url?>">

                               
                                <input name="room_id" value="<?=$room->room_id?>" type="hidden">
                       
                                

                          <input type="checkbox" id="inputBasicOn" <?php if( $room->room_status_id==5){echo 'checked';}?> onchange="this.form.submit()"  name="inputiCheckBasicCheckboxes" data-plugin="switchery" data-size="small"/>
                          </form>
                        </div>
                    </td>
            <td style="text-align: center;">
                <a class="btn btn-sm btn-icon btn-success" href="javascript:void(0)" title="Edit" onclick="edit_room(<?= $room->room_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
              <a class="btn btn-sm btn-icon btn-danger" title="Delete" href="<?=site_url('room/delete/'.$room->room_id);?>" ><i class="icon wb-trash" aria-hidden="true"></i></a>
            
            </td>
            
          </tr>
          <?php endforeach ?>
          
          
           </tbody>
            </table>      
        
           
          </div>
</div>
  


   