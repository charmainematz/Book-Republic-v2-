
<div class="">
  	<div class="page-title">
	    <div class="title_left">
	      <h3>	<?= $page_title; ?> </h3>
	    </div>

   
  	</div>
  	<div class="clearfix"></div>

  	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel">
                <div class="" >
                  <h2> <i style="color:blue;" class="fa fa-info-circle"></i> Manage List :: <small> Create, edit, delete type of packages</small> <a class="pull-right close-link" href="#"><i class="fa fa-close"></i></a></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                    <li class="pull-right">
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
               
          </div>
          <div class="x_panel">
        	<div class="x_content">
        
                  <table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
					<tr>
							<th>Service Type</th>
						<th>Name</th>
					
						<th>Inclusions</th>
						<th>Cost</th>
						<th width="20%">Actions</th>
						
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($packages as $package): ?>
						<tr>
							<td><?= $this->service_m->get($package->service_id)->service_name; ?></td>
						<td><?= $package->package_name; ?></td>
						<td style="white-space: pre-line"><?= htmlspecialchars_decode($package->inclusion); ?></td>
						<td><?= $package->cost; ?></td>
						<td>
						<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Edit" onclick="edit_package(<?= $package->package_id; ?>)"><i class="glyphicon glyphicon-pencil"></i></a>
						<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_package(<?= $package->package_id; ?>)"><i class="glyphicon glyphicon-trash"></i></a>
						</td>
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      

	       
          </div>
              <a class="btn btn-sm btn-primary" onclick="add_package()" data-toggle="modal"><i class="fa fa-plus"></i> Add <?=$page_title?></a>        
      	</div>
  		</div>		
	</div>	
</div>	



			