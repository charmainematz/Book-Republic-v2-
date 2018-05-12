     <button class="pull-right btn btn-md btn-warning" id="id_generate_pdf">Generate Report</button>  
                 
          <div id="annual" class="col-md-12" style="background-color: white;">

               <h4>Annual Income</h4>
              
              <!-- Example Full-Bg Line -->
              <div class="example-wrap">
             
                <div class="panel example example-responsive" >
                  <form method="POST" action="">

                    <div class="col-md-4" style="text-align: right">
                         <h5>Select Year</h5>
                    </div>
                    <div class="col-md-8">
                    

                          <?php
                              // Sets the top option to be the current year. (IE. the option that is chosen by default).
                              $currently_selected = date('Y'); 
                              // Year to start available options at
                              $earliest_year = 2000; 
                              // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                              $latest_year = date('Y'); 



                              print '<select id="year" name="year" onchange="showProfit()" class="form-control">';
                              // Loops over each int[year] from current year, back to the $earliest_year [1950]
                              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                // Prints the option with the next year in range.
                                print '<option  value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                              }
                              print '</select>';
                          ?>
                       
                            
                    </div>
                  </form>

                  <div class=" col-md-12 width-xs-400" id="exampleFlotFullBg" style="height: 300px"></div>
                </div>
              </div>
              <!-- End Example Full-Bg Line -->
          </div>
        
          <div class="col-md-12" id="sdm" style="background-color: white;">
             <h4 >Most Availed Addon</h4>
             
              <!-- Example C3 Bar -->
                


              <div class="example-wrap panel">
             <div class="panel">
             <form method="POST" action="">

                    <div class="col-md-4" style="text-align: right">
                         <h5>Select Year</h5>
                    </div>
                    <div class="col-md-8">
                    

                          <?php
                              // Sets the top option to be the current year. (IE. the option that is chosen by default).
                              $currently_selected = date('Y'); 
                              // Year to start available options at
                              $earliest_year = 2000; 
                              // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                              $latest_year = date('Y'); 



                              print '<select id="year2" name="year2" onchange="showBreakdown()" class="form-control">';
                              // Loops over each int[year] from current year, back to the $earliest_year [1950]
                              foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                // Prints the option with the next year in range.
                                print '<option  value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                              }
                              print '</select>';
                          ?>
                       
                                
                 
                    </div>
                  </form>
                  </div>
                  <br>
               
                
                <div class=" example">
                   
                  <div id="exampleC3Bar"></div>
                </div>
              </div>
              <!-- End Example C3 Bar -->
