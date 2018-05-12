

    <div class="">
          
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Events</h2>
                 
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <p></p>

                  <!-- start project list -->
                  <table id="datatable-buttons" class="table table-striped table-bordered projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Event Name</th>
                        
                        <th>Services Availed</th>
                        <th>Status</th>
                        <th style="width: 30%">Manage</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php foreach($my_events as $event):?>
                      <tr>
                        <td>#</td>
                        <td>
                          <a><?=$event->event_title?></a>
                          <br />
                          <small><?='Date: '.$event->event_date?></small>
                        </td>
                        
                        <td>
                            <?php $services = $this->services_availed_m->listAvailedServices($event->reservation_id);?>
                        </td>
                        <td>
                         <button class="<?='btn btn-xs '.$event->button_class;?>"><?=$event->status_name;?></button>
                        </td>
                        <td>

                          <?php if($event->status_name=='Approved'){?>
                          <a href="<?=site_url('event/planner/'.$event->reservation_id)?>"  class="btn btn-primary btn-xs"><i class="fa fa-folder-open"></i> Open Planner </a>
                          <a href="<?=site_url('event/invoice')?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Print Invoice  </a>
                         <?php }else{
                          echo "Management Tools are disabled.";
                         }

                         ?>
                        </td>
                      </tr>
                       <?php endforeach;?>
                      
                      </tr>
                     
                    </tbody>
                  </table>
                  <!-- end project list -->

                </div>
              </div>
            </div>
          </div>
        </div>