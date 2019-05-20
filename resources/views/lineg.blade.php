@extends('layouts.app')

@section('content')
<html>
  <head>
  <!-- LINE CHART SCRIPT START -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
   google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Sales'],
          @foreach ($linegraph as $linegraphs)
              ['{{ $linegraphs->date}}', {{ $linegraphs->total}}],
            @endforeach
        ]);

        var options = {
          title: 'Per Day Sale',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <!-- LINE CHART SCRIPT END -->
  </head>
  <body>
    //<div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>

@endsection