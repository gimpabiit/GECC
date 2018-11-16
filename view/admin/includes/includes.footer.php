
    <!-- js placed at the end of the document so the pages load faster -->
    <!-- <script src="assets/js/jquery.js"></script> -->
    <!-- <script src="assets/js/jquery-1.8.3.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jqueryForm.js"></script>
    <script src="http://localhost/view/admin/assets/js/cpanel.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <!-- <script>alert();</script> -->


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
    <script src="assets/js/zabuto_calendar.js"></script>
	<script src="assets/js/app.js"></script>
    <script>
      $().ready(function() {
        // alert();
        function loopData(d) {
          $.each(d, function(i, v) {
            if(typeof v === 'object') {
              loopData(v);
            } else
              console.log(i + " th value is "+ v);
          });
        }

        $('.btn-action').on('click', function(e) {
            $('input[name="reservation"]').val($(this).parents('tr').find('td').eq(0).text());
        });
        $('[data-toggle="popover"]').popover();

        $('.link').on('click', function (e) {
          $('.page-blocks').find('.row').addClass('hidden');
          $($(this).data('target')).removeClass('hidden');
        });

        $('.get-info').on('click', function(e) {
          var data = $(this).parents('tr').data('receipt');
          $.each(data, function(i, v) {
            if(typeof v === 'object') {
              if(("label" in v) == false) {
                $('.invoice-body').append('<p class="bg-info"> <span>-</span> <span class="pull-right">$ '+parseFloat(v.amount).toFixed(2)+'</span> </p>');
              } else {
                $('.invoice-body').append('<p><span>'+v.label+'</span> <span class="pull-right">$ '+parseFloat(v.amount).toFixed(2)+'</span></p>');
              }
            } //else
              // $('.invoice-body').append('<br><p class="bg-danger"><span class="pull-right">owing <span><b>$ '+v+'</b></span></span></p>');
          });
        });
      });
    </script>
    <script>
        var doughnutData = [
        {
        value: 60,
        color:"#68dff0"
        },
        {
        value : 40,
        color : "#444c57"
        }
        ];
        var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(doughnutData);
        </script>

        <script>
        var doughnutData = [
        {
        value: 70,
        color:"#68dff0"
        },
        {
        value : 30,
        color : "#fdfdfd"
        }
        ];
        var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
    </script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
        
        $('form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                data: form.serialize(),
                method: 'post',
                success: function(d) {
                    location.reload();
                },
                error: function (e) {
                    // body...
                    console.log(e);
                    alert('error performing request');
                }
            });
        });
    </script>

  
  </body>
</html>
