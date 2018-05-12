<?php if ($this->ion_auth->is_admin()) { ?>
            <!-- begin page-header -->
        
            <!-- end page-header -->
            
            <!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-green">
                        <div class="stats-icon"><i class="fa fa-book"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL BOOKS LISTED</h4>
                            <p><?=count($books)?></p>    
                        </div>
                        <div class="stats-link">
                            <a href="<?=site_url('book')?>">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-purple">
                        <div class="stats-icon"><i class="fa fa-users"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL VISITORS</h4>
                            <p>122</p>    
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-blue">
                        <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL VISITORS</h4>
                            <p>204</p>   
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-red">
                        <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
                        <div class="stats-info">
                            <h4>AVG TIME ON SITE</h4>
                            <p>00:12:23</p> 
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row" >
                <!-- begin col-8 -->
                <div class="col-md-8" >
                       <ul class="nav nav-tabs nav-tabs-inverse nav-justified nav-justified-mobile" data-sortable-id="index-2">
                        <li class="active"><a href="#latest-post" data-toggle="tab"><i class="fa fa-bolt m-r-5"></i> <span class="hidden-xs">Newly Added Books</span></a></li>
                        <li class=""><a href="#purchase" data-toggle="tab"><i class="fa fa-share m-r-5"></i> <span class="hidden-xs">Book Borrows</span></a></li>
                        <li class=""><a href="#email" data-toggle="tab"><i class="fa fa-exchange m-r-5"></i> <span class="hidden-xs">Book Swaps</span></a></li>
                    </ul>
                    <div class="tab-content" data-sortable-id="index-3" >
                        <div class="tab-pane fade active in" id="latest-post">
                            
                              <div class="height-lg" data-scrollbar="true">
                                <table class="table">
                                    <thead>
                                         
                                        <tr>
                                            <th class="hidden-sm"> Date</th>
                                            <th >Book</th>
                                            <th class="hidden-sm">Genre</th>
                                            <th>Owner</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($books as $book):?>
                                        <tr>
                                            <td class="hidden-sm">  <?=date("M-d-y",strtotime(($book->date_added)))?></td>
                                            <td >

                                                  <?php if($this->session->userdata('user_id')!=$book->owner_id){?>
                                                <a href="javascript:;" onclick="view_book('<?=$book->book_id;?>')">
                                                 <?php if($book->cover_photo!=null){?>
                                     <img style="height: 150px;width:110px" data-src="<?=site_url('upload/'.$book->cover_photo)?>" alt="image"  />
                                     <?php }else{?>
                                         <img style="height: 150px;width:120px" data-src="<?=site_url('images/nocover.jpg')?>" alt="no cover"  />
                                        <?php } ?>
                                           </a> 
                                             <?php }else{?>

                                                     <a href="javascript:;" onclick="edit_book('<?=$book->book_id;?>')">
                                                 <?php if($book->cover_photo!=null){?>
                                     <img style="height: 150px;width:110px; <?php if($book->status!='Available'){echo 'filter: grayscale(100%)';}?>" data-src="<?=site_url('upload/'.$book->cover_photo)?>" alt="image"  />
                                     <?php }else{?>
                                         <img style="height: 150px;width:120px" data-src="<?=site_url('images/nocover.jpg')?>" alt="no cover"  />
                                        <?php } ?>
                                           </a> 
                                                <?php }?>

                                            </td>
                                            <td class="hidden-sm">
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
                        <div class="tab-pane fade" id="email">
                           <div class="height-lg" data-scrollbar="true">
                                <ul class="media-list media-list-with-divider">
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="assets/img/gallery/gallery-1.jpg" alt="" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Aenean viverra arcu nec pellentesque ultrices. In erat purus, adipiscing nec lacinia at, ornare ac eros.</h4>
                                            Nullam at risus metus. Quisque nisl purus, pulvinar ut mauris vel, elementum suscipit eros. Praesent ornare ante massa, egestas pellentesque orci convallis ut. Curabitur consequat convallis est, id luctus mauris lacinia vel. Nullam tristique lobortis mauris, ultricies fermentum lacus bibendum id. Proin non ante tortor. Suspendisse pulvinar ornare tellus nec pulvinar. Nam pellentesque accumsan mi, non pellentesque sem convallis sed. Quisque rutrum erat id auctor gravida.
                                        </div>
                                    </li>
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="assets/img/gallery/gallery-10.jpg" alt="" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Vestibulum vitae diam nec odio dapibus placerat. Ut ut lorem justo.</h4>
                                            Fusce bibendum augue nec fermentum tempus. Sed laoreet dictum tempus. Aenean ac sem quis nulla malesuada volutpat. Nunc vitae urna pulvinar velit commodo cursus. Nullam eu felis quis diam adipiscing hendrerit vel ac turpis. Nam mattis fringilla euismod. Donec eu ipsum sit amet mauris iaculis aliquet. Quisque sit amet feugiat odio. Cras convallis lorem at libero lobortis, placerat lobortis sapien lacinia. Duis sit amet elit bibendum sapien dignissim bibendum.
                                        </div>
                                    </li>
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="assets/img/gallery/gallery-7.jpg" alt="" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Maecenas eget turpis luctus, scelerisque arcu id, iaculis urna. Interdum et malesuada fames ac ante ipsum primis in faucibus.</h4>
                                            Morbi placerat est nec pharetra placerat. Ut laoreet nunc accumsan orci aliquam accumsan. Maecenas volutpat dolor vitae sapien ultricies fringilla. Suspendisse vitae orci sed nibh ultrices tristique. Aenean in ante eget urna semper imperdiet. Pellentesque sagittis a nulla at scelerisque. Nam augue nulla, accumsan quis nisi a, facilisis eleifend nulla. Praesent aliquet odio non imperdiet fringilla. Morbi a porta nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae.
                                        </div>
                                    </li>
                                    <li class="media media-lg">
                                        <a href="javascript:;" class="pull-left">
                                            <img class="media-object" src="assets/img/gallery/gallery-8.jpg" alt="" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec auctor accumsan rutrum.</h4>
                                            Fusce augue diam, vestibulum a mattis sit amet, vehicula eu ipsum. Vestibulum eu mi nec purus tempor consequat. Vestibulum porta non mi quis cursus. Fusce vulputate cursus magna, tincidunt sodales ipsum lobortis tincidunt. Mauris quis lorem ligula. Morbi placerat est nec pharetra placerat. Ut laoreet nunc accumsan orci aliquam accumsan. Maecenas volutpat dolor vitae sapien ultricies fringilla. Suspendisse vitae orci sed nibh ultrices tristique. Aenean in ante eget urna semper imperdiet. Pellentesque sagittis a nulla at scelerisque.
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="purchase">
                                <div class="height-lg" data-scrollbar="true">
                                <table class="table">
                                    <thead>
                                         
                                        <tr>
                                            <th class="hidden-sm">Date</th>
                                            <th>Borrower</th>
                                            <th style="text-align: center">Book</th>                                          
                                            <th>Owner</th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                       
                                    <?php foreach($borrowed_books as $borrowed):
                                        $borrower = $this->user_m->get($borrowed->sender_id);
                                        $owner = $this->user_m->get($borrowed->receiver_id);?>
                                        <tr>
                                            <td class="hidden-sm">  <?=date("M-d-y",strtotime(($book->date_added)))?></td>
                                            <td class="text-center">
                                                <a href="javascript:;">
                                                <img height="100px" src="<?=site_url('upload/profile_photo/'.$borrower->photo)?>" alt="" class="media-object rounded-corner" />
                                                <p><?=$borrower->first_name." ".$borrower->last_name?></p>
                                                 </a>

                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:;" class="text-center" >
                                                <img style="height: 150px;width:110px"  src="<?=site_url('upload/'.$borrowed->cover_photo)?>" alt=""  />
                                                <p><?=$borrowed->title?></p>
                                                 </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="javascript:;" >
                                                <img height="100px" src="<?=site_url('upload/profile_photo/'.$borrower->photo)?>" alt="" class="media-object rounded-corner" />
                                                <p><?=$owner->first_name." ".$owner->last_name?></p>
                                                 </a>
                                            </td>
                                           
                                        </tr>
                                       
                                          <?php endforeach?> 
                                       
                                    </tbody>
                                </table>
                            </div>
                        
                        </div>
                    </div>
                  
                    
                 
                    
                  
                 
                </div>
                  <div class="col-sm-4">

     <div class="panel panel-inverse" data-sortable-id="ui-media-object-4">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Awaiting Confirmation</h4>
                        </div>  
   <div class="panel-body">

       <?php if ($this->session->flashdata('message') ): ?>
                 <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message')?></strong>
                 </div>
                 
                <?php endif ?>
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
                                            $friend= $this->user_m->get($request->sender_id);
                                           $book= $this->book_m->get($request->book_id);
                                            $img_src= site_url('images/profile.png');
                                            if($friend->photo!=null){
                                                $img_src= site_url('upload/profile_photo/'.$friend->photo);
                                            }?>
                                            
                                            <li class="media media-sm">
                                                <a class="media-left" href="javascript:;">
                                                    <img src="<?=$img_src?>"  alt="" class="media-object rounded-corner" />
                                                </a>
                                               
                                                <div class="media-body">
                                                    <h4 class="media-heading">Borrow Request</h4>
                                                    <p><a style="font-size: 16px" href="<?=site_url('user/profile/'.$friend->id)?>"><?=$friend->first_name." ".$friend->last_name?> </a><br> wants to borrow
                                                    </p>                                   
                                                    <p>
                                                       <a href="javascript:;" class="btn btn-sm btn-danger m-r-5">Reject</a>
                                                       <a href="<?=site_url('book/accept_borrow_request/'.$request->borrow_request_id)?>" class="btn btn-sm btn-success">Accept</a>
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
        </div>  
             
            </div>
            <!-- end row -->
<?php }else{

    $this->load->view('dashboard/user_dashboard');
   
} ?>
      <?php $this->load->view('book/scripts'); ?>