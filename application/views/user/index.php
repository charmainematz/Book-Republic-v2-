 

    	
			<!-- begin page-header -->
			<h1 class="page-header"><?=$c?> <small>Control Panel</small></h1>
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
			                            <h4 class="panel-title">List of users</h4>
			                        </div>
			                       
			        <div class="panel-body">
			       
			              <table id="data-table" class="table table-striped table-bordered nowrap" >
                                    <thead>
                                        <tr>
                                           
                                            <th class="hidden-sm">Photo</th>
                                              <th class="hidden-sm">Name</th>
                                                <th>Email Address</th>
                                            <th>Active</th>
                                          
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($users as $user):?>
                                        <tr>
                                           
                                            <td class="hidden-sm text-center">

                            <?php
                              $img_src= site_url('images/profile.png');
                              if($user->photo!=null){
                                    $img_src= site_url('upload/profile_photo/'.$user->photo);
                              }
                            ?>
                         
                            <i class="fa fa-user hide"></i>

                       
                               <img style="width:50px" src="<?=$img_src?>"  alt="profile_photo">
                            
                                               
                                            </td>
                                            <td>
                                                <a href="<?=site_url('user/profile/'.$user->id)?>"><?=$user->first_name." ".$user->last_name?></a>
                                            </td>
                                               <td><a href="javascript:;"><?=$user->email?></a></td>
                                            <td><?=$user->active?></td>
                                            <td></td>
                                         
                                        </tr>

                                    <?php endforeach; ?>
                                        
                                    </tbody>
                                </table>
			 			
				         
			          </div>
			      </div>
			</div>

     
    

			