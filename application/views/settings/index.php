 <div class="row">
   

       
        
         <div class="col-sm-3">

          
          <!-- Widget -->
           <a href="<?=site_url('addon')?>">
          <div class="widget">
            <div class="widget-content padding-30 bg-blue-600">
              <div class="widget-watermark darker font-size-60 margin-15"></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number">Add-ons</span>
                 
                </div>
                <div class="counter-label text-capitalize"><?=count($addons)?></div>
              </div>
            </div>
          </div>
           </a>
          <!-- End Widget -->
        </div>
        <div class="col-sm-3">
          <!-- Widget -->
          <a href="<?=site_url('room_type')?>">
          <div class="widget">
            <div class="widget-content padding-30 bg-green-600">
              <div class="widget-watermark darker font-size-60 margin-15"></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
              
                  <span class="counter-number-related text-capitalize">Room Types</span>

                </div>
               <div class="counter-label text-capitalize"><?=count($room_types)?></div>
              </div>
            </div>
          </div>
          </a>
          <!-- End Widget -->
        </div>
      
          <div class="col-sm-3">
          <!-- Widget -->
          <a href="<?=site_url('facility')?>">
          <div class="widget">
            <div class="widget-content padding-30 bg-orange-600">
              <div class="widget-watermark darker font-size-60 margin-15"></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number">Facilities</span>
                 
                </div>
                <div class="counter-label text-capitalize"><?=count($facilities)?></div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </a>
        </div>
          <div class="col-sm-3">
          <!-- Widget -->
          <a href="<?=site_url('inclusion')?>">
          <div class="widget">
            <div class="widget-content padding-30 bg-red-600">
              <div class="widget-watermark darker font-size-60 margin-15"></div>
              <div class="counter counter-md counter-inverse text-left">
                <div class="counter-number-group">
                  <span class="counter-number">Inclusions</span>
                 
                </div>
                <div class="counter-label text-capitalize"><?=count($inclusions)?></div>
              </div>
            </div>
          </div>
          <!-- End Widget -->
        </a>
        </div>


  </div>
   <div class="row">
    <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">List of Room Inclusions</h3>
        </header>
        <div class="panel-body">
       
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
          <thead>
          <tr>
            <th>Room ID</th>
            <th>Room Name</th>
            <th>Inclusion Name</th>
            <th>Inclusion Desc</th>
            <th style="text-align: center;" width="20%">Actions</th>
            
          </tr>
          </thead>
          
          <tbody>
          <?php foreach ($room_inclusions as $inc): ?>
            <tr>
               <td><?= $inc->room_id; ?></td>
              <td><?= $inc->room_name; ?></td>
            <td><?= $inc->inclusion_name; ?></td>
            <td><?= $inc->inclusion_desc; ?></td>
            <td style="text-align: center;">                
                  <a class="btn btn-sm btn-icon btn-danger" title="Delete" href="<?=site_url('room_inclusion/delete/'.$inc->room_inclusion_id);?>" ><i class="icon wb-trash" aria-hidden="true"></i></a>
            </td>
            
          </tr>
          <?php endforeach ?>
          
          
           </tbody>
            </table>      
      
          </div>
</div>
  


      
  </div>


     
  