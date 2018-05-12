<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
   $("#qu1antity").on("change", function() {
        var package_id = $("#").val();


        $.ajax({
        url : "<?php echo site_url('service/update_quantity/')?>/" + package_id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
          
            $('[name="quantity"]').val(data.quantity);
         
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });


         $.ajax({
        url : "<?php echo site_url('service/update_quantity/')?>/" + package_id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.service_id);
            $('[name="service_name"]').val(data.service_name);
            $('[name="service_desc"]').val(data.service_desc);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit Service</strong>' + ' : ' + data.service_name); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    });
 
    //datepicker
    // $('.datepicker').datepicker({
    //     autoclose: true,
    //     format: "yyyy-mm-dd",
    //     todayHighlight: true,
    //     orientation: "top auto",
    //     todayBtn: true,
    //     todayHighlight: true,  
    // });
 
    //set input/textarea/select event when change value, remove class error and remove text help block 
    
 
});
 
 
 
function add_service()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add Service</strong>'); // Set Title to Bootstrap modal title
}
 
function edit_service(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('service/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.service_id);
            $('[name="service_name"]').val(data.service_name);
            $('[name="service_desc"]').val(data.service_desc);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit Service</strong>' + ' : ' + data.service_name); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('service/ajax_add'); ?>";
    } else {
        url = "<?php echo site_url('service/ajax_update')?>";
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
 
function delete_service(id)
{
    if(confirm('Are you sure delete this data?'))
     {
         // ajax delete data to database
         $.ajax({
             url : "<?php echo site_url('service/ajax_delete')?>/"+id,
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
                        
                        <input type="text" name="service_name" class="form-control" placeholder="Service Name">
                        <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="service_desc" class="form-control" placeholder="Description">
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
