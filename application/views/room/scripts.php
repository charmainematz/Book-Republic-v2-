<script type="text/javascript">
 
 
var save_method; //for save method string
var table;

$(document).ready(function() {


     var filter_magic = function(e) {
        var trs = jQuery('.room_details tr:not(:first)');

        trs.hide();
        var showAll = true;
        var show = 0; 


        jQuery('input[type="checkbox"][name="amenities"]').each(function() {
            if (jQuery(this).is(':checked')) {
                var val = jQuery(this).val();
                trs.each(function() {
                    var tr = jQuery(this);
                    var td = tr.find('td:nth-child(2)');
                    if (td.text().includes(val)) {

                        tr.show();
                        showAll = false;
                    }
                   else {

                        tr.hide();
                       
                    }
                });
            }
        });
        if (showAll) {
            trs.show();
        }
    };
     var filter_magic2 = function(e) {
        var trs = jQuery('.room_details tr:not(:first)');

        trs.hide();
        var showAll = true;
        jQuery('input[type="checkbox"][name="room_types"]').each(function() {
            if (jQuery(this).is(':checked')) {
                var val = jQuery(this).val();
                
                trs.each(function() {
                    var tr = jQuery(this);
                    var td = tr.find('td:nth-child(1)');
                    if (td.text().includes(val)) {
                        tr.show();
                        showAll = false;

                    }
                });
            }
        });
        if (showAll) {
            trs.show();
        }
    };

    


    jQuery('input[type="checkbox"][name="amenities"]').on('change', filter_magic);
    filter_magic();
    jQuery('input[type="checkbox"][name="room_types"]').on('change', filter_magic2);
    filter_magic2();

  $('input[name="in"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="in"]').on('apply.daterangepicker', function(ev, picker) {


      $(this).val(picker.startDate.format('YYYY-MM-DD'));
      $('#out').val(picker.endDate.format('YYYY-MM-DD'));

  });

  $('input[name="in"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });
  
    if(document.getElementById('checkin')!=null && document.getElementById('out')!=null){

       if(document.getElementById('checkin').value=="" && document.getElementById('out').value==""){
        $(".bookroom").attr("disabled", true);
       }
       else{
          $(".bookroom").attr("disabled", false);

       }
    }
      





});

   function printInvoice(id){


    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;

  }


 function book(id){


var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
var firstDate = new Date(document.getElementById('in'+id).value);
var secondDate = new Date(document.getElementById('out'+id).value);

var diffDays = Math.round(Math.abs((secondDate.getTime() - firstDate.getTime())/(oneDay)));
            $('[name="_in"]').val(document.getElementById('in'+id).value);
            $('[name="_out"]').val(document.getElementById('out'+id).value);
            $('[name="_pax"]').val(document.getElementById('pax'+id).value);
            $('[name="subtotal"]').val(diffDays+"*"+document.getElementById('cost'+id).value);
            $('[name="total"]').val(diffDays*document.getElementById('cost'+id).value);
            $('[name="quantity"]').val(1);
            $('[name="room_id"]').val(id);

            if(document.getElementsByName('quantity')[0].value!=0){
              $('[name="subtotal"]').val(diffDays+"*"+document.getElementById('cost'+id).value+"*"+document.getElementsByName('quantity')[0].value);
              $('[name="total"]').val(diffDays*document.getElementById('cost'+id).value*document.getElementsByName('quantity')[0].value);
              $('[name="quantity"]').val(document.getElementsByName('quantity')[0].value);
            }
           
             $('[name="night"]').val(diffDays);
             $('[name="room_name"]').val(document.getElementById('room_name'+id).value);
             $('#modal_form4').modal('show'); // show bootstrap modal
   

}
function add_room()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add New Room</strong>'); // Set Title to Bootstrap modal title
}
function edit_room(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('room/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="room_id"]').val(data[0].room_id);
            $('[name="room_name"]').val(data[0].room_name);
            $('[name="rate_per_night"]').val(data[0].rate_per_night);
          
            $('[name="room_type_id"]').val(data[0].room_type_id);

            $('[name="maximum_pax"]').val(data[0].maximum_pax);
            $('[name="description"]').val(data[0].description);
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit Room</strong>' + ' : ' + data[0].room_name); // Set title to Bootstrap modal title
      
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


function reload_table()
{
    //table.ajax.reload(null,false); //reload datatable ajax 
    location.reload();
}

function delete_room(id)
{
    if(confirm('Are you sure delete this data?'))
     {
         // ajax delete data to database
         $.ajax({
             url : "<?php echo site_url('room/ajax_delete')?>/"+id,
             type: "POST",
             dataType: "JSON",
             success: function(data)
             {
               
                 reload_table();
            },
             error: function (jqXHR, textStatus, errorThrown)
             {
                 alert('Error deleting data');
             }
         });
 
     }
}
</script>

<div class="modal fade" id="modal_form" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg modal-content">    
          <div class="modal-header">
            
            <h4 class="modal-title" id="exampleFormModalLabel"></h4>
          </div>
          <div class="modal-body animsition ">
            <form action="<?=site_url('room/add')?>" method="POST" id="form" class="dropzone" name="room" enctype="multipart/form-data">
          <input  type="hidden" name="room_id" class="form-control" >

              <div class="row" style="color:black">
                 <div class="col-lg-12 form-group">
                  <h4 class="example-title">Room Details</h4>  
                   </div>
                    
                  <div class="col-lg-6 form-group">
                          
                          <input placeholder="Name" type="text" name="room_name" class="form-control" >
                        
                  </div>
                  
                  <div class="col-lg-6 form-group">
                     
                          <input placeholder="Rate per night (in Php)" type="text" name="rate_per_night" class="form-control" >
                        
                  </div>

                  <div class="col-lg-6 form-group">
                      
                         <span> <?=  form_dropdown('room_type_id', $room_types, '', 'class="form-control" required="true"');?> </span>
                    
                  </div>
                  <div class="col-lg-6 form-group">
                   
                            <select name="maximum_pax" class="form-control">
                          <option value="">Select Capacity</option>

                          <?php for($i=0;$i<100;$i=$i+1){?>
                          <option value="<?=$i?>"><?=$i?></option>
                        <?php }?>
                        </select>
                      
                  </div>
                  <div class="col-lg-12 form-group">
                       <h4 class="example-title">Description</h4>    
                         <textarea class="form-control" name="description" rows="3" placeholder="Write a short description that would attract guests to book the room." ></textarea>    
                  </div>      
                  <div class="col-lg-12 form-group">
                      <h4 class="example-title">Room Inclusions</h4>    
                        <?php $ctr=1;

                        foreach($inclusions as $amenity):?>
                    
                            <span class="checkbox-primary col-sm-3">

                             <input type="checkbox" name="inclusions[]" value="<?=$amenity->inclusion_id?>"/>
                              <label for="inputUnchecked" data-content="<?=$amenity->inclusion_desc?>" data-trigger="hover" data-toggle="popover"><?= $amenity->inclusion_name?></label>
                          
                              <?php if($ctr%4==0){echo  '<br>';} ?>
                             </span>
                       
                          <?php $ctr=$ctr+1; endforeach?>
                
                    </div>
                    
                  
            
              <br>
                <div class="col-lg-12 form-group"  >
                    <h4 class="example-title">Upload Room Photos</h4>    
                <div id="dropzone" class="dropzone dz-clickable" id="demo-upload">
                    
                        <div class="dz-message">
                          <h4> 
                          
                        <input type="file" id="attachments" name="attachments[]" multiple>
                          </h4>
                         

                        </div>
                          <div class="dropzone-previews"></div> 
                    </div>
                </div>
              </div>
          
            <div class="modal-footer">
                 <button type="button" class="btn btn-sm btn-default" onclick = "location.reload()" data-dismiss="modal">Close</button>
                  <button type="submit"   onclick="this.form.submit()"  class="btn btn-sm btn-success">Add</button>
              </div> 
             
              </form>
            </div>
          </div>
</div>
     
<div class="modal fade" id="modal_form2" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-content">    
          <div class="modal-header">
            
            <h4 class="modal-title" id="exampleFormModalLabel"></h4>
          </div>
          <div class="modal-body animsition ">
            D,L,DF
            </div>
      </div>
</div>


     
  
<div  class="modal fade" id="modal_form4" aria-hidden="false" aria-labelledby="exampleFormModalLabel" role="dialog" tabindex="-1">
    <div class="modal-dialog  modal-content">    
        <div class="modal-body animsition" >
            <form id="form"  method="post" action="<?=site_url('room/reserve')?>"  >  
              <div class="row">
                  <div class="col-md-2">
                  </div>
                
                    <div class="col-md-8 form-group item-required">
                       <h4 style="text-align: center" ><i class="icon wb-book"></i>Reservation Details</h4>
           
                        <div class="col-md-6 ">
                          <label style="text-align: right">Room Name</label> 
                        </div>
                          <div class="col-md-6 ">
                            <input readonly name="room_name" style="background-color: transparent; border-style: none;  " type="text" id="_room_id" class="form-control"> 

                         </div>
                         <div class="col-md-6 ">
                         <label style="text-align: right">No of Guest</label> 
                         </div>
                        <div class="col-md-6 ">
                           <input readonly  style="background-color: transparent;border-style: none" type="text"  id="_pax"  name="_pax" class="form-control"> 
                        </div>
                         <div class="col-md-6 ">
                                <label style="text-align: right;">Checkin Date</label> 
                         </div>
                        <div class="col-md-6 ">
                            <input readonly   id="_in" style="background-color: transparent;border-style: none" type="text" name="_in"  class="form-control"> 
                        </div>
                         <div class="col-md-6 ">
                            <label style="text-align:right;">Checkout Date</label> 
                         </div>
                        <div class="col-md-6 ">
                             <input  readonly  id= "out" style="background-color: transparent; border-style: none"   type="text" name="_out"  class="form-control">
                        </div>
                         <div class="col-md-6 ">
                             <label style="text-align: right">No. of nights</label> 
                         </div>
                        <div class="col-md-6 ">
                             <input readonly  id= "night" style="background-color: transparent; border-style: none"   type="text" name="night"  class="form-control"> 
                        </div>


                     
                        <div class="col-md-6 ">
                               <label style="text-align: right">Total</label> 
                        </div>
                        <div class="col-md-6 ">
                            <input  readonly id= "total" style="background-color: transparent; border-style: none"   type="text" name="total" class="form-control"> 
                        </div>
                                              
                             
                        <input  class="form-control item-required" style="background-color: transparent;" type="hidden" name="quantity"  >
                          <input  class="form-control item-required" style="background-color: transparent;" type="hidden" name="room_id"  >
                    </div>
                    <div class="col-md-2">
                    </div>
               </div>
                            
                <div class="row">
                    <h4 style="text-align: center;" ><i class="icon wb-user"></i>Guest Details</h4>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8 form-group item-required">
                          
                          
                             <strong>Firstname:</strong> <br>
                              <input style="background-color: transparent;" type="text" name="fname"  class="form-control" required><br>
                               <strong>Lastname:</strong>
                              <input class="form-control item-required" style="background-color: transparent;" type="text" name="lname" required><br>
                     
                             <strong>Phone:</strong>
                              <input  class="form-control item-required" style="background-color: transparent;" type="text" name="phone" value="" required><br>
                               <strong>Email Address:<br></strong>
                              <input  class="form-control item-required" style="background-color: transparent;" type="text" name="email_add" value="" required> 
                        </div>
                        <div class="col-md-2">
                        </div>
                </div>               
                <div style="text-align: center">
                        <button  name="reserve" value="reserve" type="submit" class="btn btn-primary">Confirm Booking</button>
                </div>
                 </form>
             </div>
        </div>
     </div>
</div>
 

      
   