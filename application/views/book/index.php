 

    	
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
			                            <h4 class="panel-title">List of Books</h4>
			                        </div>
			                       
			        <div class="panel-body">
			       
			              <table id="data-table" class="table table-striped table-bordered nowrap" >
                                    <thead>
                                        <tr>
                                           
                                            <th width="5%">Cover</th>
                                              <th class="hidden-sm">Title</th>
                                                <th>Author</th>
                                            <th>Genre</th>
                                            <th>Condition</th>
                                            <th>Owner</th>
                                           <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php foreach($books as $book):?>
                                        <tr>
                                           
                                            <td class="hidden-sm">
                                                <a href="javascript:;">
                                                    <img style="height:70px;width: 50px" data-src="<?=site_url('upload/'.$book->cover_photo)?>" alt=""  />
                                                </a>
                                            </td>
                                            <td>
                                                <a href="javascript:;"><?=$book->title?></a>
                                            </td>
                                               <td><a href="javascript:;"><?=$book->author_name?></a></td>
                                            <td><?=$book->genre_name?></td>
                                             <td><?=$book->book_condition_name?></td>
                                             <td><?=$book->first_name." ".$book->last_name?></td>
                                            <td></td>
                                         
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
			 				
				         
			          </div>
                      <div class="panel-footer">
                        <a class="btn btn-sm btn-success" onclick="add_book()" data-toggle="modal"><i class="fa fa-plus"></i> Add Book</a>   
                      </div>
			      </div>
			</div>

     
    

			