<div id="piechart_3d" style="width: 900px; height: 500px;"></div>

<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var dataTable = new google.visualization.DataTable();
    dataTable.addColumn('string', 'Order Priority');
    dataTable.addColumn('number', 'Number of Products');

    // getting Order Priority array
    let arrOrderPri = <?php echo json_encode($orderPriorityKeys); ?>;
    // Object.keys() put all the keys of the arrOrderPri array into its own array
    let keysArray = Object.keys(arrOrderPri);
    for(let i = 0; i < keysArray.length; i++){
      dataTable.addRow([keysArray[i], arrOrderPri[keysArray[i]]]);
    }

    var options = {
      title: 'Number of Orders with their Order Priorities for the <?php echo $locaArea; ?> of <?php echo $selectedArea; ?>',
      is3D: true,
      colors:['red','orange', 'blue', 'green']
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(dataTable, options);
  }
</script>
