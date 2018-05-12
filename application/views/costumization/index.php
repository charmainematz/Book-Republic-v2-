

      <div class="row">
         <div class=" col-sm-2">
         </div>
        <div class=" col-sm-8">

  <div class="panel">
          
            <div class="panel-body container-fluid">
               <form action="<?=site_url('costumization/update')?>" class="form-horizontal form-label-left" novalidate  method="post">
                     <input value="<?=$costumization->hotel_id?>" type="hidden" name="costumization_id"  class=" form-control col-md-7 col-xs-12">
                   
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_title">Hotel Name <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input id="site_title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="hotel_name"  required="required" type="text" value="<?=$costumization->hotel_name?>">
                      </div>
                    </div>
                        <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="site_title">Subname <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input id="site_title" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="sub_name"  required="required" type="text" value="<?=$costumization->sub_name?>">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input value="<?=$costumization->email?>" type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Telephone Number <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input  value="<?=$costumization->telephone?>" type="text" id="number" name="telephone" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input value="<?=$costumization->address?>" type="url" id="address" name="address" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Embedded Map <span class="required">*</span>
                      </label>
                        <div class="col-md-9 col-sm-6 col-xs-12">
                        <textarea value="" rows="10" id="textarea"  required="required" name="map" class="form-control col-md-7 col-xs-12"><?=$costumization->map?></textarea>
                      </div>
                    </div>
                    
                    
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">About <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <textarea value="" rows="10" id="textarea"  required="required" name="about" class="form-control col-md-7 col-xs-12"><?=$costumization->about?></textarea>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Facebook <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input value="<?=$costumization->facebook?>" id="occupation" type="text" name="facebook" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                   
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Instagram <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input value="<?=$costumization->instagram?>" type="tel" id="telephone" name="instagram" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                     <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Twitter <span class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-6 col-xs-12">
                        <input value="<?=$costumization->twitter?>" type="tel" id="telephone" name="twitter" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-md-offset-3">
                        
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                    </div>
                  </form>
            </div>
          </div>
          <!-- End Panel Floating Lables -->
        </div>
          <div class="col-sm-2">
         </div>
          </div>
