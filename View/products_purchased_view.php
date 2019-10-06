<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['timeline']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var container = document.getElementById('timeline');
        var chart = new google.visualization.Timeline(container);
        var dataTable = new google.visualization.DataTable();

        dataTable.addColumn({ type: 'string', id: 'Products' });
        dataTable.addColumn({ type: 'string', id: 'PurchaseReturnDates' });
        dataTable.addColumn({ type: 'date', id: 'Start' });
        dataTable.addColumn({ type: 'date', id: 'End' });

        // Fetching Product Name, Order Date and Ship Date
        let prodArray = <?php echo json_encode($prodName); ?>;
        let orderDateArray = <?php echo json_encode($orderDate); ?>;
        let shipDateArray = <?php echo json_encode($shipDate); ?>;

        for(let i = 0; i < prodArray.length; i++){
        // dataTable.addRow(['Washington', new Date(1789, 3, 30), new Date(1789, 3, 30)]);
            dataTable.addRow([prodArray[i], "OrderDate: "+orderDateArray[i]+ " -- ShipDate: "+shipDateArray[i], new Date(orderDateArray[i]), new Date(shipDateArray[i])]);
        }
        chart.draw(dataTable);
      }
    </script>
  </head>
  <body>
    <h3 style="text-align: center;">Product's Purchase Date And Return Date</h3>
<h4 style="text-align: center;"><?php echo json_encode($locaArea) .": ". json_encode($selectedArea); ?></h4>
    <div id="timeline" style="height: 100%; width: 100%;"></div>
  </body>
</html>
