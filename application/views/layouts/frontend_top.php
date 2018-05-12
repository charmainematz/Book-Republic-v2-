
   <div id="header" class="header navbar navbar-transparent navbar-fixed-top">
            <!-- begin container -->
            <div class="container">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <button name="heaberbutton" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?=site_url('')?>" class="navbar-brand">
                        <span class="brand-logo"></span>
                        <span class="brand-text">
                            <span class="text-theme">Book</span> Republic
                        </span>
                    </a>
                </div>


                <!-- end navbar-header -->
                <!-- begin navbar-collapse -->
                  <div class="collapse navbar-collapse" id="header-navbar">
              
              
                    <ul class="nav navbar-nav navbar-right">
                        
                        
                          <?php if($page_title=='Sign in'){?>
                            <li class="active">
                                 <a href="#home">HOME </a>
                             </li>

                             <?php if($m=='register'){?>
                             <li><a href="<?=site_url('auth/login')?>" >LOG IN</a></li>
                            <?php }?>
                             <?php if($m=='login'){?>
                             <li><a href="<?=site_url('auth/register')?>" >REGISTER</a></li>
                            <?php }?>
                            <?php }else{?>

                           
                         <li class="active">
                                 <a href="#home">HOME </a>
                             </li>
                         
                      
                        <li><a href="#about" data-click="scroll-to-target">ABOUT</a></li>
                        <li><a href="<?=site_url('collection')?>">BROWSE</a></li>

                        <?php if (!$this->ion_auth->logged_in()){?>
                            <li><a href="<?=site_url('auth/login')?>">LOG IN</a></li>
                      
                          
                        <?php  }else{?>

                             <li><a href="<?=site_url('dashboard')?>">DASHBOARD</a></li>
                        <?php  } ?>
                            <li>
                        <form class="navbar-form">
                            <div class="form-group">
                                <input  style="background-color: transparent;" type="text" class="form-control" placeholder="Enter keyword" />
                                <button style="background-color: transparent; padding-left: 5px" type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </div>

                        </form>
                    </li>
                      
                           <?php }?>

                       
                    </ul>
               
             
                 </div>
                <!-- end navbar-collapse -->
            </div>
            <!-- end container -->
    </div>
    <!-- end #header -->