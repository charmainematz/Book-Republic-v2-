     <!-- begin #sidebar -->
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;"><img src="<?=site_url('images/profile.png')?>" alt="" /></a>
                        </div>
                        
                        <div class="info">  
                              <a style="color:white;" href="<?=site_url('user/profile/'.$this->session->userdata('user_id'))?>">
                          
                          <?php $user=$this->ion_auth->user()->row(); 
                            echo $user->first_name." ".$user->last_name

                            ?></a><br><small>                       
                                 User
                             </small>
                              </a>
                        </div>
                   
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li class="has-sub <?php if($page_title=='Dashboard'&& $this->data['m'] != 'List of Books'){echo 'active';}?>">
                        <a href="<?=site_url('dashboard')?>">
                        
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                        
                    </li>
                     <li class="has-sub <?php if($page_title=='Collections'){echo 'active';}?>">
                        <a href="<?=site_url('collection')?>">
                        
                            <i class="fa fa-university"></i>
                            <span>Main Library</span>
                        </a>
                        
                    </li>
                     <li class="<?php if($page_title=='Bookshelf'){echo 'active';}?>">
                        <a href="<?=site_url('book/bookshelf/'.$this->session->userdata('user_id'))?>">
                        
                            <i class="fa fa-columns"></i>
                            <span>My Bookshelf</span>
                        </a>
                        
                    </li>
                      <li class="nav-header">Account</li>
                      
                      <li class="has-sub <?php if($page_title=='Profile'){echo 'active';}?>">
                        <a href="<?=site_url('user/profile/'.$this->session->userdata('user_id'))?>">
                        
                            <i class="fa fa-user"></i>
                            <span>Profile</span>
                        </a>
                        
                    </li>
                    <li >
                        <a href="<?=site_url('account_log')?>">
                            <span class="badge pull-right"></span>
                            <i class="fa fa-lock"></i> 
                            <span>Logs</span>
                        </a>
                        
                    </li>
                      <li class="has-sub <?php if($page_title=='Mail'){echo 'active';}?>">
                        <a href="<?=site_url('')?>">
                        
                            <i class="fa fa-comments"></i>
                            <span>Messages</span>
                        </a>
                        
                    </li>
                    
                  

                    
                    
                    <!-- begin sidebar minify button -->
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                    <!-- end sidebar minify button -->
                </ul>
                <!-- end sidebar nav -->
            </div>
            <!-- end sidebar scrollbar -->
        </div>
        <div class="sidebar-bg"></div>
        <!-- end #sidebar -->