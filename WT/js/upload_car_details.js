function runonclick(){
    var cartype = document.getElementById("car_type_id").value;
    var gearboxtype = document.getElementById("car_gearbox_id").value;
    if(cartype=='null'){
        alert('Please select a cartype'+cartype+typeof(cartype));
        return false;
    }
    if(gearboxtype=='null'){
        alert('Please select a Gearbox type');
        return false;
    }
    return true;
}
