
     
          

            <div class="row">
                <br>
                <!-- begin col-6 -->
                  <div class="col-md-3 text-center">
                <!-- begin profile-section -->
                <div class="text-center">
                    <!-- begin profile-left -->
                    <div >
                        <!-- begin profile-image -->
                        <div class="text-center" >
                           
                            
                            <i class="fa fa-user hide"></i>

                       
                               <img class="text-center" style="width:150px;" src="<?=site_url('upload/profile_photo/'.$bookworm->photo)?>"  alt="profile_photo">
                            
                                
                            

                        </div>
                        <!-- end profile-image -->
                       
                      
                    </div>
                
                  <h3><?=$bookworm->first_name." ".$bookworm->last_name?></h3>
                 <p>
                                     <a href="<?=site_url('book/bookshelf/'.$bookworm->id)?>" class="btn btn-white btn-block">View Bookshelf</a>
                                    
                                     <?php if($this->session->userdata('user_id')==$bookworm->id){?>
                                        <p>
                                     <a onclick="delete_book('15')" data-toggle="modal"  class="btn btn-white btn-block">Change Profile Picture</a></p>
                                    <p>
                                    <a onclick="delete_book('15')" data-toggle="modal"  class="btn btn-white btn-block">Logout</a></p>
                                   
                                    <?php }else{ ?>

                                           <?php if(count($this->friend_request_m->get_friend_request1($this->session->userdata('user_id'),$bookworm->id)+($this->friend_request_m->get_friend_request2($this->session->userdata('user_id'),$bookworm->id)))==0){?> 

                                                <p>  <a href="<?=site_url('friend/add_friend/'.$this->session->userdata('user_id').'/'.$bookworm->id)?>"  class="btn btn-white btn-block">Add Friend</a></p>
                                                
                                            <?php }else if(count($this->friend_request_m->get_friend_request1($this->session->userdata('user_id'),$bookworm->id))>0){?>
                                                  <p>  <a   class="btn btn-warning btn-block">Friend Request Sent</a></p>
                                                 

                                               <?php }else if($this->friend_request_m->get_friend_request2($this->session->userdata('user_id'),$bookworm->id)[0]->status==0){?>

                                                    <p>  <a href="<?=site_url('friend/add_friend/'.$this->session->userdata('user_id').'/'.$bookworm->id)?>"  class="btn btn-warning btn-block">Respond to Friend Request</a></p>

                                              <?php }else{?>
                                                  <p>  <a href=""  class="btn btn-success btn-block">Friends </a></p> 
                                            
                                             <?php }?>
                                    <?php }?>
                                           
                                     
                        
                </div>
            </div>   <!-- end profile-section -->
           
                <div class="col-md-9">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">Reading List</h4>
                        </div>
                        <div class="panel-body panel-form">
                            <form action="<?=site_url('')?>" class="form-horizontal form-bordered" data-parsley-validate="true" name="demo-form">
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="fullname">Currently Reading</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="fullname" name="fullname" placeholder="Add Book" data-parsley-required="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="email">To Read Next</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="text" id="email" name="email" data-parsley-type="email" placeholder="Add Book" data-parsley-required="true" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="message">Books I Reccommend</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" id="message" name="message" rows="4" data-parsley-range="[20,200]" placeholder="Add books"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4" for="message">Finished Reading</label>
                                    <div class="col-md-6 col-sm-6">
                                        <textarea class="form-control" id="message" name="message" rows="4" data-parsley-range="[20,200]" placeholder="Add books"></textarea>
                                    </div>
                                </div>
                                
                               
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                      <div class="panel  panel-inverse" data-sortable-id="index-4">
                        <div class="panel-heading">
                            <h4 class="panel-title">Friends</h4>
                        </div>
                        <ul class="registered-users-list clearfix">
                            <?php if(count($friends)>0):?>
                            <?php for($i=0;$i<sizeof($friends);$i=$i+1){
                                $friend = $this->user_m->get($friends[$i]);
                                ?>
                                 <div  class="col-sm-2 text-center">
                            <li >
                             
                                <a  href="<?=site_url('user/profile/'.$friend->id )?>"><img width="50px" src="<?=site_url('upload/profile_photo/'.$friend->photo)?>" alt="" /></a>
                                <h4 class="username text-ellipsis">
                                  <?=$friend->first_name." ".$friend->last_name;?> 
                                   
                                </h4></a>
                            
                            </li>
                            </div>
                          <?php }?>
                            <?php endif;?>
                        </ul>
                        <div class="panel-footer text-center">
                            <a href="javascript:;" class="text-inverse">View All</a>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
            <!-- end row -->
        </div>
        <!-- end #content -->
    </div>