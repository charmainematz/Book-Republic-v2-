 
  
<div class="panel">
  <div class="panel-body">
 <form action="<?=site_url('auth/create_user')?>" method="post" id="form">
             
   
    
        <div class="form-group">
            <label class="form-label" for=""><p>Firstname </p></label>
                 
            <input type="text" name="first_name" class="form-control" >
              
        </div>
        <div class="form-group">
             <label class="form-label" for=""><p>Lastname </p></label>
              <input type="text" name="last_name" class="form-control">
          
        </div>
        <div class="form-group">
        <label class="form-label" for=""><p>Email</p></label>
              <?php echo form_input($email,'','class = "form-control"');?>  
          
          </div>

        <div class="form-group">
             <label class="form-label" for=""><p>Username </p></label>
           <?php if($identity_column=='username') {
                    echo form_input($identity,'','class = "form-control"');
                  } ?>
              
          
          
        </div>
        <div class="form-group">

             <label class="form-label" for=""><p>Password </p> </label>
             <?php echo form_input($password,'','class = "form-control"');?>  
           
        </div>
        <div  class="form-group">
               <label class="form-label" for=""><p>Confirm Password </p> </label>
               <?php echo form_input($password_confirm,'','class = "form-control"');?>  
           
        </div>
         
          
     
          
            <button type="submit" class="btn btn-sm btn-success">Save</button>
       
          
        </form>
 </div>
</div>



