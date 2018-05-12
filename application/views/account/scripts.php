<script type="text/javascript">
 
var save_method; //for save method string
var table;
var base_url = '<?= site_url();?>';
 
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
    $('#date-mask-input').inputmask({
        mask: "y-m-d",
        placeholder: "YYYY-MM-DD",
        alias: "date",
        
    });
    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('form-group-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('form-group-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('form-group-error');
        $(this).next().empty();
    });
 
});
 
 
 
function add_employee()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add Employee</strong>'); // Set Title to Bootstrap modal title

    var base_url = '<?php echo base_url();?>';
    $('#photo-preview').hide(); // hide photo preview modal
    $('#label-photo').text('Upload Photo'); // label photo upload
}
 
function edit_employee(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('employee/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
         
            $('[name="last_name"]').val(data.last_name);
            $('[name="first_name"]').val(data.first_name);
            
            $('[name="email"]').val(data.email);
            
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit Employee</strong>' + ' : ' + data.first_name + ' ' + data.last_name); // Set title to Bootstrap modal title
            $('#photo-preview').show(); // show photo preview modal
            
           
         
 
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
        url = "<?php echo site_url('employee/ajax_add'); ?>";
    } else {
        url = "<?php echo site_url('employee/ajax_update')?>";
    }
 
    // ajax adding data to database
    var formData = new FormData($('#form')[0]);
    $.ajax({
         url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {   
                
                $('#modal_form').modal('hide');
                swal({
                    title:'',
                    text: "Record Successfully Saved!",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Continue"
                },function(){
                    reload_table();
                });
               
                 
                //
                
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
 
function delete_employee(id)
{
        swal({
            title: "",
            text: "Are You sure you want to delete this data?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel",
            closeOnConfirm: false,
            closeOnCancel: false
        },
        function(isConfirm) {
            if (isConfirm) {
                swal({
                    title: "",
                    text: "Record is Successfully Deleted.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                },function(){
                    $.ajax({
                        url : "<?php echo site_url('employee/ajax_delete')?>/"+id,
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
                });
            } else {
                reload_table();
            }
        });

 }
</script>

<div class="modal fade" id="modal_form" role = "dialog">
    <div class="modal-dialog " >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="">Title</h4>
            </div>
            <div class="modal-body ">
                 <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" value="" name="id"/> 
                    <fieldset class="form-group ">
                        
                        <input type="text" name="employee_number" class="form-control" placeholder="Employee Number">
                        <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="lastname" class="form-control" placeholder="Lastname">
                         <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="firstname" class="form-control" placeholder="Firstname">
                         <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="middlename" class="form-control" placeholder="Middlename">
                         <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        <label class="form-label" for="date-mask-input">Birthdate</label>
                        <input name = "birthdate" type="text" class="form-control" id="date-mask-input" placeholder="YYYY-MM-DD">
                        <!-- <input name="dob" placeholder="Date of Birth" class="form-control datepicker" type="text"> -->
                         <small class="text-muted"></small>
                    </fieldset>
                    <fieldset class="form-group ">
                        
                        <input type="text" name="address" class="form-control" placeholder="Address">
                         <small class="text-muted"></small>
                    </fieldset>
                     <fieldset class="form-group ">
                        
                        <input type="text" name="contact" class="form-control" placeholder="Contact Number">
                         <small class="text-muted"></small>
                    </fieldset>
                     <fieldset class="form-group ">
                          <?= form_dropdown('position_id',$positions,'', 'class = " form-control"'); ?>
                         <!-- <input type="text" name="address" class="form-control" placeholder="Address"> -->
                         <small class="text-muted"></small>
                    </fieldset>
                     <fieldset class="form-group ">
                          <?= form_dropdown('personnel_type_id',$personnel_types,'', 'class = " form-control"'); ?>
                         <!-- <input type="text" name="address" class="form-control" placeholder="Address"> -->
                         <small class="text-muted"></small>
                    </fieldset>
                    
                   <fieldset class="form-group" id="photo-preview">
                            <label class="control-label col-md-3">Photo</label>
                            <div class="col-md-9">
                                (No photo)
                                <span class="help-block"></span>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <label class="control-label col-md-3" id="label-photo">Upload Photo </label>
                            <div class="col-md-9">
                                <input name="photo" type="file">
                                <span class="help-block"></span>
                            </div>
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
