<!DOCTYPE html>
<html lang="en">
<head>
  <title>OWO Water Report</title>
  <meta charset="utf-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar bg-primary navbar-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/" style="font-size: 24px; margin: 0 auto;">OWO Water Report</a>
    </div>
  </div>
</nav>
    <style>
        .container{
            font-family: 'Montserrat', sans-serif;
            font-size: 18px;
        }
        ul li {
            display: inline;
            font-size: 12px; 
        }
    </style>
    @php
        if(isset($array['report_array'])){
            $report_array = $array['report_array'];
        }else{
            $report_array = [];
        }
        if(isset($array['water_report'])){
            $water_report = $array['water_report'];
        }else{
            $water_report = [];
        }
    @endphp
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dongle:wght@700&family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var ph_tap = <?php echo $water_report->ph_tap; ?> ;
        var ph_ro = <?php echo $water_report->ph_ro; ?> ;
        var ph_jar = <?php echo $water_report->ph_jar; ?> ;
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Tap', ph_tap],
          ['RO', ph_ro],
          ['Jar', ph_jar]
        ]);

        var options = {                      
            width: 600, height: 400,
            redFrom: 0, redTo: 7,
            greenFrom: 7.1,
            greenTo: 8,
            yellowFrom:8.1, yellowTo: 14,
            min: 0,
            max: 14,
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawGaugeChart);

      function drawGaugeChart() {        
        var tds_tap = <?php echo $water_report->tds_tap; ?> ;
        var tds_ro = <?php echo $water_report->tds_ro; ?> ;
        var tds_jar = <?php echo $water_report->tds_jar; ?> ;
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Tap', tds_tap],
          ['RO', tds_ro],
          ['Jar', tds_jar]
        ]);

        var options = {                      
            width: 600, height: 400,
            redFrom: 0, redTo: 99, redColor: 'FireBrick',
            greenFrom: 100, greenTo: 300,
            yellowFrom:301, yellowTo: 500,
            greyFrom: 501, greyTo: 1200,
            min: 0,
            max: 1200,
        };
        var tds_chart = new google.visualization.Gauge(document.getElementById('tds_chart_div'));

        tds_chart.draw(data, options);
      }
    </script>
    <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript">
        function takeshot() { 
            var success = 0;
            let grp = document.getElementById('graphs');
            var email = "<?php echo $water_report->email; ?>";
            var name = "<?php echo $water_report->name; ?>";
            var phone = "<?php echo $water_report->phone; ?>";
            html2canvas(grp).then(function (canvas) {
                $('#graphs').remove();
                document.getElementById('new_graph').appendChild(canvas);
            var image = canvas.toDataURL('image/png');
            $.post("{{ route('mail.report') }}", {_token: "{{ csrf_token() }}", image, email, phone, name},
                function(data, status, jqXHR) {// success callback
                    if(status == 'success'){
                        alert('Mail has been sent.');
                        window.location.href="{{ route('mail-success') }}";
                    }else{
                        alert('Error');
                    }
                }
            );
            });
        }
    </script>
    </script>
    <div class="content-wrapper bg-light" id="new_graph"></div>
    <div class="content-wrapper bg-light" id="graphs">
        <section class="content mt-5">
        <div class="container" style="width:100%">
            <h2 class="mb-3" style="text-align:center; text-decoration:underline;"><strong>OWO Water Assessment Report For Your Source Water</strong></h2>
            <div>
                <span><strong>Name</strong> </span>: <span>&nbsp;{{ $water_report->name }}</span>
            </div>
            <div>
                <span><strong>Phone</strong> </span>: <span>{{ $water_report->phone }}</span>
            </div>
            <div>
                <span><strong>Email</strong> </span>: <span>&nbsp;{{ $water_report->email }}</span>
            </div>
            <div>
                <span><strong>Address</strong> </span>: <span>&nbsp;{{ $water_report->address }}</span>
            </div>
            <div>
                @if($water_report->installed_ro == '' || $water_report->installed_ro == null)
                    <span><strong>Existing Purifier/RO</strong> </span>: <span>&nbsp;None</span>
                @else
                    <span><strong>Existing Purifier/RO</strong> </span>: <span>&nbsp;{{ $water_report->installed_ro }}</span>
                @endif
            </div>
            <table class="text-center" style="width: 100%; margin-top: 10px; font-size: 1em;" border="1px">
                <tr>
                    <th style="padding:5px; width: 30%;" colspan="3">TDS</th>
                    <th style="padding:5px; width: 30%;" colspan="3">PH</th>
                    <th style="padding:5px;" rowspan="2">Flow</th>
                    <th style="padding:5px;" rowspan="2">Suggested Purifier/RO Model</th>
                </tr>
                <tr>
                    <th>Tap</th>
                    <th>RO</th>
                    <th>Jar</th>
                    <th>Tap</th>
                    <th>RO</th>
                    <th>Jar</th>
                </tr>
                @foreach($report_array as $report)
                    <tr>
                        <td>{{ $report->tds_tap }}</td>
                        <td>{{ $report->tds_ro }}</td>
                        <td>{{ $report->tds_jar }}</td>
                        <td>{{ $report->ph_tap }}</td>
                        <td>{{ $report->ph_ro }}</td>
                        <td>{{ $report->ph_jar }}</td>
                        <td>{{ $report->flow }}</td>
                        <td>{{ $report->purifier }}</td>
                    </tr>
                @endforeach
            </table>
            <br>
            <div class="form-group">
                <h2>
                    <strong>PH Report :</strong>
                </h2>
                <div id="chart_div" style="width: 600px; height: 200px; margin: 0 auto !important;"></div> 
                <div style="margin-left: 27% !important;">
                    <ul style="list-style-type:none;">
                        <li><span style="background-color:red; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ACIDIC</li>
                        <li><span style="background-color:green; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> NEUTRAL</li>
                        <li><span style="background-color:#F29C17; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> ALKALINE</li>
                    </ul> 
                </div>
                <br>
                <h2>
                    <strong>TDS Report :</strong> 
                </h2>
                <div id="tds_chart_div" style="width: 600px; height: 200px; margin: 0 auto !important;"></div>                    
                <div style=" margin: 0 auto !important;">
                    <ul style="margin-left: 15% !important; list-style-type:none; ">
                        <li><span style="background-color:red; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> DANGER</li>
                        <li><span style="background-color:green; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> EXCELLENT</li>
                        <li><span style="background-color:#F29C17; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> MODERATE</li>
                        <li><span style="background-color:#FFF; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> UNACCEPTABLE</li>
                    </ul>
                </div>
                <br>
                <h2>
                    <strong>WHO Guidelines For Water TDS and PH:</strong>
                </h2>
                <h3>
                    pH(Potential of hydrogen):
                </h3>
                <p>
                    <strong>pH</strong> of water varies from <strong>1-14</strong>, where if pH level is in between <strong>1-7</strong> then it acidic water which is <strong>harmful for your health</strong>, pH level <strong>7-8</strong> is neutral water which is <strong>good for drinking</strong> and if pH levels are in between <strong>8-14</strong> then such water is considered as <strong>Alkaline water</strong> which gives lot of benefits for <strong>improving your health</strong>.Generally pH of drinking water varies from <strong>6.5-8</strong>.
                </p>
                <h3>
                    TDS(Total dissolved solids):
                </h3>
                <p>
                    If the <strong>TDS</strong> level of the water which is less than <strong>&lt;100</strong> is always considered as <strong>not a good water</strong> for human consumption. TDS levels in between <strong>100-400</strong> is considered as a <strong>perfect water</strong> to drink. and TDS which is more than <strong>>500</strong> is <strong>not a good water</strong> for human consumption.
                </p>
                <div>
                    <span><strong>BD Name</strong> </span>: <span>&nbsp;{{ $water_report->bd_name }}</span>
                </div>
                <div>
                    <span><strong>Technician Name</strong> </span>: <span>&nbsp;{{ \Auth::user()->name }}</span>
                </div>
                <br>                
                <p style="font-size: 15px; text-align:center;">
                    <strong>--End of report--</strong>
                </p>
            </div>
            </div>
        </div>
        </section>
    </div>  
    <div class="text-center">
        <button class="btn btn-primary" onclick="takeshot()">Send Email To Customer</button>
    </div>