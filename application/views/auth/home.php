
        
        <!-- begin #home -->
        <div id="home" class="content has-bg home">
            <!-- begin content-bg -->
            <div class="content-bg">
                <img data-src="<?=site_url('assets_frontend/img/home-bg.jpg')?>" alt="Home" />
            </div>
            <!-- end content-bg -->
            <!-- begin container -->
            <div class="container home-content">
                <h1>Welcome to Book Republic</h1>
                <h3>A community for book enthusiasts</h3>
                 <h4>Borrow and swap books for free</h4>
                <form method="post" action="<?=site_url('collection/index')?>" class="form-inline">
                     <input onclick="this.form.submit()" type="button" value="Browse Collection" name="home" class="btn btn-theme">
                     <?php   if (!$this->ion_auth->logged_in()){ ?>
                    <a type="button" href="<?=site_url('auth/create_user')?>" class="btn btn-outline">Join now</a> </form><br/>
                    <?php }?>
                <br />
            </form>
                or <a href="#">visit</a> the forum
            </div>
            <!-- end container -->
        </div>
        <!-- end #home -->
        
        <!-- begin #about -->
        <div id="about" class="content" data-scrollview="true">
            <!-- begin container -->
            <div class="container" data-animation="true" data-animation-type="fadeInDown">
                <h2 class="content-title">About Book Republic</h2>
                <p class="content-desc">
                  A social networking and crowdsourcing website for book lovers and enthusiasts
                </p>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-6">
                        <!-- begin about -->
                        <div class="about">
                             <img height="300px" width="380px" data-src="<?=site_url('upload/sample.jpg')?>" alt="Home" />
                            
                        </div>
                        <!-- end about -->
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-8 col-sm-12">
                        
                        <!-- begin about-author -->
                        <div class="about">
                            <h3>The Purpose</h3>
                            <p>
                              This project aims to provide an eco-friendly hub for free trading of books. Users can create virtual libary and share resources amongst themselves so that old books don't stagnate on their physical bookshelves. 

                            </p>
                            <p>
                               The ultimate purpose of <strong>Book Republic</strong>is to create camaraderie among book enthusiasts to cultivate a culture of sharing via passion for reading.
                            </p>
                             <p class="pull-right">
                               <strong>Charmaine Matienzo</strong><br>
                               Project Developer
                            </p>
                        </div>
                        <!-- end about-author -->
                    </div>
                    <!-- end col-4 -->
                  
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #about -->
    
        <!-- begin #milestone -->
        <div id="milestone" class="content bg-black-darker has-bg" data-scrollview="true">
            <!-- begin content-bg -->
            <div class="content-bg">
                <img data-src="<?=site_url('assets_frontend/img/milestone-bg.jpg')?>" alt="Milestone" />
            </div>
            <!-- end content-bg -->
            <!-- begin container -->
            <div class="container">
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-3 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number" data-final-number="<?=count($users)?>"><?=count($users)?></div>
                            <div class="title">Registered Bookworms</div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-3 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number" data-final-number="<?=count($books)?>"><?=count($books)?></div>
                            <div class="title">Books Available</div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-3 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number" data-final-number="89291">89,291</div>
                            <div class="title">Swap Transactions</div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                    <!-- begin col-3 -->
                    <div class="col-md-3 col-sm-3 milestone-col">
                        <div class="milestone">
                            <div class="number" data-animation="true" data-animation-type="number" data-final-number="<?=count($genre)?>"><?=count($genre)?></div>
                            <div class="title">Book Genres</div>
                        </div>
                    </div>
                    <!-- end col-3 -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #milestone -->
        
      
       
        
        <!-- beign #service -->
        <div id="service" class="content" data-scrollview="true">
            <!-- begin container -->
            <div class="container">
                <h2 class="content-title">How to Use the Site?</h2>
                <span class="content-desc">
             
                   <h4>Here at <strong>Book Republic,</strong> you can either <strong>Swap</strong> or <strong>Borrow</strong></h4>
                </span><br><br>
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="service">
                            <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn">1</div>
                            <div class="info">
                                <h4 class="title">Register</h4>
                                <p class="desc">Join the growing community of Book Republic</p>
                                   <?php   if (!$this->ion_auth->logged_in()){ ?>
                                   <div>
                                   <a href="<?=site_url('auth/create_user')?>" class="btn btn-xs btn-theme">Sign up</a><br/>
                                 </div>
                                 <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="service">
                            <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn">2</div>
                            <div class="info">
                                <h4 class="title">Create your Virtual Bookshelf</h4>
                                <p class="desc">Put up your virtual shelf like your physical one. Except it's online and you can share it.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="service">
                            <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn">3</div>
                            <div class="info">
                                <h4 class="title">Add Books to your shelf</h4>
                                <p class="desc">Showcase your books on your virtual bookshelf. </p>
                            </div>
                        </div>
                    </div>
                    <!-- end col-4 -->
                </div>
                <!-- end row -->
                <!-- begin row -->
                <div class="row">
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="service">
                            <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn">4</div>
                            <div class="info">
                                <h4 class="title">Browse the collection</h4>
                                <p class="desc">It's like going to a book fair right at your fingertips.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="service">
                            <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn">5</div>
                            <div class="info">
                                <h4 class="title">Find a book</h4>
                                <p class="desc">You can browse each member's virtual bookshefl in a one big library. As the community grows, so does the collection.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col-4 -->
                    <!-- begin col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <div class="service">
                            <div class="icon bg-theme" data-animation="true" data-animation-type="bounceIn">6</div>
                            <div class="info">
                                <h4 class="title">Make friends while borrowing and swapping</h4>
                                <p class="desc">Enjoy the friend feature of this web app.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end col-4 -->
                 
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end #about -->
        
    
        
       <div id="footer" class="footer">
            <div class="container">
                <div class="footer-brand">
                    <div style="font-size: 20px" class="footer-brand-logo"></div>
                   Book Republic
                </div>
                <p>
                    &copy; Copyright Book Republic <?=date('Y')?> <br />
                   
                </p>
                <p class="social-list">
                    <a href="#"><i class="fa fa-facebook fa-fw"></i></a>
                    <a href="#"><i class="fa fa-instagram fa-fw"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-fw"></i></a>
                    <a href="#"><i class="fa fa-google-plus fa-fw"></i></a>
                    <a href="#"><i class="fa fa-dribbble fa-fw"></i></a>
                </p>
            </div>
        </div>
        <!-- end #footer -->
        
       