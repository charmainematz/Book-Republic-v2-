 <div class="row">   
 <div class="col-sm-8">

     <div class="panel panel-inverse" data-sortable-id="ui-media-object-4">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">New Books in the Library</h4>
                        </div>  
   		<div class="panel-body">

               <?php if ($this->session->flashdata('message') ): ?>
                 <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message')?></strong>
                 </div>
                 
                <?php endif ?>

                   <?php if ($this->session->flashdata('message2') ): ?>
                 <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message2')?></strong>
                 </div>
                 
                <?php endif ?>
			                   <div class="height-lg" data-scrollbar="true">
                                <table class="table table-responsive">
                                    <thead>
                                         
                                        <tr>
                                            <th  class="hidden-md">Date Added</th>
                                            <th >Book</th>
                                            <th>Genre</th>
                                            <th>Owner</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($books as $book):?>
                                        <tr>
                                            <td  class="hidden-md">  <?=date("M-d-y",strtotime(($book->date_added)))?></td>
                                            <td >

                                            	<a href="javascript:;" onclick="view_book('<?=$book->book_id;?>')">
                                                 <?php if($book->cover_photo!=null){?>
                                     <img style="height: 150px;width:110px" data-src="<?=site_url('upload/'.$book->cover_photo)?>" alt="image"  />
                                     <?php }else{?>
                                         <img style="height: 150px;width:120px; <?php if($book->status!='Available'){echo 'filter: grayscale(100%)';}?>" data-src="<?=site_url('images/nocover.jpg')?>" alt="no cover"  />
                                        <?php } ?>

                                    </a>
                                            </td>
                                            <td>
                                               <?=$book->genre_name?>
                                            </td>
                                            <td> <a href="<?=site_url('user/profile/'.$book->owner_id)?>">  <?=$book->first_name." ".$book->last_name?></a></td>
                                            <td><?=$book->status?></td>
                                        </tr>
                                       
                                          <?php endforeach?> 
                                       
                                    </tbody>
                                </table>
                            </div>
		</div>
	</div>
			        <!-- end panel -->
</div>		  

         <div class="col-sm-4">
            
                    <!-- end panel -->
             <div class="panel panel-inverse " data-sortable-id="ui-media-object-4" data-scrollbar="true">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Incoming Requests</h4>
                        </div>  
                 <div class="panel-body height-sm">
             

    			                <ul class="media-list media-list-with-divider">
    								<?php if(count($swap_requests)>0){

                                           foreach($swap_requests as $request):
                                                $friend= $this->user_m->get($request->sender_id );
                                                $img_src= site_url('images/profile.png');
                                                if($friend->photo!=null){
                                                    $img_src= site_url('upload/profile_photo/'.$friend->photo);
                                                }?>
                                                
                                                <li class="media media-sm">
                                                    <a class="media-left" href="javascript:;">
                                                        <img src="<?=$img_src?>"  alt="" class="media-object rounded-corner" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Swap Request</h4>
                                                        <p><a style="font-size: 16px" href="<?=site_url('user/profile/'.$friend->id)?>"><?=$friend->first_name." ".$friend->last_name?> </a><br> wants to swap
                                                        </p>                                   
                                                        <p>
                                                           <a href="javascript:;" class="btn btn-sm btn-danger m-r-5">Reject</a>
                                                           <a href="javascript:;" class="btn btn-sm btn-success">Accept</a>
                                                         </p>                                 
                                                    </div>
                                                  
                                                </li>
                                             <?php endforeach?>
                                    <?php } ?>
    								<?php if(count($borrow_requests)>0){

                                           foreach($borrow_requests as $request):
                                                $friend= $this->user_m->get($request->sender_id );
                                                $img_src= site_url('images/profile.png');
                                                if($friend->photo!=null){
                                                    $img_src= site_url('upload/profile_photo/'.$friend->photo);
                                                }?>
                                                
                                                <li class="media media-sm">
                                                    <a class="media-left hidden-md" href="javascript:;">
                                                        <img src="<?=$img_src?>"  alt="" class="media-object rounded-corner" />
                                                    </a>

                                                    
                                                    <div class="media-body">
                                                        <h4 class="media-heading hidden-md">Borrow Request</h4>
                                                        <p><a style="font-size: 16px" href="<?=site_url('user/profile/'.$friend->id)?>"><?=$friend->first_name." ".$friend->last_name?> </a><br> wants to borrow
                                                        </p>                                   
                                                        <p>
                                                           <a href="javascript:;" class="btn btn-sm btn-danger m-r-5">Reject</a>
                                                           <a href="javascript:;" class="btn btn-sm btn-success">Accept</a>
                                                         </p>                                 
                                                    </div>
                                                      <a class="media-right" href="javascript:;">
                                                        <img src="<?=site_url('upload/'.$book->cover_photo);?>"  alt="dsbf" class="media-object" />
                                                    </a>
                                                </li>
                                             <?php endforeach?>
                                    <?php } ?>
                                     <?php if(count($friend_requests)>0){

                                           foreach($friend_requests as $request):
                                                $friend= $this->user_m->get($request->sender_id );
                                                $img_src= site_url('images/profile.png');
                                                if($friend->photo!=null){
                                                    $img_src= site_url('upload/profile_photo/'.$friend->photo);
                                                }?>

                								<li class="media media-sm">
                                                    <a class="media-left" href="javascript:;">
                                                        <img src="<?=$img_src?>"  alt="" class="media-object rounded-corner" />
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Friend Request</h4>
                                                        <p><a style="font-size: 16px" href="<?=site_url('user/profile/'.$friend->id)?>"><?=$friend->first_name." ".$friend->last_name?> </a><br> wants to connect.
                                                        </p>                                   
                    									<p>
                    									   <a href="javascript:;" class="btn btn-sm btn-danger m-r-5">Reject</a>
                    									   <a href="<?=site_url('friend/accept/'.$request->friend_request_id)?>" class="btn btn-sm btn-success">Accept</a>
                    									 </p>                                 
                									</div>
                                                  
                								</li>
                                             <?php endforeach?>
                                    <?php } ?>
    							</ul>
              
    			</div>
			</div>
			        <!-- end panel -->
                      <div class="panel panel-inverse " data-sortable-id="ui-media-object-4">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Sent Requests</h4>
                        </div>  
                        <div class="panel-body height-sm">
                           
                        </div>
            </div>
          
		</div>		
</div> 
<?php  $this->load->view('book/scripts'); ?>
