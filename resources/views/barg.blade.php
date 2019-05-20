@extends('layouts.app')

@section('content')
<html>
  <head>
  <!-- BAR CHART SCRIPT START -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Product', 'Count', ],
          @foreach ($bargraph as $bargraphs)
              ['{{ $bargraphs->name}}', {{ $bargraphs->count}}],
            @endforeach
        ]);

        var options = {
          chart: {
            title: 'Total Sales',
            subtitle: 'Product-wise',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
    <!-- BAR CHART SCRIPT END -->
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>

@endsection