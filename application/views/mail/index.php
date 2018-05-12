 <div class="panel">
   <div class="panel-body">
      <!-- Mailbox Content -->
  

    
        <!-- Mailbox -->
        <table class="table  dataTable table-striped width-full" data-plugin="dataTable">
         
            <thead>
          <tr>
            <th width="25%">Label</th>
            <th>Inquiries</th>
            <th width="20%">Date Received</th>
            
          </tr>
          </thead>
             
           <tbody>
            <?php foreach($inquiries as $inquiry){?>

            <tr>
             <td>
                 <form action="<?=site_url('mail/updateStat')?>" method="POST" novalidate>
                    <?php foreach($statuses as $status):?>

                      <div class="form-group">

                        <input type="hidden" name="inquiry_id" value="<?=$inquiry->inquiry_id?>">
                        <input value="<?=$status->status_name?>" onchange="this.form.submit()" type="radio" class="to-labelauty" name="<?='status_'.$inquiry->inquiry_id?>" data-plugin="labelauty"
                        data-labelauty="<?=$status->status_name?>|<?=$status->status_name?>" <?php if($inquiry->status==$status->status_name){echo 'checked';}?>/> <?= $status->status_name;?>
                      </div>
                    <?php endforeach?>
                  </form>               
              </td>
    
              <td >
                <div class="content">
                  <div class="title"><?="Sender: ".$inquiry->name?></div>
                   <div class="title"><?="Email: ".$inquiry->email?></div>
                      <div class="title"><?="Phone: ".$inquiry->phone?></div><br>
                        <div class="panel abstract"><?="Message: ".$inquiry->message?></div>
                </div>
              </td>
             
              <td width="20%">
                <div class="time"><?=$this->inquiry_m->time_elapsed_string($inquiry->date_created, true);?>
                </div>
               
              </td>
            </tr>
           
            <?php } ?>
           
          </tbody>
        </table>
        <!-- pagination -->
        <ul class="margin-left-" data-plugin="paginator" data-total="50" data-skin="pagination-gap"></ul>
      
   </div>
</div>

