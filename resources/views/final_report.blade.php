@extends('header')
@section('title', 'Welcome to Water report generator')
@section('content')    
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        function takeshot() { 
            let grp = document.getElementById('graphs');
            html2canvas(grp).then(function (canvas) {
                document.getElementById('output').appendChild(canvas);
            });
        }
    </script>
    </script>
    <div class="content-wrapper bg-light">
        <section class="content mt-5">
        <div class="container" style="width:100%">
            <h2 class="mb-3" style="text-align:center; text-decoration:underline;"><strong>OWO Water Report</strong></h2>
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
                    <span><strong>Installed Purifier/RO</strong> </span>: <span>&nbsp;None</span>
                @else
                    <span><strong>Installed Purifier/RO</strong> </span>: <span>&nbsp;{{ $water_report->installed_ro }}</span>
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
                <div id='graphs'>
                    <h2>
                        <strong>PH Report :</strong>
                    </h2>
                    <div id="chart_div" style="width: 600px; height: 200px; margin: 0 auto !important;"></div> 
                    <div style="width: 28%; margin: 0 auto !important;">
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
                    <div style="width: 42%; margin: 0 auto !important;">
                        <ul style="list-style-type:none; margin: 0 auto !important;">
                            <li><span style="background-color:red; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> DANGER</li>
                            <li><span style="background-color:green; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> EXCELLENT</li>
                            <li><span style="background-color:#F29C17; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> MODERATE</li>
                            <li><span style="background-color:#FFF; border:1pt solid black; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span> UNACCEPTABLE</li>
                        </ul>
                    </div>
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
                <p style="font-size: 15px; text-align:center;">
                    <strong>End of report.</strong>
                </p>
                <br>
                    <h1>Screenshot:</h1>
                    <div id="output"></div>
                <br>
                <button onclick="takeshot()">Take Screenshot</button>
            </div>               
            </div>
        </div>
        </section>
    </div>
@endsection