 

    	
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
			                            <h4 class="panel-title">Activity Logs </h4>
			                        </div>
			                       
			        <div class="panel-body">
			       
			              <table id="data-table" class="table table-striped table-bordered nowrap" >
                                    <thead>
                                        <tr>
                                           
                                             <th>Date</th>
                                         
                                           
                                           <th>Activity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $ctr=1; foreach($logs as $log):?>
                                        <tr>
                                           
                                            <td><?=date('M-d-y',strtotime($log->date_created));?></td>
                                            <td> <a href="javascript:;"><?=$log->message?></td>
                                          
                                       
                                         
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
			 				
				         
			          </div>
                     
			      </div>
			</div>

     
    

			