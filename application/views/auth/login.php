
        
        <!-- begin #home -->
        <div id="home" class="content has-bg home">
            <!-- begin content-bg -->
            <div class="content-bg">
                <img style="height:100vh;width:100%" data-src="<?=site_url('assets/img/login-bg/bg-11.jpg')?>" alt="Home" />
            </div>
            <!-- end content-bg -->
            <!-- begin container -->
             
            <div class="">
                <br><br><br><br><br> <br><br><br><br><br><br>
                
                 <span class="col-sm-4" >
                     
                     
                 </span>
               
                <div class="register-content col-sm-4">
                     <h3>Log in </h3><br>
                        <?php if ($this->session->flashdata('message') ): ?>
                 <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message')?></strong>
                 </div>
                 
                <?php endif ?>
                <form action="<?=site_url('auth/login')?>" method="POST" class="margin-bottom-0">
                     <div class="form-group m-b-20">
                         <?php echo form_input($identity,'','class = "form-control input-lg" placeholder = "Email" required');?>
                    </div>
                   
                   
                    <div class="form-group m-b-20">
                       
                          <?php echo form_input($password,'','class = "form-control input-lg" placeholder = " Password" required' );?>
                    </div>
                      
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Sign In</button>
                    </div>
                    <div class="m-t-20">
                       Not yet registered? <a href="<?=site_url('auth/register')?>">Register now. </a>
                    </div>
                </form>
            </div>
                <span class="col-sm-4"></span>
            </div>
            <!-- end container -->
        </div>
        <!-- end #home -->
        
        <!-- begin #about -->
    