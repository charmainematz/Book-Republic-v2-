<script type="text/javascript">
  

$(document).ready(function(){

     $(".two-inputs").daterangepicker({
      separator : ' to ',
          getValue: function()
          {
            if ($('#date-range200').val() && $('#date-range201').val() )
              return $('#date-range200').val() + ' to ' + $('#date-range201').val();
            else
              return '';
          },
          setValue: function(s,s1,s2)
          {
            $('#date-range200').val(s1);
            $('#date-range201').val(s2);
          }
  });       
  

var not_available;

       //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('auth/get_unavailable')?>/",
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

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });

});

// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

function ajax_search_available()
{


   url =  "<?php echo site_url('auth/ajax_search_availability')?>"
    $.ajax({
        url :url ,
        type: "GET",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
            if(data.checkConflict<1) //if success close modal and reload ajax table
            {   
             alert('Lucky date! We can accomodate you. Proceed to reservation?');
                    
            }
      
           
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
           
 
        }
    });
}
 

</script>

  

  <script src="<?=site_url('js/bootstrap.min.js');?>"></script>
  <!-- /datepicker -->
 
  <script src="<?=site_url('js/nprogress.js');?>"></script>
  <script type="text/javascript" src="<?=site_url('js/datepicker/daterangepicker.js');?>"></script>
  <script src="<?=site_url('js/icheck/icheck.min.js');?>"></script>
  
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?=site_url('js/moment/moment.min.js');?>"></script>
 
 