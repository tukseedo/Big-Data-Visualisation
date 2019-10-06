<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var dataTable = new google.visualization.DataTable();
  		// Add columns
  		dataTable.addColumn({label: 'Products', id: 'products', type: 'string'});
  		dataTable.addColumn({label: 'Shipping Cost(R)', id: 'shippingCost', type: 'number'});

        let prod_name = <?php echo json_encode($prod_name); ?>;
        let ship_cost = <?php echo json_encode($shipping_cost); ?>;
        for(let i = 0; i < prod_name.length; i++){
          dataTable.addRow([prod_name[i], {v:parseFloat(ship_cost[i]), f:'R' + parseFloat(ship_cost[i])}]);
        }
        
        var options = {
          chart: {
            title: 'Product Shipping Costs',
            subtitle: 'Location Based On: '+ <?php echo json_encode($locaArea); ?> +"-"+ <?php echo json_encode($selectedArea) ?>,
          },
          bars: 'horizontal', // Required for Material Bar Charts.
          hAxis: {format: 'decimal'},
           height: 450
          /* colors: ['#1b9e77'] */
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));

        chart.draw(dataTable, google.charts.Bar.convertOptions(options));
      }
</script>
<div id="chart_div"></div>