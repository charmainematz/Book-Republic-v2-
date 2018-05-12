 <div class="panel">
        <header class="panel-heading">
         
          <h3 class="panel-title"><?=$page_title." List"?></h3>
        </header>
        <div class="panel-body">
       
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
					<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th width="20%">Actions</th>
						
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($room_types as $room_type): ?>
						<tr>
						<td><?= $room_type->room_type_name; ?></td>
						<td><?= $room_type->room_type_desc; ?></td>
						<td>
						<a class="btn btn-sm btn-icon btn-success" href="javascript:void(0)" title="Edit"  onclick="edit_room_type(<?= $room_type->room_type_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-icon btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_room_type(<?= $room_type->room_type_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

					
						</td>
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      
 				<a class="btn btn-sm btn-primary" onclick="add_room_type()" data-toggle="modal"><i class="fa fa-plus"></i> Add <?=$page_title?></a>   
	         
          </div>
</div>
	


	