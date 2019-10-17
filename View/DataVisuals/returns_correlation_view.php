<h3 id="dataHeading" style="text-align: center; height: auto;">Products With Same Return Location As Purchase Location</h3>
<h4 id="dataSubHeading" style="text-align: center; height: auto;"><?php echo json_encode($locaArea) .": ". json_encode($selectedArea); ?></h4>
<div id="tbl_div" style="height: 90%;"></div>

<script type="text/javascript">
      google.charts.load('current', {'packages':['table']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Product Name');
        data.addColumn('boolean', 'Did Product Return To Purchased Region');

        // Getting Product Name and Region
        let prod_name = <?php echo json_encode($prod_name); ?>;
        let region = <?php echo json_encode($region); ?>;
        for(let i = 0; i < prod_name.length; i++){
          if(region[i] == <?php echo json_encode($selectedArea); ?>){
            data.addRow([prod_name[i], true]);
          }
          else{
            data.addRow([prod_name[i], false]);
          }
        }

        var table = new google.visualization.Table(document.getElementById('tbl_div'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }
</script>
