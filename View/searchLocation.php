<nav class='navbar navbar-inverse'>
        <ul class='nav navbar-nav' id='linkHeadings' style='width: 50em;'>
          <p class='navbar-text'>Select Location:</p>
          <li><a href='javascript:getSelectedLocation("Country");' id='Country'>Country</a></li>
          <li><a href='javascript:getSelectedLocation("Region");' id='Region'>Region</a></li>
          <li><a href='javascript:getSelectedLocation("State");' id='State'>State</a></li>
          <li><a href='javascript:getSelectedLocation("City");' id='City'>City</a></li>
          <li style='top: 7px; width: 15em;'>
              <select class='form-control col-sm-4' name='selectedArea' id='selectedArea' > <!-- onchange='getSelectedArea()' -->
                <option value=>Select Value</option>
              </select>
          </li>
          <li><a href='javascript:dataLocationFilter()' style='background-color: rgb(49, 60, 75); left: 20px; border-radius: 15%; padding-bottom: 15%;'>Search</a></li>
        </ul>
      </nav>