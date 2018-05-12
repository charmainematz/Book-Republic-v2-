
<div class="row">
	
	  <div class="col-md-12 col-xs-12 masonry-item">
          <div class="widget">
            <div class="widget-header bg-blue-600 white padding-15 clearfix">
              
              <div class="font-size-18"><?= $user->first_name." ".$user->last_name?></div>
              <div class=" font-size-14">Admin </div>
            </div>
            <div class="widget-content">
              <ul class="list-group list-group-bordered">
                
                <li class="list-group-item">
               
                  <i class="icon wb-user" aria-hidden="true" draggable="true"></i>
                  <?=$user->username?>                 
                </li>
                <li class="list-group-item">
                  <i class="icon wb-envelope" aria-hidden="true" draggable="true"></i>                  
                   <?=$user->email?>      
                </li>
                 <li class="list-group-item">
                  <i class="icon wb-lock" aria-hidden="true" draggable="true"></i>                  
                  <a href="<?=site_url('auth/change_password/'.$user->id)?>">Change Password</a>
                </li>
              </ul>
            </div>
          </div>
        </div> 

</div>

<div class="panel">
  <div class="panel-body">
<h4>Administrator List</h4>

                  <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
					<thead>
					<tr>
						<th>Name</th>
						<th>Username</th>
						
					
						<th width="20%">Active</th>
					
					</tr>
					</thead>
					
					<tbody>
					<?php foreach ($users as $user): ?>

						<tr>

						<td><?= $user->first_name." ".$user->last_name; ?></td>
						<td><?=$user->username?></td>
						
						
						<td>
						
						<?php if($user->id!=1){?>
							<div class="pull-left margin-right-20">
								<?php
									$url =site_url('user/activate/'.$user->id);
									if($user->active==1){
										$url = site_url('user/deactivate/'.$user->id);

									}
								?>
                    		  <form method="POST" action="<?=$url?>">

                               
                                <input name="id" value="<?=$user->id?>" type="hidden">
                       
                                

                    			<input type="checkbox" id="inputBasicOn" <?php if($user->active==1){echo 'checked';}?> onchange="this.form.submit()"  name="inputiCheckBasicCheckboxes" data-plugin="switchery" data-size="small"/>
                  				</form>
                  			</div>
                  			<?php }?>
						
						</td>
						
					</tr>
					<?php endforeach ?>
					
					
					 </tbody>
	          </table>      
 				<a class="btn btn-sm btn-primary" href="<?=site_url('auth/create_user')?>"><i class="fa fa-plus"></i> New Account</a>   
	</div>
    
</div>
			