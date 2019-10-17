let dataVisual;
function setDataVisual(dataType){
  dataVisual = dataType;
}

function displayDashMessage(idMessage){
  let dashMessage = document.getElementById('dashMessage');
  if(dashMessage != null){
    let parag = document.createElement('h3');
    parag.innerHTML = 'Now Choose A Location, Choose An Area Within The Location Then Search --- This Will Display ' + idMessage;

    dashMessage.parentNode.replaceChild(parag, dashMessage);
  }
}

function visualisationSearch(visualType){
  $("#locationSearchHeading").load("/Global_Superstore/View/searchLocation.php");
  if(visualType == 'returns_correlation'){ // Calling Returns Correlation
    setDataVisual("returns_correlation");
    displayDashMessage('The Correlation Of Returns With Location');
  }
  else if (visualType == 'products_purchased'){ // Calling Products Purchased
    setDataVisual("products_purchased");
    displayDashMessage('The Products Purchased Over Time');
  }
  else if (visualType == 'shipped_loca_cost'){ // Calling Shipped Location Cost
    setDataVisual("shipped_loca_cost");
    displayDashMessage('The Shipped Location With Regards To Cost');
  }
  else if(visualType == 'order_priority'){
    setDataVisual('order_priority');
    displayDashMessage('The Ratio Of Order Priorities In Each Location');
  }
}

function dataLocationFilter(){
  let selectedLocation = document.getElementById('selectedArea');
  let value_selectedLocation = selectedLocation.options[selectedLocation.selectedIndex].value;

  // Sending Selected Index Value and Area Name for Data Visualisation
  if(dataVisual == 'returns_correlation'){
      $.get('/Global_Superstore/Controller/session_setter.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
      function(){
        location.href = "http://localhost/Global_Superstore/Controller/returns_correlation.php";
      });
      // $("#midSection").load("receiver.php");
  }
  else if(dataVisual == 'products_purchased'){
    $.get('/Global_Superstore/Controller/session_setter.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
      function(){
        location.href = "http://localhost/Global_Superstore/Controller/products_purchased.php";
      });
  }
  else if(dataVisual == 'shipped_loca_cost'){
    $.get('/Global_Superstore/Controller/session_setter.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
      function(){
        location.href = "http://localhost/Global_Superstore/Controller/shipped_loca_cost.php";
      });
  }
  else if(dataVisual == 'order_priority'){
    $.get('/Global_Superstore/Controller/session_setter.php', {filteredArea: area, filteredLocationSelected: value_selectedLocation},
      function(){
        location.href = "http://localhost/Global_Superstore/Controller/loca_order_priority.php";
      });
  }
}
