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
    if(document.getElementById(region) != null){
        area = document.getElementById(region).textContent;
    }
    else{
      area = region;
    }

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
