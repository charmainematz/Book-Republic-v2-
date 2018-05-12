<script type="text/javascript">
 
var save_method; //for save method string
var table;

 
function add_facility()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add Facility</strong>'); // Set Title to Bootstrap modal title
}
 
function edit_facility(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('facility/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.facility_id);
            $('[name="facility_name"]').val(data.facility_name);
            $('[name="facility_desc"]').val(data.facility_desc);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit Facility</strong>' + ' : ' + data.facility_name); // Set title to Bootstrap modal title
        
 
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
        url = "<?php echo site_url('facility/ajax_add'); ?>";

    } else {
        url = "<?php echo site_url('facility/ajax_update')?>";
        
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
 
function delete_facility(id)
{
    if(confirm('Are you sure delete this data?'))
     {
         // ajax delete data to database
         $.ajax({
             url : "<?php echo site_url('facility/ajax_delete')?>/"+id,
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
 <!-- Modal -->
<div class="modal fade" id="modal_form" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
<div class="modal-dialog">
       <form action="#" id="form" class="modal-content">
               <input type="hidden"  name="id"/> 


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="exampleFormModalLabel"></h4>
    </div>
    <div class="modal-body">

      <div class="row">
        <div class="col-lg-12 form-group">
           
                <input placeholder="Name" type="text" name="facility_name" class="form-control" >
              
        </div>
        <div class="col-lg-12 form-group">
            
            <input placeholder="Description" type="text" name="facility_desc" class="form-control" >
          
        </div>
        
       
          </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-sm btn-default" onclick = "location.reload()" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-success" onclick="save()"  data-dismiss="modal">Save</button>
        </div> 
          
      
      </div>
    </div>
  </form>
</div>
</div>
<!-- End Modal -->

