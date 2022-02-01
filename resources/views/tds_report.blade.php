<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawGaugeChart);

      function drawGaugeChart() {
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Tap', 65],
          ['RO', 250],
          ['Jar', 350]
        ]);

        var options = {                      
            width: 600, height: 400,
            redFrom: 0, redTo: 99,
            greenFrom: 100,
            greenTo: 300,
            yellowFrom:301, yellowTo: 500,
            min: 0,
            max: 500
        };

        var tds_chart = new google.visualization.Gauge(document.getElementById('tds_chart_div'));

        tds_chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <div class="container mt-5">
        <h2>
            TDS Report : 
        </h2>
        <div id="tds_chart_div" style="width: 600px; height: 200px;"></div>
      </div>
  </body>
</html>
