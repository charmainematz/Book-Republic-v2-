<script type="text/javascript">
	
function add_payment(ref_no)
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string

    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('Add Payment to <strong>'+ref_no+'</strong>'); // Set Title to Bootstrap modal title
  document.getElementById('id').value = ref_no;
  console.log(ref_no);
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
 
   
        url = "<?php echo site_url('billing/ajax_add'); ?>";

  
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


</script>

<div class="modal fade" id="modal_form" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
<div class="modal-dialog">
       <form action="#" id="form" class="modal-content">
               <input type="hidden" id="id" name="id"/> 


    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="exampleFormModalLabel"></h4>
    </div>
    <div class="modal-body">

      <div class="row">
        <div class="col-lg-12 form-group">
           
                <input placeholder="Amount" type="text" name="amount" class="form-control" >
              
        </div>
        <div class="col-lg-12 form-group">
            
            	 <select name="mode_of_payment" class="form-control">
                          <option value="">Select</option>             
                          <option value="Cash">Cash</option>
                          <option value="Credit/Debit Card">Credit/Debit Card</option>
                          <option value="Bayad Center">Bayad Center</option>
                       
                 </select>
          
        </div>
         <div class="col-lg-12 form-group">
            Date of payment
            <input placeholder="Date of Payment" type="date" name="date_paid" class="form-control" >
          
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
