document.getElementById('filterVehicle').addEventListener('keyup', function() { 
    var filterValue = this.value.toLowerCase(); 
    var dropdown = document.getElementById('vehicleDropdown'); 
    var options = dropdown.getElementsByTagName('option'); 
    for (var i = 0; i < options.length; i++) { 
        var option = options[i]; 
        var text = option.text.toLowerCase(); 
        if (text.includes(filterValue)) { 
            option.style.display = ''; 
        } else { 
            option.style.display = 'none'; 
        }
    }
});