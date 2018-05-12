
        <div id="home" class="content  row has-bg home">
            <!-- begin content-bg -->
            <div class="content-bg">
                <img style="height:100vh" data-src="<?=site_url('assets/img/login-bg/bg-10.jpg')?>" alt="Home" />
            </div>
            <!-- end content-bg -->
            <!-- begin container -->
             
           

          
                <br><br><br><br><br><br><br><br><br><br>
                
                 <span class="col-sm-4"></span>
               
                <span class="col-sm-4">
                <?php if ($this->session->flashdata('message') ): ?>
                 <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <?= $this->session->flashdata('message')?></strong>
                 </div>
                 
                <?php endif ?>
                
            
                 <form action="<?=site_url('auth/create_user')?>" method="post" id="form" >
                    <h3>Sign Up </h3><br>
                       
                        <div class="form-group m-b-20">
                        
                         <?php echo form_input('email','','class = "form-control input-lg" placeholder="Email"');?>  
                            
                        <i class="font-icon font-icon-lock"></i>
                       </div>
                    
             
                    <div class="form-group m-b-20">
                        
                     <?php echo form_input('first_name','','class = "form-control input-lg" placeholder="Firstname"');?>
                       
                      <i class="font-icon font-icon-user"></i>
                     </div>
                 

                    <div class="form-group m-b-20">
                      
                     <?php echo form_input('last_name','','class = "form-control input-lg" placeholder="Lastname"'); ?>
                       
                      <i class="font-icon font-icon-user"></i>
                     </div>
                 

                 
                       
                        <div class="form-group m-b-20">
                         
                        <?php echo form_password('password','','class = "form-control input-lg" placeholder="Passsword"');?>  
                          
                        <i class="font-icon font-icon-lock"></i>
                       </div>
            
                       
                       <div class="form-group m-b-20">
                      

                        <?php echo form_password('password_confirm','','class = "form-control input-lg" placeholder="Password Confirm"');?>  
                            
                        <i class="font-icon font-icon-lock"></i>
                        </div>
                     
                      
                        <input type="submit" name="homebutton2" value="Register" class="btn btn-success btn-block btn-lg""> 
             
              </form>
        </span>
         <span class="col-sm-4"></span>
</div>