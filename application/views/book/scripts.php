<script type="text/javascript">
 
var save_method; //for save method string
var table;

 
function add_book()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').html('<strong>Add Book</strong>'); // Set Title to Bootstrap modal title
}
 function view_book(id)
{
  
    $.ajax({
        url : "<?php echo site_url('book/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="book_id"]').val(data.book_id);
                $('[name="owner_id"]').val(data.owner_id);
            $('[name="title"]').val(data.title);
            $('[name="genre_id"]').val(data.genre_id);
            $('[name="author"]').val(data.author_name);
            $('[name="book_condition_id"]').val(data.book_condition_id);
            $('[name="synopsis"]').val(data.synopsis);
            
            $('.form-group').removeClass('form-group-error'); // clear error class
            $('.text-muted').empty(); // clear error string
            $('#modal_viewbook').modal('show'); // show bootstrap modal
            $('.modal-title').html('<strong>View Book</strong>'); // Set Title to Bootstrap modal title
         },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

}
 
function edit_book(id)
{
    save_method = 'update';
    $('#form2')[0].reset(); // reset form on modals
    $('.form-group').removeClass('form-group-error'); // clear error class
    $('.text-muted').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('book/ajax_edit/')?>" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="book_id"]').val(data.book_id);
            $('[name="title"]').val(data.title);
            $('[name="genre_id"]').val(data.genre_id);
            $('[name="author"]').val(data.author_name);
            $('[name="book_condition_id"]').val(data.book_condition_id);
          
                $('[name="synopsis"]').val(data.synopsis);
            
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').html('<strong>Edit book</strong>' + ' : ' + data.title); // Set title to Bootstrap modal title

        
 
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
        url = "<?php echo site_url('book/ajax_add'); ?>";

    } else {
        url = "<?php echo site_url('book/ajax_update')?>";
        
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
 
function delete_book(id)
{
    if(confirm('Are you sure delete this data?'))
     {
         // ajax delete data to database
         $.ajax({
             url : "<?php echo site_url('book/ajax_delete')?>/"+id,
             type: "POST",
             dataType: "JSON",
             success: function(status)
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
<div class="modal-dialog modal-content">
      

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="exampleFormModalLabel"></h4>
    </div>
    <div class="modal-body">
      <form action="<?=site_url('book/add')?>" method="POST" id="form" class="dropzone" name="room" enctype="multipart/form-data">
          <input  type="hidden" name="book_id" class="form-control" >


      <div class="row">

        <div class="col-lg-12 form-group">
           
                <input placeholder="Title" type="text" name="title" class="form-control" required="">
              
        </div>
        <div class="col-lg-12 form-group">
            
            <input placeholder="Author" type="text" name="author" class="form-control" required>
          
        </div>
        
        <div class="col-lg-12 form-group">
             <span> <?=  form_dropdown('genre_id', $genres, '', 'class="form-control" required="true"');?> </span>
          
        </div>
          <div class="col-lg-12 form-group">
             <span> <?=  form_dropdown('book_condition_id', $book_conditions, '', 'class="form-control" required="true"');?> </span>
          
        </div>
        <div class="col-lg-12 form-group">
            
            <input placeholder="Synopsis" type="text" name="synopsis" class="form-control" >
          
        </div>

           
        <div class="col-lg-12 form-group"  >
                    <h4 class="example-title">Upload Cover</h4>    
            
                          <h4> 
                           <input  name="photo" type="file"  id="imgupload">
                          </h4>
                         

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
<!-- End Modal -->
 <!-- Modal -->
<div class="modal fade" id="modal_form2" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-content">
      

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="exampleFormModalLabel"></h4>
    </div>
    <div class="modal-body">
      <form action="<?=site_url('book/update')?>" method="POST" id="form2" class="dropzone" name="room" enctype="multipart/form-data">
          <input  type="hidden" name="book_id" class="form-control" >


      <div class="row">
        <div class="col-lg-12 form-group">
           
                <input placeholder="Title" type="text" name="title" class="form-control" required="">
              
        </div>
        <div class="col-lg-12 form-group">
            
            <input placeholder="Author" type="text" name="author" class="form-control" required>
          
        </div>
        <div class="col-lg-12 form-group">
             <span> <?=  form_dropdown('genre_id', $genres, '', 'class="form-control" required="true"');?> </span>
          
        </div>
          <div class="col-lg-12 form-group">
             <span> <?=  form_dropdown('book_condition_id', $book_conditions, '', 'class="form-control" required="true"');?> </span>
          
        </div>
        <div class="col-lg-12 form-group">
            
          

            <textarea rows="5" name="synopsis" class="form-control" ></textarea>
          
        </div>

           
     

          </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-sm btn-default" onclick = "location.reload()" data-dismiss="modal">Close</button>
             <button type="submit"   onclick="this.form.submit()"  class="btn btn-sm btn-success">Update</button>
          
        </div> 
          
      </form>
      </div>
    </div>
</div>
<!-- End Modal -->

<div class="modal fade" id="modal_viewbook" aria-hidden="false" aria-labelledby="exampleFormModalLabel"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-content">
      

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <h4 class="modal-title" id="exampleFormModalLabel"></h4>
    </div>
    <div class="modal-body">

        
   


      <div class="row">

        <div class="col-lg-12 form-group">
           
                <input style="background-color: white;color:black" placeholder="Title" type="text" name="title" class="form-control" required="" disabled>
              
        </div>
        <div class="col-lg-12 form-group">
            
            <input style="background-color: white;color:black" placeholder="Author" type="text" name="author" class="form-control" disabled required>
          
        </div>
        <div class="col-lg-12 form-group">
             <span> <?=  form_dropdown('genre_id', $genres, '', 'class="form-control" required="true" disabled style="background-color: white;color:black"');?> </span>
          
        </div>
          <div class="col-lg-12 form-group">
             <span> <?=  form_dropdown('book_condition_id', $book_conditions, '', 'class="form-control" required="true" disabled style="background-color: white;color:black"' );?> </span>
          
        </div>
        <div class="col-lg-12 form-group">
            <textarea  style="background-color: white;color:black" disabled class="form-control" name="synopsis" rows="5"  > </textarea>
           
          
        </div>

         <div class="text-center modal-footer">
            <form method="post" action="<?=site_url('book/trade')?>">
              <input  type="hidden" name="book_id" class="form-control" >
                <input  type="hidden" name="owner_id" class="form-control" >
                <input  type="hidden" name="redirect_to" value="dashboard" class="form-control" >
                
                    <input onclick="this.form.submit()" type="submit" class="btn btn-md btn-success" name="trade" value="Borrow" >
                 
                    <input onclick="this.form.submit()" type="submit" class="btn btn-md btn-inverse" name="trade" value="Swap" >
                   </form>
        </div> 
          
      
      </div>
    </div>
</div>
<!-- End Modal -->
