 

    	
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
			                            <h4 class="panel-title">List of Authors</h4>
			                        </div>
			                       
			        <div class="panel-body">
			       
			              <table id="data-table" class="table table-striped table-bordered nowrap" >
                                    <thead>
                                        <tr>
                                           
                                             <th>#</th>
                                          <th>Author Name</th>
                                           
                                           <th>Number of Books Listed</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $ctr=1; foreach($authors as $author):?>
                                        <tr>
                                           
                                            <td><?=$ctr;?></td>
                                            <td> <a href="javascript:;"><?=$author->author_name?></td>
                                          
                                            <td><?=count($this->book_m->get_Books_By_Author($author->author_id))?></td>
                                         
                                        </tr>
                                        <?php $ctr=$ctr+1; endforeach;?>
                                    </tbody>
                                </table>
			 				
				         
			          </div>
                     
			      </div>
			</div>

     
    

			