        
        <div class="">
          
          </div>
          <div class="clearfix"></div>
             <div class="col-md-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Create Event</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br>
                  <form action="<?=site_url('event/add')?>" method="POST" class="form-horizontal ">

                    <div class="form-group">
                      
                      <div class="col-md-9 col-sm-9 col-xs-12">
                      <label for="">Event Type</label>  <?=  form_dropdown('event_type_id', $event_types, '', 'class="form-control" id="event_type_id"');?>                 </div>
                    </div>
                    <div class="form-group">
                     
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <label for="exampleInputEmail1">Name of your event?</label>
                        <input name="event_title" type="text" class="form-control" placeholder="Enter the event title">
                                    
                      </div>
                    </div>
                    <div class="form-group">
                    
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         <label for="exampleInputEmail1">When?</label>
                        <input type="date" name="event_date" class="form-control" placeholder="Enter date">
                      </div>
                    </div>
                    <div class="form-group">
                    
                      <div class="col-md-9 col-sm-9 col-xs-12">
                         <label for="exampleInputEmail1">What Time?</label>
                       <input type="text" name="event_time" class="form-control" placeholder="What time does it start">
                      </div>
                    </div>
                    <div class="form-group">
                    
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <label for="exampleInputEmail1">Where?</label>
                        <input type="text" name="event_venue" class="form-control" placeholder="Enter venue">
                      </div>
                    </div>
                    <div class="form-group">
                      
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <label for="exampleInputEmail1">How many people are attending?</label>
                          <input type="text" name="event_pax" class="form-control" placeholder="Enter pax">
                        </div>
                      </div>
                    </div>
                   

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                        <a href="<?=site_url('dashboard')?>" type="button" class="btn btn-primary">Cancel</a>
                        <button type="submit" name="submit" value="Book Event" class="btn btn-success">Submit</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
               <div class="col-md-6 col-xs-12">
             
                  <h2>Available Dates</h2>
                   
                   <div class="row">
        <div class="col-xss-4">
          <div id="glob-data" data-toggle="calendar"></div>
        </div>
        
      </div>
                
              </div>
        
        
            </div>

 
    

            
          

       
    
   
            

