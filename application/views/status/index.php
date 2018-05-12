
      <div class="row row-lg">
        <div class="col-md-6">  
          <div class="panel">
           <div class="panel-body container-fluid">
                <header class="panel-heading">
                <div class="panel-actions"></div>
                <h3 class="panel-title">Room Status</h3>
                </header>
                  
                <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                    <thead>
                      <tr>
                        <th width="20%">Name</th>
                        <th width="20%">Description</th>
                        <th width="15%">Actions</th>
                        
                      </tr>
                      </thead>
                      
                      <tbody>
                      <?php foreach ($status1 as $s1): ?>
                        <tr>
                        <td><?= $s1->status_name; ?></td>
                        <td><?= $s1->status_desc; ?></td>
                        
                        <td style="text-align: center;">
                        <a class="btn btn-sm btn-outline btn-icon btn-success" href="javascript:void(0)" title="Edit" onclick="edit_status(<?= $s1->status_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-sm btn-outline btn-icon btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_status(<?= $s1->status_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

                        
                        </td>
                        
                      </tr>
                      <?php endforeach ?>
                      
                      
                       </tbody>
                    </table>      
                       <button type="button"  onclick="add_status(1)" data-toggle="modal" class="btn btn-xs btn-floating btn-default"><i class="icon wb-plus" aria-hidden="true"></i></button>
                       
              </div>
           </div>
        </div>
       
        <div class="col-md-6"> 
          <div class="panel">
           <div class="panel-body container-fluid">
              <header class="panel-heading">
              <div class="panel-actions"></div>
              <h3 class="panel-title">Booking Status</h3>
              </header>
                
              <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th width="20%">Name</th>
                      <th width="20%">Description</th>

                      <th width="15%">Actions</th>
                      
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach ($status2 as $s2): ?>
                      <tr>
                      <td><?= $s2->status_name; ?></td>
                      <td><?= $s2->status_desc; ?></td>
                      
                      <td style="text-align: center;">
                      <a class="btn btn-sm btn-icon btn-success btn-outline" href="javascript:void(0)" title="Edit" onclick="edit_status(<?= $s2->status_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                      <a class="btn btn-sm btn-icon btn-danger btn-outline" href="javascript:void(0)" title="Delete" onclick="delete_status(<?= $s2->status_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

                      
                      </td>
                      
                    </tr>
                    <?php endforeach ?>
                    
                    
                     </tbody>
                  </table>      
                    <button type="button"  onclick="add_status(2)" data-toggle="modal" class="btn btn-xs btn-floating btn-default"><i class="icon wb-plus" aria-hidden="true"></i></button>
              </div>
            </div>
        </div>
      </div>
      <div class="row row-lg">
        <div class="col-md-6"> 
          <div class="panel">
           <div class="panel-body container-fluid">
              <header class="panel-heading">
              <div class="panel-actions"></div>
              <h3 class="panel-title">Payment Status</h3>
              </header>
                
              <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th width="20%">Name</th>
                      <th width="20%">Description</th>

                      <th width="15%">Actions</th>
                      
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach ($status3 as $s3): ?>
                      <tr>
                      <td><?= $s3->status_name; ?></td>
                      <td><?= $s3->status_desc; ?></td>
                      
                      <td style="text-align: center;">
                      <a class="btn btn-sm btn-outline btn-icon btn-success" href="javascript:void(0)" title="Edit" onclick="edit_status(<?= $s3->status_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                      <a class="btn btn-sm btn-outline btn-icon btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_status(<?= $s3->status_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

                      
                      </td>
                      
                    </tr>
                    <?php endforeach ?>
                    
                    
                     </tbody>
                  </table>      
                       <button type="button"  onclick="add_status(3)" data-toggle="modal" class="btn btn-xs btn-floating btn-default"><i class="icon wb-plus" aria-hidden="true"></i></button>
            </div>
        </div>
      </div>
        <div class="col-md-6"> 
          <div class="panel">
           <div class="panel-body container-fluid">
              <header class="panel-heading">
              <div class="panel-actions"></div>
              <h3 class="panel-title">Mail Status</h3>
              </header>
                
              <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                  <thead>
                    <tr>
                      <th width="20%">Name</th>
                      <th width="20%">Description</th>

                      <th width="15%">Actions</th>
                      
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach ($status4 as $s4): ?>
                      <tr>
                      <td><?= $s4->status_name; ?></td>
                      <td><?= $s4->status_desc; ?></td>
                      
                      <td style="text-align: center;">
                      <a class="btn btn-sm btn-icon btn-success btn-outline" href="javascript:void(0)" title="Edit" onclick="edit_status(<?= $s4->status_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                      <a class="btn btn-sm btn-icon btn-danger btn-outline" href="javascript:void(0)" title="Delete" onclick="delete_status(<?= $s4->status_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

                      
                      </td>
                      
                    </tr>
                    <?php endforeach ?>
                    
                    
                     </tbody>
                  </table>      
                        <button type="button"  onclick="add_status(4)" data-toggle="modal" class="btn btn-xs btn-floating btn-default"><i class="icon wb-plus" aria-hidden="true"></i></button>
            </div>
        </div>
      </div>
    </div>

  




			