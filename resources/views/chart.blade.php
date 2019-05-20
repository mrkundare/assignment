@extends('layouts.app')

@section('content')
<html>
  <head>
  <!-- PIE CHART SCRIPT START -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Productos', 'mes'],
            @foreach ($pie as $pies)
              ['{{ $pies->name}}', {{ $pies->count}}],
            @endforeach
        ]);
        var options = {
          title: 'Product Sold By Quantity'
        };
        var options = {
          title: 'My Daily Activities',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
    <!-- PIE CHART SCRIPT END -->

  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>

@endsection