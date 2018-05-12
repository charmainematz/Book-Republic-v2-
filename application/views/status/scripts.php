<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
   
 
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
 
 
 
function add_status(category)
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add status</strong>'); // Set Title to Bootstrap modal title
    $('[name="category"]').val(category);
}
 
function edit_status(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('status/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.status_id);
            $('[name="status_name"]').val(data.status_name);
            $('[name="status_desc"]').val(data.status_desc);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit status</strong>' + ' : ' + data.status_name); // Set title to Bootstrap modal title
 
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
        url = "<?php echo site_url('status/ajax_add'); ?>";
    } else {
        url = "<?php echo site_url('status/ajax_update')?>";
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
 
function delete_status(id)
{
    if(confirm('Are you sure delete this data?'))
     {
         // ajax delete data to database
         $.ajax({
             url : "<?php echo site_url('status/ajax_delete')?>/"+id,
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
                     <input type="hidden"  name="category"/> 
                    <fieldset class="form-group ">
                        
                        <input type="text" name="status_name" class="form-control" placeholder="Status Name">
                        <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="status_desc" class="form-control" placeholder="Description">
                         <small class="text-muted"></small>
                    </fieldset>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-flat btn-default" onclick = "location.reload()" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="save()">Save</button>
            </div>
        </div>
    </div>
</div><!--.modal-->
s