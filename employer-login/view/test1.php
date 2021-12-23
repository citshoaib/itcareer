<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            
       
          ['Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        
        
        ]);

        var options = {
          title: 'Different Skill Set',
          width: 500,
          legend: { position: 'none' },
          chart: { subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'bottom', label: 'Skill'} // Top x-axis.
            }
          },
          bar: { groupWidth: "35%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
     <script type="text/javascript">
      //google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff12);

      function drawStuff12() {
        var data = new google.visualization.arrayToDataTable([
            
        
          ['Move', 'Percentage'],
          ["King's pawn (e4)", 44],
          ["Queen's pawn (d4)", 31],
          ["Knight to King 3 (Nf3)", 12],
          ["Queen's bishop pawn (c4)", 10],
          ['Other', 3]
        
        
        ]);

        var options = {
          title: 'Different Skill Set1',
          width: 500,
          legend: { position: 'none' },
          chart: { subtitle: 'popularity by percentage' },
          axes: {
            x: {
              0: { side: 'bottom', label: 'Skill'} // Top x-axis.
            }
          },
          bar: { groupWidth: "35%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div12'));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
    
  </head>
  <body>
    <div id="top_x_div" style="width: 900px; height: 500px;"></div>
     <div id="top_x_div12" style="width: 900px; height: 500px;"></div>
  </body>
</html>
