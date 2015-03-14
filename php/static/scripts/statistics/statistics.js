var data = [],
  locations = [],
  tree_types = [];

function addData(quantity, name, id, types) {

  if(typeof data[types] == 'undefined') {
    data[types] = [];
    tree_types[types] = types;
  }

  if(typeof data[types][name] == 'undefined') {
    data[types][name] = [id, quantity];
    if(typeof locations[name] == 'undefined') locations[name] = name;
  } else {
    data[types][name][1] += quantity;
  }
}

function init() {

  for(x = 0; x < rows; x++) {
    addData(data2.quantity[x], data2.name[x], data2.id[x], data2.types[x]);
  }

  var div_checkbox = document.getElementById('checkboxes');

  if(rows) {
    var select = document.getElementById('drop-generate');

    while(select.firstChild) select.removeChild(select.firstChild);

    for(var x in tree_types) {
      var option = document.createElement("option");
      option.value = tree_types[x];
      option.innerHTML = tree_types[x];
      select.appendChild(option);
    }

    while(div_checkbox.firstChild) div_checkbox.removeChild(div_checkbox.firstChild);

    var checkbox = document.createElement('div');
    checkbox.className = "checkbox";
    var count = 0;
    for(var y in tree_types) {
      for(x in locations) {

        var div = document.createElement("div");
        div.className = 'checklist';
        var label = document.createElement("label");
        label.className = "checkbox-inline";

        var input = document.createElement("input");
        input.className = locations[x];
        input.type = "checkbox";
        input.name = "location";
        input.checked = true;
        if(typeof data[tree_types[y]][locations[x]] != 'undefined') {
          input.id = data[tree_types[y]][locations[x]][1];
        } else {
          input.id = 0;
        }
        input.value = locations[x];

        label.appendChild(input);
        label.appendChild(document.createTextNode(locations[x]));

        div.appendChild(label);

        checkbox.appendChild(div);

        if(count % 3 == 2) {
          div_checkbox.appendChild(checkbox);
          checkbox = document.createElement('div');
          checkbox.className = "checkbox";
        }
        count++;
      }
      if(count % 3 != 2) div_checkbox.appendChild(checkbox);

      break;
    }
  } else {
    div_checkbox.appendChild(document.createTextNode('No Data Available'));
  }
}

$(document).ready(function() {

  var location_array = [];
  var quantity_array = [];

  var myBarChart = null;

  $('#generate').click(function() {

    if(!myBarChart) {
      $(':checkbox').each(function() {
        if(this.checked) {
          value = this.id;
          location_array.push($(this).val());
          quantity_array.push(value);
        }
      });

      var BarChart = {
        labels: location_array,
        datasets: [{
          fillColor: "#5cb85c",
          strokeColor: "#3d8b3d",
          data: quantity_array
        }]
      };

      myBarChart = new Chart(document.getElementById("canvas").getContext("2d")).Bar(BarChart, {
        scaleFontSize: 13,
        scaleFontColor: "#000"
      });
      location_array = [];
      quantity_array = [];
    }
  });

  $('#drop-generate').change(function() {

    var div_checkbox = document.getElementById('checkboxes');

    while(div_checkbox.firstChild) div_checkbox.removeChild(div_checkbox.firstChild);

    var checkbox = document.createElement('div');
    checkbox.className = "checkbox";
    var count = 0;

    for(var x in locations) {

      var div = document.createElement("div");
      div.className = 'checklist';
      var label = document.createElement("label");
      label.className = "checkbox-inline";

      var input = document.createElement("input");
      input.addEventListener("change", checkBoxChange);
      input.className = locations[x];
      input.type = "checkbox";
      input.name = "location";
      input.checked = true;
      if(typeof data[tree_types[this.value]][locations[x]] != 'undefined') {
        input.id = data[tree_types[this.value]][locations[x]][1];
      } else {
        input.id = 0;
      }
      input.value = locations[x];

      label.appendChild(input);
      label.appendChild(document.createTextNode(locations[x]));

      div.appendChild(label);

      checkbox.appendChild(div);

      if(count % 3 == 2) {
        div_checkbox.appendChild(checkbox);
        console.log('sud');
        checkbox = document.createElement('div');
        checkbox.className = "checkbox";
      }
      count++;
    }
    if(count % 3 != 2) div_checkbox.appendChild(checkbox);

    checkBoxChange();

  });

  $(':checkbox').change(function() {
    checkBoxChange();
  });

  function checkBoxChange() {
  	var BarChart = null;
    if(!(myBarChart.datasets[0].bars.length)) {
      value = this.id;
      location_array.push($(this).val());
      quantity_array.push(value);

      BarChart = {
        labels: location_array,
        datasets: [{
          fillColor: "#5cb85c",
          strokeColor: "#3d8b3d",
          data: quantity_array
        }]
      };

      myBarChart = new Chart(document.getElementById("canvas").getContext("2d")).Bar(BarChart, {
        scaleFontSize: 13,
        scaleFontColor: "#000"
      });
    } else if(this.checked) {
      myBarChart.addData([this.id], ($(this).val()));
    } else if(!(this.checked)) {
      myBarChart.destroy();
      location_array = [];
      quantity_array = [];

      $(':checkbox:checked').each(function() {
        value = this.id;
        location_array.push($(this).val());
        quantity_array.push(value);
      });

      BarChart = {
        labels: location_array,
        datasets: [{
          fillColor: "#5cb85c",
          strokeColor: "#3d8b3d",
          data: quantity_array
        }]
      };

      myBarChart = new Chart(document.getElementById("canvas").getContext("2d")).Bar(BarChart, {
        scaleFontSize: 13,
        scaleFontColor: "#000"
      });
    }
  }

});
