{/* <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="./jquery-3.4.1.js"></script>
  <link rel="stylesheet" href="./home_dash.css">

  Location Nav Bar
<nav class='navbar navbar-inverse'>
        <ul class='nav navbar-nav' id='linkHeadings'>
          <p class='navbar-text'>Select Location:</p>
          <li><a href='javascript:getSelectedLocation("Country");' id='Country'>Country</a></li>
          <li><a href='javascript:getSelectedLocation("Region");' id='Region'>Region</a></li>
          <li><a href='javascript:getSelectedLocation("State");' id='State'>State</a></li>
          <li><a href='javascript:getSelectedLocation("City");' id='City'>City</a></li>
          <li style='top: 7px;'>
              <select class='form-control col-sm-4' name='selectedArea' id='selectedArea' onchange='getSelectedArea()'>
                <option value=>Select Value</option>
              </select>
          </li>
          <li><a href='#' style='background-color: rgb(49, 60, 75); border-radius: 15%; padding-bottom: 15%;'>Search</a></li>
        </ul>
      </nav>

  Send JS variable to php
<script>  */}
    function removeOptions(selectbox){
        var i; 
        for(i = selectbox.options.length - 1 ; i >= 0 ; i--){
            selectbox.remove(i);
        }
    }

  let area;
  function getSelectedLocation(region){
    //   Clearing Select Drowdown
    removeOptions(document.getElementById("selectedArea"));
    // Sending Location Data
    area = document.getElementById(region).textContent;
    $.get('/Global_Superstore/Controller/data_Filter.php', {selectedArea: area},
    function(data){
        let locaString = data;
        let localArray = locaString.split(".");
        fillSelectList(localArray);
    });
  }

  function fillSelectList(array_loca){
    let selectedArea = document.getElementById("selectedArea");
    for(let i = 0; i < array_loca.length; i++){
        let locaOptions = document.createElement("option");
        locaOptions.textContent = array_loca[i];
        locaOptions.value = array_loca[i];

        selectedArea.appendChild(locaOptions);
    }
  }
// </script>