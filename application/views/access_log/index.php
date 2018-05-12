		<!-- begin page-header -->
			<h1 class="page-header"><?=$page_title?> <small>Control Panel</small></h1>
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
			                            <h4 class="panel-title">Access Logs </h4>
			                        </div>
			                       
			        <div class="panel-body">
			       
			              <table id="data-table" class="table table-striped table-bordered nowrap" >
                                    <thead>
                                        <tr>
                                           
                                           <th>Date / Time</th>
                                                                                   
                                           <th>User</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $ctr=1; foreach($logs as $log):
                                    		$user =$this->user_m->get($log->user_id);

                                    	?>
                                        <tr>
                                           
                                            <td><?=date('M-d-y  H:i:s',strtotime($log->date_created));?></td>
                                             <td><?=$log->message?></td>
                                            <td> <a href="<?=site_url('user/profile/'.$log->user_id)?>"><?=$user->first_name." ".$user->last_name?></a></td>
                                          
                                       
                                         
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
			 				
				         
			          </div>
                     
			      </div>
			</div>

     
    

			