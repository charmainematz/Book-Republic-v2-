 

    	
			<!-- begin page-header -->
			<h1 class="page-header"><?="Genre <small>Control Panel</small>"?></h1>
			<!-- end page-header -->
           <div class="row">

			 <div class="panel panel-inverse">
			                        <div class="panel-heading">
			                            <div class="panel-heading-btn">
			                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
			                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			                            </div>
			                            <h4 class="panel-title">List of genres</h4>
			                        </div>
			                       
			        <div class="panel-body">
			        <div class="table-responsive">
			              <table id="data-table" class="table table-striped table-bordered" >
                                    <thead>
                                        <tr>
                                           
                                          
                                            <th class="hidden-sm">#</th>
                                            <th>Name</th>
                                             <th>No. of Books Listed</th>
                                                                       
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $ctr=1; foreach($genres as $genre):?>
                                        <tr>
                                           
                                            <td class="hidden-sm">
                                               <?=$ctr;?>
                                            </td>
                                            <td>
                                               <a href="javascript:;"><?=$genre->genre_name?></a>
                                            </td>
                                            <td><a href="javascript:;"></a></td>
                                            <td></td>
                                          
                                        </tr>
                                        <?php  $ctr=$ctr+1; endforeach;?>
                                    </tbody>
                                </table>

                        </div>   
				         
			          </div>
                       <div class="panel-footer">    
                            <a class="btn btn-sm btn-primary" onclick="add_genre()" data-toggle="modal"><i class="fa fa-plus"></i> Add <?=$page_title?></a>   
                        </div>
			      </div>
			</div>

     
    

			