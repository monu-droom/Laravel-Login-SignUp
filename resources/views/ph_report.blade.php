<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Tap', 6],
          ['RO', 8],
          ['Jar', 9.5]
        ]);

        var options = {                      
            width: 600, height: 400,
            redFrom: 0, redTo: 7.4,
            greenFrom: 7.5,
            greenTo: 9,
            yellowFrom:9.1, yellowTo: 10,
            min: 0,
            max: 10,
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
      <div class="container mt-5">
        <h2>
            PH Report : 
        </h2>
        <div id="chart_div" style="width: 600px; height: 200px;"></div>
      </div>
  </body>
</html>
