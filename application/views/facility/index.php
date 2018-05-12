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
						<th>Active</th>
						<th style="text-align: center;" width="20%">Actions</th>
						
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($facilities as $facility): ?>
						<tr>
						<td><?= $facility->facility_name; ?></td>
						<td><?= $facility->facility_desc; ?></td>
						<td> 

							<div class="pull-left margin-right-20">
								<?php
									$url =site_url('facility/activate');
									if($facility->active==1){
										$url = site_url('facility/deactivate');

									}
								?>
                    		  <form method="POST" action="<?=$url?>">

                               
                                <input name="facility_id" value="<?=$facility->facility_id?>" type="hidden">
                       
                                

                    			<input type="checkbox" id="inputBasicOn" <?php if($facility->active==1){echo 'checked';}?> onchange="this.form.submit()"  name="inputiCheckBasicCheckboxes" data-plugin="switchery" data-size="small"/>
                  				</form>
                  			</div>
              			</td>
						<td style="text-align: center;">
						<a class="btn btn-sm btn-icon btn-success" href="javascript:void(0)" title="Edit" onclick="edit_facility(<?= $facility->facility_id; ?>)"><i class="icon wb-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-sm btn-icon btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_facility(<?= $facility->facility_id; ?>)"><i class="icon wb-trash" aria-hidden="true"></i></a>

						
						</td>
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      
 				<a class="btn btn-sm btn-primary" onclick="add_facility()" data-toggle="modal"><i class="fa fa-plus"></i> Add <?=$page_title?></a>   
	         
          </div>
</div>
	


			