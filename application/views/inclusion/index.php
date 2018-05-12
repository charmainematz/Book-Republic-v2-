 <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title"><?=$page_title." List"?></h3>
        </header>
        <div class="panel-body">
       
                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
					<thead>
					<tr>
						<th>Name</th>
						<th>Description</th>
						<th style="text-align: center;" width="20%">Actions</th>
						
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($inclusions as $inclusion): ?>
						<tr>
						<td><?= $inclusion->inclusion_name; ?></td>
						<td><?= $inclusion->inclusion_desc; ?></td>
						<td style="text-align: center;">
						<a class="btn btn-sm btn-icon btn-success" href="javascript:void(0)" title="Edit" onclick="edit_inclusion(<?= $inclusion->inclusion_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-icon btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_inclusion(<?= $inclusion->inclusion_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

						
						</td>
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      
 				<a class="btn btn-sm btn-primary" onclick="add_inclusion()" data-toggle="modal"><i class="fa fa-plus"></i> Add <?=$page_title?></a>   
	         
          </div>
</div>
	


			