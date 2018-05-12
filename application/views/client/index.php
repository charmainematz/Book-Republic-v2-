
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>  <?= $page_title; ?> </h3>
      </div>

   
    </div>
    <div class="clearfix"></div>

    <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">

          <div class="x_panel">
                <div class="" >
                  <h2> <i style="color:blue;" class="fa fa-info-circle"></i> Manage List  :: <small> View and print client</small> <a class="pull-right close-link" href="#"><i class="fa fa-close"></i></a></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    
                    <li class="pull-right">
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
               
          </div>
          <div class="x_panel">
          <div class="x_content">
             <table id="datatable-buttons" class="display table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
        
         
            <tr>
              <th>Name</th>
              <th>Address</th>
              <th>Mobile No.</th>
              <th>Email</th>
              <th>Remarks</th>
              <th width="25%">---</th>
              
            </tr>
            </thead>
            
            <tbody>
       <?php foreach($clients as $client){?>
              <tr>
              <td><?=$client->first_name." ".$client->last_name?></td>
              <td><?=$client->address?></td>
              <td><?=$client->phone?></td>
              <td><?=$client->email?></td>
              <td></td>
              
              <td>
         
              
            </tr>
              <?php }?>
            
            </tbody>
         
          </table>

             
          </div>
        </div>
      </div>    
  </div>  
</div>  



      
