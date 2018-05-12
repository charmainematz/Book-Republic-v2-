
        <div class="row">
          <div class="col-lg-3 col-sm-4" style="text-align: right">
            <h4 >Reference Number: </h4>
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
                 <a class="list-group-item" data-toggle="tab" href="#category-6" aria-controls="category-4"
                role="tab">Payment History</a>
                 <a class="list-group-item" data-toggle="tab" href="#category-3" aria-controls="category-4"
                role="tab">View Addons</a>
             
               
               
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
                        
                        Reservation by: <strong><?= $reservation->firstname." ".$reservation->lastname?></strong><br>
                        Mobile #: <strong><?= $reservation->phone?></strong><br>
                        Email address: <strong><?= $reservation->email?></strong><br><br>
                        
                        Reservation Status: <strong><?= $reservation->status_name?></strong><br>
                        Payment Status: <strong><?= $reservation->payment_name?></strong><br>

                        <?php if($reservation->balance){
                            echo 'Balance: <strong>'.$reservation->balance."</strong>";
                              }
                          ?>
                      </a>
                      </div>
                      <div class="panel-collapse collapse in" id="answer-1" aria-labelledby="question-1"
                      role="tabpanel">
                        <div class="panel-body">
                          Booking details are as follows:<br><br>

                          Room Name: <strong><?= $reservation->room_name?></strong><br>
                          Check in : <strong><?=$reservation->checkin_date?> </strong><br>
                          Check out: <strong><?=$reservation->checkout_date?> </strong><br>
                          No. of Night/s: <strong><?=$reservation->night_no?> </strong><br>
                          No. of Guest/s: <strong><?=$reservation->pax?> </strong><br>
                          Dues : <strong><?="Php ".($reservation->cost+$reservation->addon_cost)?> </strong><br>

                        </div>
                      </div>
                    </div>
                    <!-- End Question 1 -->

                
                  </div>
                </div>
                 <div class=" tab-pane " id="category-6" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion2"
                  aria-multiselectable="true" role="tablist">
                    <!-- Question 1 -->
                    <div class="panel">
                     <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                        <thead>
                        <tr>
                          <th></th>
                          <th>Date Paid</th>
                          <th>Amount</th>
                          
                          
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($payment_history as $payment):?>
                          <tr>
                          <td>
                            
                          </td>
                          <td> <?=  $payment->date_paid ?> </td>
                          <td>  <?=  $payment->amount ?> </td>
                        
                          
                          
                          
                        </tr>
                        <?php endforeach ?>
                        
                        
                         </tbody>
                          </table>      
                    
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
                      <div class="panel-heading" id="question-5" role="tab">
                        <a class="panel-title" aria-controls="answer-5" aria-expanded="true" data-toggle="collapse"
                        href="#answer-5" data-parent="#accordion">
                        What are the payment options?
                      </a>
                      </div>
                      <div class="panel-collapse collapse in" id="answer-5" aria-labelledby="question-5"
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
                    <!-- End Question 7 -->
                  </div>
                </div>
                <!-- End Categroy 2 -->

                <!-- Categroy 3 -->
                <div class="tab-pane" id="category-3" role="tabpanel">
                  <div class="panel-group panel-group-simple panel-group-continuous" id="accordion1"
                  aria-multiselectable="true" role="tablist">
                    <!-- Question 8 -->
                    <div class="panel">
                       <table class="table table-hover dataTable table-striped width-full" data-plugin="dataTable">
                        <thead>
                        <tr>
                          <th></th>
                          <th>Description</th>
                          <th>Cost</th>
                          
                          
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php foreach ($addons as $payment):?>
                          <tr>
                          <td>
                            
                          </td>
                          <td> <?=  $payment->addon_name ?> </td>
                          <td>  <?=  $payment->addon_cost ?> </td>
                        
                          
                          
                          
                        </tr>
                        <?php endforeach ?>
                        
                        
                         </tbody>
                          </table>      
                     </div>
                    <!-- End Question 10 -->
                  </div>
                </div>
                <!-- End Categroy 3 -->

              </div>
            </div>
          </div>
          <!-- End Panel -->
        </div>
      </div>

   

  <!-- End Page -->
