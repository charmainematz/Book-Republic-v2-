 <script>
   // Example Flot Full-Bg Line
      // -------------------------
  $(document).ready(function() {

   showProfit();
   showBreakdown();
      
  });

function showBreakdown(){

  var a = document.getElementById("year2");
  var year = a.value;
  $.ajax({
        url : "<?=site_url('addon/profit_report/')?>"+year,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
         
             var bar_chart = c3.generate({
                    bindto: '#exampleC3Bar',
                    data: {
                      columns: [
                        data[0],data[1],data[2], data[3],data[4],

                      ],
                      type: 'bar'
                    },
                   axis : {
                        x : {
                            type: 'category',
                            categories: ["Jan", "Feb","Mar","Apr","May", "Jun", "Jul", "Aug", "Sep","Oct", "Nov", "Dec"],
                        }
                    },
                    bar: {
                      // width: {
                      //  ratio: 0.55 // this makes bar width 55% of length between ticks
                      // }
                      width: 20
                    },
                    color: {
                      pattern: [$.colors("red", 500), $.colors("blue-grey", 600),
                        $.colors("blue-grey", 200),  $.colors("green", 200),  $.colors("yellow", 200), $.colors("orange", 200)
                      ]
                    },
                    grid: {
                      y: {
                        show: true
                      },
                      x: {
                        show: true
                      }
                    },


                  });
            }
       
    });     



}

function showProfit() {

  var a = document.getElementById("year");
  var year = a.value;
  $.ajax({
        url : "<?=site_url('room/profit_report/')?>"+year,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
              $.plot($("#exampleFlotFullBg"), [{data,  label: "Income for Month "}],{
                xaxis: {
                      mode: "categories",
                      ticks: [[0,'Jan'],[1,'Feb'],[2,'Mar'],[3,'Apr'],[4,'May'],[5,'Jun'],[6,'Jul'],[7,'Aug'],[8,'Sep'],[9,'Oct'],[10,'Nov'],[11,'Dec']],
                      tickLength: 0,
                        
                    },
                yaxis: {
                      tickColor: "#edeff2",
                      color: "#474e54",
                      font: {
                        size: 14,
                        weight: "300"
                          // family: "OpenSans Light"
                      }
                    },
                  series: {
                    shadowSize: 0,
                   bars: {
                      show: true,
                      align: "center",
                      // fill: true,
                      // fillColor: "#ff0000",
                      barWidth: 0.5
                      
                  },
                  points: {
                    show: false,
                   fill: true,
                    fillColor: $.colors("primary", 600),
                    radius: 3,
                    lineWidth: 1
                  }
                },
                colors: [$.colors("primary", 400)],
                grid: {
                  // show: true,
                  hoverable: true,
                  clickable: true,
                  // color: "green",
                  // tickColor: "red",
                  backgroundColor: {
                    colors: ["#fcfdfe", "#fcfdfe"]
                  },
                  borderWidth: 0
                    // borderColor: "#ff0000"
                },
                legend: {
                  show: false
                }
                },

            );

                $("<div class='flot-tooltip'></div>").css({
                  position: "absolute",
                  color: "#fff",
                  display: "none",
                  border: "1px solid #777",
                  padding: "2px",
                  "background-color": "#777",
                  opacity: 0.80
                }).appendTo("body");

            

                $("#exampleFlotFullBg").bind("plothover", function(event, pos,
                  item) {
                  if (item) {
                    var x = item.datapoint[0].toFixed(2),
                      y = item.datapoint[1].toFixed(2);
                    $(".flot-tooltip").html(item.series.label + " of " + x +
                        " = " + y)
                      .css({
                        top: item.pageY + 5,
                        left: item.pageX + 5
                      })
                      .fadeIn(200);
                  } else {
                    $(".flot-tooltip").hide();
                  }
                });

               
             
          
                    
          }
       
    });
}
console.log(jsPDF.API);

var _canvas = null;
$(function() {
  $("#id_generate_pdf").on("click", function(e) {
    window.allcanvas = [];
    var allcontainers =  $('[id^="annual"]');

    allcontainers.each(function(index, elem) {
      html2canvas($(elem).get(0), {
        onrendered: function(canvas) {
          window.allcanvas.push(canvas);
          if (allcontainers.length == allcanvas.length) {
            finalpdf();
          }
        }
      });
    });
  });

  finalpdf = function() {
    var doc = new jsPDF('landscape');
    for (var i = 0; i < allcanvas.length; i++) {
      var imgData = allcanvas[i].toDataURL('image/jpeg');
      doc.addImage(imgData, 'JPEG', 10, 10 + i * 120, 200, 135);

      if(i != allcanvas.length-1) {
      doc.addPage();
      }
    }
    doc.save('testingPDF.pdf');
  };
});
</script>