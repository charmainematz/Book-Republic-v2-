    <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2></h2>

                  <h2>Edit Profile</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" action="auth/edit_profile" method="POST" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                       
                          <?php echo form_input($first_name,'',"class='form-control col-md-7 col-xs-12'");?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required"></span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input($last_name,'',"class='form-control col-md-7 col-xs-12'");?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input($address,'',"class='form-control col-md-7 col-xs-12'");?>
                      </div>
                    </div>
                  
                      <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Phone</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input($phone,'phone',"class='form-control col-md-7 col-xs-12'");?>
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <?php echo form_input($email,'email',"class='form-control col-md-7 col-xs-12'");?>
                      </div>
                    </div>
                    
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                       

          <?php echo form_hidden('id', $user->id);?>
          <?php echo form_hidden($csrf); ?>

            <p><?php echo form_submit('submit', lang('edit_user_submit_btn'));?></p>


          <?php echo form_close();?>

                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
          </div>





