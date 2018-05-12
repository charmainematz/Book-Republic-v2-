


<script type="text/javascript">
 
var save_method; //for save method string
var table;


 
$(document).ready(function() {
var not_available;

       //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('calendar/get_unavailable')?>/",
        type: "GET",
        dataType: "JSON",
        success: function(unavailable)
        {
          
            
           not_available= unavailable[0];
          
            $('#show-next-month').calendar(
              {
                num_next_month: 1,
                num_prev_month: 1,
                unavailable: not_available,
              });
           
          $('#glob-data').calendar(
      {
        unavailable: not_available,
      });
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
           
        }
    });
       
     
      
      $('#dynamic-data').calendar(
      {
        adapter: 'server/adapter.php'
      });
     
$( "#changeStatus" ).change(function() {
        
            
        var status_id= $('[name="status_id"]').val();
         var res_id= $('[name="reservation_status_id"]').val();
        

        $.ajax({
        url : "<?php echo site_url('event/changeStatus')?>/" + res_id+'/'+status_id,

        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            
            location.reload();
           
           
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error');
        }
         });

    });
 
    
 
});
 
 
 
function add_event()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add Event Type</strong>'); // Set Title to Bootstrap modal title
}
 
function edit_event(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('event/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.event_id);
            $('[name="event_name"]').val(data.event_name);
            $('[name="event_desc"]').val(data.event_desc);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit Event Type</strong>' + ' : ' + data.event_name); // Set title to Bootstrap modal title
 
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
 
function save()
{
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('event/ajax_add'); ?>";
    } else {
        url = "<?php echo site_url('event/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {   
                
                $('#modal_form').modal('hide');
                 reload_table();
               
                
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('form-group-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span text-muted class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
 
        }
    });
}
 
function delete_event(id)
{
    if(confirm('Are you sure delete this data?'))
     {
         // ajax delete data to database
         $.ajax({
             url : "<?php echo site_url('event/ajax_delete')?>/"+id,
             type: "POST",
             dataType: "JSON",
             success: function(data)
             {
                 //if success reload ajax table
                 $('#modal_form').modal('hide');
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


<div class="modal fade" id="modal_form" role = "dialog">
    <div class="modal-dialog " >
        <div class="modal-content">
            <div class="modal-header">
               
                <h4 class="modal-title" id="">Title</h4>
            </div>
            <div class="modal-body ">
                 <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/> 
                    <fieldset class="form-group ">
                        
                        <input type="text" name="event_name" class="form-control" placeholder="Event Type Name">
                        <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="event_desc" class="form-control" placeholder="Description">
                         <small class="text-muted"></small>
                    </fieldset>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default" onclick = "location.reload()" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-flat btn-primary" onclick="save()">Save</button>
            </div>
        </div>
    </div>
</div><!--.modal-->
