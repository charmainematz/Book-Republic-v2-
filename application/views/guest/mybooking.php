
        <div class="row">
          <div class="col-lg-3 col-sm-4" style="text-align: right">
            <h4 >Your Reference Number: </h4>
          </div>
      <div class="col-lg-9">
           <div class="form-group">
                  <div class="input-search">
                  
                    <input  style="font-size: 26px" type="text" class="form-control" name="" value="<?=$reservation->reference_no?>" placeholder="Search...">
                  </div>
                </div>
      </div>
        <div class="col-lg-3 col-sm-4">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body">
              <div class="list-group" data-plugin="nav-tabs" role="tablist">
                <a class="list-group-item active" data-toggle="tab" href="#category-1" aria-controls="category-1"
                role="tab">Summary</a>

                <?php if($reservation->status_id!=12){?>
                <a class="list-group-item" data-toggle="tab" href="#category-2" aria-controls="category-2"
                role="tab">Avail Addons</a>
                <a class="list-group-item" data-toggle="tab" href="#category-3" aria-controls="category-3"
                role="tab">Print Invoice</a>
                <a class="list-group-item" data-toggle="tab" href="#category-4" aria-controls="category-4"
                role="tab">Payment</a>
                 <a class="list-group-item" data-toggle="tab" href="#category-5" aria-controls="category-4"
                role="tab">Cancel Booking</a>

                <?php }?>
              </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>

        <div class="col-lg-9 col-sm-4">
          <!-- Panel -->
          <div class="panel">
            <div class="panel-body">
              <div class="tab-content">
                <!-- Categroy 1 -->
                <div class=" tab-pane active" id="category-1" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion2"
                  aria-multiselectable="true" role="tablist">
                    <!-- Question 1 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-1" role="tab">
                       
                     
                        Reservation Status: <strong><?= $reservation->status_name?></strong><br>
                        Payment Status: <strong><?= $reservation->payment_name?></strong><br>
                      </a>
                      </div>
                      <div class="panel-collapse collapse in" id="answer-1" aria-labelledby="question-1"
                      role="tabpanel">
                        <div class="panel-body">
                          Your booking details are as follows:<br><br>


                          <table class="table" >
                              <thead>
                                <tr>
                                  <th width="30%">  </th>
                                  <th width=70% > </th>
                                </tr></thead>
                              <tbody>
                                <tr>
                                  <td> Room Name </td>
                                  <td> <strong><?= $reservation->room_name?></strong> </td>
                                </tr>
                                 <tr>
                                  <td> Check in </td>
                                  <td> <strong><?=$reservation->checkin_date?> </strong> </td>
                                </tr>
                                 <tr>
                                  <td> Check out </td>
                                  <td> <strong><?=$reservation->checkout_date?></strong> </td>
                                </tr>
                                <tr>
                                  <td> No. of Night/s: </td>
                                  <td> <strong><?=$reservation->night_no?></strong> </td>
                                </tr>
                                 <tr>
                                  <td> No. of Guest/s: </td>
                                  <td> <strong><?=$reservation->pax?></strong> </td>
                                </tr>
                                 <tr>
                                  <td> Room Cost: </td>
                                  <td> <strong><?="Php ".$reservation->cost?></strong> </td>
                                </tr>
                                <tr>
                                  <td> Addons Cost: </td>
                                  <td> <strong><?="Php ".$reservation->addon_cost?></strong> </td>
                                </tr>
                                <tr>
                                  <td> Total Dues: </td>
                                  <td> <strong><?="Php ".($reservation->cost+$reservation->addon_cost)?></strong> </td>
                                </tr>
                              </tbody>
                          </table>
                         
                             <i>Thank you for booking with us. Kindly take note of your reference number to be able to make changes on your booking. See you! </i><br>
                        </div>
                      </div>
                    </div>
                    <!-- End Question 1 -->

                
                  </div>
                </div>
                <!-- End Categroy 1 -->

                <!-- Categroy 2 -->
                <div class="tab-pane" id="category-2" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion"
                  aria-multiselectable="true" role="tablist">
                    <!-- Question 5 -->
                    <div class="panel">
                      <?php foreach($addons as $addon):?>
                        <a class="btn bg-blue-100 color-box blue-grey-700 btn-block btn-round" style="height:50px;" data-toggle="collapse" href="<?="#".$addon->addon_id?>"
                    aria-expanded="false" aria-controls="exampleCollapseExample">
                                   <h4>   <?=$addon->addon_name." for Php ".  $addon->cost?><br>
                                     

                                     <?php if(count($this->addon_availed_m->getPackageAvailedByPackageID($addon->addon_id, $reservation->reservation_id))!=0){
                                        echo    '<span class="label label-success">Availed</span>';
                                      }?>
                                   </h4>
                        </a>
                        <br>
                         <div class="collapse" id="<?=$addon->addon_id?>">
                          <div class=" well" style="text-align: center">
                            
                            <?=$addon->addon_desc;?><br><br>

                           
                            <div style="text-align: center">
                             <?php if(count($this->addon_availed_m->getPackageAvailedByPackageID($addon->addon_id, $reservation->reservation_id))==0){?>

                                    <form action="<?=site_url('addon/add_addon');?>" method="post">
                                      <input type="hidden" name="add_on_id" value="<?=$addon->addon_id?>">
                                      <input type="hidden" name="reservation_id" value="<?=$reservation->reservation_id?>">
                                      <input onclick="this.form.submit()" type="submit" name="avail" value="Avail Addon" class="btn btn-sm btn-round btn-success">
                                    </form>
                                    
                                    <?php } else{?>
                                   
                                    <form action="<?=site_url('addon/remove_addon');?>" method="post">
                                      <input type="hidden" name="add_on_id" value="<?=$addon->addon_id?>">
                                      <input type="hidden" name="reservation_id" value="<?=$reservation->reservation_id?>">
                                      <input onclick="this.form.submit()" type="submit" name="avail" value="Remove Addon" class="btn btn-sm btn-round btn-danger">
                                    </form>

                                  
                                <?php }?> 
                             
                                 </div>
                          </div>
                        </div>

                      <?php endforeach;?>
                   </div>
                  </div>
                </div>
                <!-- End Categroy 2 -->
                 <?php $hotel= $this->costumization_m->get(1);?>
                <!-- Categroy 3 -->
                <div class="tab-pane" id="category-3" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion1"
                  aria-multiselectable="true" role="tablist">
                    <!-- Question 8 -->
                    <div class="panel" id="invoice">
                       <div class="row">
                          <div class="col-md-3">
                            <h4>
                              <img class="margin-right-10" src="<?=site_url('assets/images/logo-blue.png')?>"
                              alt="..."><?=$hotel->hotel_name?></h4>
                            <address>
                               <i class="icon wb-map" aria-hidden="true"></i><?=$hotel->address?>
                              <br>
                              <i class="icon wb-envelope" aria-hidden="true"></i>&nbsp;&nbsp;<?=$hotel->email?>
                              <br>
                              <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;<?=$hotel->telephone?>
                              <br>
                           
                            </address>
                          </div>
                          <div class="col-md-3 col-md-offset-6 text-right">
                           
                            <a style="font-size: 20px"> <?= 'Invoice #: '.$reservation->reference_no?></a>
                             
                              <br> To:
                              <br>
                              <span class="font-size-20"><?=$reservation->firstname." ".$reservation->lastname?></span>
                            </p>
                           
                            <span>Invoice Date: <?= date('M-d-y',strtotime($reservation->invoice_date))?></span>
                            <br>
                            <span>Due Date:  <?= date('M-d-y',strtotime($reservation->due_date))?></span>
                          </div>
                        </div>
<br>
                        <div class="page-invoice-table table-responsive">
                          <table class="table table-hover text-right">
                            <thead>
                              <tr>
                                <th class="text-center">#</th>
                                <th>Description</th>
                                <th class="text-right">Quantity</th>
                                <th class="text-right">Unit Cost</th>
                                <th class="text-right">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="text-left">
                                  1. Room Info
                                </td>
                                <td class="text-left">
                                  <?=$reservation->room_name?>
                                </td>
                                <td>
                                   <?=$reservation->night_no?>
                                </td>
                                <td>
                                    <?=$reservation->rate_per_night?>
                                </td>
                                <td>
                                  <?=$reservation->cost?>
                                </td>
                              </tr>

                              <?php
                                    

                                    $ctr=2;
                                  foreach( $addons_availed as $aa): ?>
                              <tr>

                                <td class="text-left">
                                  <?=$ctr?>. Addon 
                                </td>
                                <td class="text-left">
                                  <?=$aa->addon_name?>
                                </td>
                                <td>
                                  1
                                </td>
                                <td>
                                   <?=$aa->cost?>
                                </td>
                                <td>
                               <?=$aa->cost?>
                                </td>
                              </tr>

                             <?php 
                                  $ctr= $ctr+1;
                                  endforeach;?>
                            </tbody>
                          </table>
                        </div>

                        <div class="text-right clearfix">
                          <div class="pull-right">
                            
                            
                            <p class="page-invoice-amount">Grand Total:
                              <span><?=$reservation->cost+$reservation->addon_cost?></span>
                            </p>
                          </div>
                        </div>

                        <div class="text-right">
                        
                          <button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline"
                          onclick="javascript:window.print();">
                            <span><i class="icon wb-print" aria-hidden="true"></i> Print</span>
                          </button>
                        </div>
                      
                     
                    </div>
                    <!-- End Question 8 -->

                  </div>
                </div>
                <!-- End Categroy 3 -->

                <!-- Categroy 4 -->
                <div class="tab-pane" id="category-4" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion3"
                  aria-multiselectable="true" role="tablist">
                     <div class="panel">
                      <div class="panel-heading" id="question-5" role="tab">
                        <a class="panel-title" aria-controls="answer-5" aria-expanded="true" data-toggle="collapse"
                        href="#answer-5" data-parent="#accordion">
                        What are the payment options?
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-5" aria-labelledby="question-5"
                      role="tabpanel">
                        <div class="panel-body">
                          <strong>Bank Transfer</strong><br>
                          Account name: <br>
                          Mailing Address: <br>
                          Account Type: <br>
                          Account number: <br>
                          Bank Name: <br><br>
                       

                         <strong>Money Transfer/Remittance:</strong><br>
                          Name: <br>
                          Address:<br>
                          Cellphone Number: 0917111111<br>
                        </div>
                      </div>
                    </div>
                    <!-- End Question 5 -->

                    <!-- Question 6 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-6" role="tab">
                        <a class="panel-title" aria-controls="answer-6" aria-expanded="false" data-toggle="collapse"
                        href="#answer-6" data-parent="#accordion">
                        What are the terms of payment?
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-6" aria-labelledby="question-6"
                      role="tabpanel">
                        <div class="panel-body">
                          Kindly make the payment 30 days before your arrival. Note that your booking is not guaranteed unless payment has been made. The property reserves the right to cancel your booking if payment is not received by the said deadline.
                        </div>
                      </div>
                    </div>
                    <!-- End Question 6 -->

                    <!-- Question 7 -->
                    <div class="panel">
                      <div class="panel-heading" id="question-7" role="tab">
                        <a class="panel-title" aria-controls="answer-7" aria-expanded="false" data-toggle="collapse"
                        href="#answer-7" data-parent="#accordion">
                        I already made the payment, what do I do next? 
                      </a>
                      </div>
                      <div class="panel-collapse collapse" id="answer-7" aria-labelledby="question-7"
                      role="tabpanel">
                        <div class="panel-body">
                           For Bank Deposit or Money Transfer, kindly send us a copy of the payment slip to validate your booking to 
                        </div>
                      </div>
                    </div>
                  </div>
                
                <!-- End Categroy 4 -->
                  <!-- Categroy 4 -->
              
            </div>
              <div class="tab-pane" id="category-5" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion3"
                  aria-multiselectable="true" role="tablist">
                     <div class="panel">
                      <div class="panel-heading" id="question-5" role="tab">
                        
                    <div class="alert alert-danger alert-dismissible">
               
                <h4><i class="icon fa fa-ban"></i>Booking Cancellation</h4>
                    <h5>Are you sure you want to cancel your booking?</h5>
              </div>

               <form class="form-horizontal" method="POST" action="<?php echo site_url('room/cancel_booking');?>">
                    <div class="form-group">
                    <span class="col-md-3 col-xs-12 control-label"></span>                                     
                    <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <input class=" submit btn  btn-default " name="reservation_id" type="hidden" value="<?=$reservation->reservation_id?>"  >  
                        <input onclick="this.form.submit()" class=" submit btn  btn-default " name="yes" type="submit" value="YES"  >  
                        <input onclick="this.form.submit()"  class=" submit btn  btn-primary " name="no" type="submit" value="NO"  >  

                    </div> 
                    </div>
        </div>
         

               </form>
                      </a>
                      </div>
                      
                    </div>
                   
                 
                
                <!-- End Categroy 4 -->
              </div>
              </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>
      </div>
</div>

<script>
$(document).ready(function() {
   function printInvoice(id){


    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById(invoice).innerHTML);
    mywindow.document.write('</body></html>');

   
    mywindow.focus(); // necessary for IE >= 10*/

    
    return true;

  }
});
</script>
   

 