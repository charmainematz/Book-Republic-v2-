
            <div class="page-title">
            <div class="title_left">

              <h3>
                 <a onclick="goBack()" class="btn btn-rounded btn-primary" type="button"><i class="fa fa-arrow-left"></i> </a>
                <?=$event->event_title?>
                <small> <?=date('M-d-y',strtotime($event->event_date))." @ ".$event->event_time;?></small></h3>
            
            </div>

            <div class="title_right">
              <div class="pull-right">
                 <p> <?='Booking #: '.$reservation->reservation_id?></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="">
                <div class="x_content">


                  <div class="row">
                   <?php foreach($services as $service):?>
                    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                     
                      <div class="tile-stats">
                        <div class="icon"><i class="fa fa-comments-o"></i>
                        </div>
                        <div class="count">Php <?= $this->services_availed_m->computeByServiceAvailed($service->service_id, $reservation->reservation_id)?> </div>

                        <h3><?=$service->service_name?></h3>
                        <?php if (!$this->ion_auth->is_admin()) {?>
                        <a href="<?=site_url('service/avail_package/'.$service->service_id."/".$reservation->reservation_id)?>"><p>Avail Service</p></a>
                        <?php }else{?>
                            <a href="<?=site_url('service/avail_package/'.$service->service_id."/".$reservation->reservation_id)?>"><p> Open Negotiation Page</p></a>
                       <?php }?>



                        
                      </div>
                    </div>
                    <?php endforeach?>
                  </div>
                </div>
            </div>
          </div>
        </div>
      