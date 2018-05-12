 <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                       <a onclick="goBack()" class="btn btn-rounded btn-primary" type="button"><i class="fa fa-arrow-left"></i> </a>
                   <?=$event->event_title?>
                   <small> <?=date('M-d-y',strtotime($event->event_date))." @ ".$event->event_time;?></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
                          <li><a href="#">Reservation #: <?=  $reservation->reservation_id?> </a>
                          </li>
                         
                        </ul>
                    
                  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="row">
                      <div class="col-sm-4 mail_list_column">
                        <button class="btn btn-sm btn-default btn-block" type="button"><h4>Packages Available</h4></button>

                      <?php foreach($packages as $package):?>
                        <br>
                          <div class="x_panel ui-ribbon-container fixed_height_390">
                            <div class="ui-ribbon-wrapper">
                              <div class="ui-ribbon">
                                <?= "Php ". $package->cost;?>
                            </div>
                            </div>
                            <div class="x_title">
                              <h2><?= $package->package_name?></h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="x_content" >

                            

                              <strong><p class="name_title">Inclusions<p></strong>
                             <p style="white-space: pre-line"><?= htmlspecialchars_decode($package->inclusion);?></p>

                              <div class="divider"></div>
                              <div  style="text-align: center;">
                                
                                <?php if(count($this->services_availed_m->getPackageAvailedByPackageID($package->package_id, $reservation->reservation_id))==0){?>
                                 <a href="<?=site_url('service/addPackage/'.$reservation->reservation_id."/".$package->package_id)?>" class="btn btn-sm btn-round btn-success" role="button">Add Package</a>
                                  <?php } else{?>

                                    <a href="<?=site_url('service/remove_availedPackage/'.$reservation->reservation_id."/".$package->package_id)?>" class="btn btn-sm btn-round btn-danger" role="button">Remove Package</a>
                                <?php }?>


                               </div>
                            </div>
                          </div>

                        
                        <?php endforeach; ?>

                     </div>
                      <!-- /MAIL LIST -->

                      <!-- CONTENT MAIL -->
                    <div class="col-sm-8 " >
                      <div class="row">
                        <div class=" col-md-12 inbox-body">
                           <div class="mail_heading row">
                          
                            <ul class="stats-overview">
                              <li>
                                <span class="name"> Service Type </span>
                                <span class="value text-success"> <?=$service->service_name?>  </span>
                              </li>
                               <li>
                                <span class="name"> Pax </span>
                                <span class="value text-success"> <?= $event->event_pax?> </span>
                              </li>
                              <li>
                                <span class="name"> Total Cost </span>
                                <span class="value text-success">  <?= 'Php '.$this->services_availed_m->computeByServiceAvailed($service->service_id, $reservation->reservation_id)?> </span>
                              </li>
                              
                            </ul>
                             </div>
                        </div>
                      </div>
                      <div class=row>
                     
                      <div class="clearfix"></div>
                      <div class="x_content">

                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Package Name</th>
                              <th>Unit Cost</th>
                              <th>Quantity</th>
                              <th>Subtotal</th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php 
                            $ctr=1;
                            foreach($package_availed_by_type as $package):?>
                            <tr>
                              <th scope="row"><?=$ctr?></th>
                              <td><?=$package->package_name;?></td>
                              <td><?=$package->cost;?></td>
                              <td>  

                                <form method="POST" action="<?=site_url('service/updateQuantity')?>">
                                <input name="availed_package_id" value="<?=$package->availed_package_id?>" type="hidden">
                                <input name="package_id" value="<?=$package->package_id?>" type="hidden">
                                 <input name="service_id" value="<?=$package->service_id?>" type="hidden">
                                 <input name="reservation_id" value="<?= $reservation->reservation_id?>" type="hidden">
                                <input name="quantity"  type="number"  onchange="this.form.submit()" style="text-align: center;" min="1" max="200" value="<?= $package->quantity;?>"></td>
                                </form>

                              <td><?=$package->cost*$package->quantity?></td>
                           
                              <?php $ctr=$ctr+1?>
                            </tr>
                             <?php endforeach;?>
                          </tbody>
                        </table>

                      </div>
                    </div>

                    

                  </div>
        <!-- /page content -->

      
      </div>
    </div>

   