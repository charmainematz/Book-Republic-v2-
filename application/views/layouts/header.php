  <?php $genres = $this->genre_m->get();
        $books = $this->book_m->get();
        $authors = $this->author_m->get();

        $friend_notifs = $this->friend_request_m->getNotification($this->session->userdata('user_id'));
        $borrow_notifs = $this->borrow_request_m->getNotification($this->session->userdata('user_id'));   
        $swap_notifs =$this->borrow_request_m->getNotification($this->session->userdata('user_id'));
    ?>

   <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="<?=site_url('auth/home')?>" class="navbar-brand"><span class="navbar-logo"></span> Book Republic</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->

               
                <?php  if ($this->ion_auth->logged_in()): ?>
        
 
                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <form class="navbar-form full-width">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter keyword" />
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li>
                    <li class="dropdown">

                        <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">

                           
                            <i class="fa fa-bell-o"></i>
                             <?php if(count($friend_notifs)+count($borrow_notifs)+count($swap_notifs)>0){?>
                            <span class="label"><?=count($friend_notifs)+count($borrow_notifs)+count($swap_notifs)?></span>
                            <?php }?>
                        </a>
                        <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (<?=count($friend_notifs)+count($borrow_notifs)+count($swap_notifs)?>)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="assets/img/user-1.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="assets/img/user-2.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?=site_url('images/profile.png').'?'.date('l jS \of F Y h:i:s A');?>" alt="" /> 
                            <span class="hidden-xs">
                                
                              
                            </span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                            <li><a href="javascript:;"><span class="badge badge-danger 
                            <li class="divider"></li>
                            <li><a href="<?=site_url('auth/logout')?>">Log Out</a></li>
                        </ul>
                    </li>

                   
                </ul>
                <!-- end header navigation right -->
                <?php endif?>
                 
                   <div class="collapse navbar-collapse pull-left" id="top-navbar">
                    <ul class="nav navbar-nav">
                           
                        <li class="dropdown dropdown-lg">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-large fa-fw"></i> Browse by Genre <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-lg">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12" >
                                        <h4 class="dropdown-header">Genre</h4>
                                        <div class="row">
                                            
                                          
                                            <?php
                                             
                                                    foreach($genres as $genre):?>
                                                    <div class="col-md-2" style="color:white" >
                                                        <ul class="nav">
                                                        <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>

                                                            <?=$genre->genre_name?>

                                                   </a></li></ul></div>
                                                   
                                            <?php endforeach;?>

                                            
                                         
                                         
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </li>
                       
                        <li class="dropdown dropdown-lg">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-sort-alpha-asc"></i> Browse by Author<b class="caret"></b>
                            </a>
                             <div class="dropdown-menu dropdown-menu-lg">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12" >
                                        <h4 class="dropdown-header">Authors</h4>
                                        <div class="row">
                                            
                                          
                                            <?php
                                             
                                                    foreach($authors as $author):?>
                                                    <div class="col-md-2" style="color:white" >
                                                        <ul class="nav">
                                                        <li><a href="#" class="text-ellipsis"><i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>

                                                            <?=$author->author_name.'( '.count($this->book_m->get_Books_By_Author($author->author_id)).' )'; ?>

                                                   </a></li></ul></div>
                                                   
                                            <?php endforeach;?>

                                            
                                         
                                         
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                  
                
            </div>
            <!-- end container-fluid -->
        </div>