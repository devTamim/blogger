  <script src="asset/js/jquery.js"></script>
  <script src="asset/js/popper.min.js"></script>
  <script src="asset/js/chosen.min.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="asset/js/jquery-ui.min.js"></script>
  <script src="asset/js/jquery.fancybox.js"></script>
  <script src="asset/js/jquery.modal.min.js"></script>
  <script src="asset/js/mmenu.polyfills.js"></script>
  <script src="asset/js/mmenu.js"></script>
  <script src="asset/js/appear.js"></script>
  <script src="asset/js/ScrollMagic.min.js"></script>
  <script src="asset/js/rellax.min.js"></script>
  <script src="asset/js/owl.js"></script>
  <script src="asset/js/wow.js"></script>
  <script src="asset/js/script.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
    ?>
      <script>
            Swal.fire(
          '<?php echo $_SESSION['status']?>',
          '',
          'success'
        )
      </script>
   <?php
      unset($_SESSION['status']);
    }
    ?>
 <script>
// $(document).ready(function() {
// $('.delete_btn').click( function(e){
//   e.preventDefault();
//   var id=$(this).closest("tr").find('.delete_id_value').val();
//   Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
//   if (result.isConfirmed) {
//     $.ajax({
//                 type: "POST",
//                 url: "../jobDelete.php",
//                 data: {
//                   "delete_btn_set":1,
//                   "delete_btn_ajax":id,
//                 },
//                 success: function (response) {
//                               //
//                     }         
//             });
//   }
// });
// });
// });
 </script>

  <!-- Chart.js // documentation: http://www.chartjs.org/docs/latest/ -->
  <script src="js/chart.min.js"></script>
  <script>
    Chart.defaults.global.defaultFontFamily = "Sofia Pro";
    Chart.defaults.global.defaultFontColor = '#888';
    Chart.defaults.global.defaultFontSize = '14';

    var ctx = document.getElementById('chart').getContext('2d');

    var chart = new Chart(ctx, {

      type: 'line',
      // The data for our dataset
      data: {
        labels: ["January", "February", "March", "April", "May", "June"],
        // Information about the dataset
        datasets: [{
          label: "Views",
          backgroundColor: 'transparent',
          borderColor: '#1967D2',
          borderWidth: "1",
          data: [196, 132, 215, 362, 210, 252],
          pointRadius: 3,
          pointHoverRadius: 3,
          pointHitRadius: 10,
          pointBackgroundColor: "#1967D2",
          pointHoverBackgroundColor: "#1967D2",
          pointBorderWidth: "2",
        }]
      },

      // Configuration options
      options: {

        layout: {
          padding: 10,
        },

        legend: {
          display: false
        },
        title: {
          display: false
        },

        scales: {
          yAxes: [{
            scaleLabel: {
              display: false
            },
            gridLines: {
              borderDash: [6, 10],
              color: "#d8d8d8",
              lineWidth: 1,
            },
          }],
          xAxes: [{
            scaleLabel: {
              display: false
            },
            gridLines: {
              display: false
            },
          }],
        },

        tooltips: {
          backgroundColor: '#333',
          titleFontSize: 13,
          titleFontColor: '#fff',
          bodyFontColor: '#fff',
          bodyFontSize: 13,
          displayColors: false,
          xPadding: 10,
          yPadding: 10,
          intersect: false
        }
      },
    });
  </script>
  </body>


<!-- Mirrored from creativelayers.net/themes/superio/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 15 Feb 2022 03:20:18 GMT -->
</html>