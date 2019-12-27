// var start = document.getElementById("startDate");
// var end = document.getElementById("endDate");

function compare()
{
    var startDt = document.getElementById("startDate").value;
    var endDt = document.getElementById("endDate").value;
    var btn = document.getElementById("submitter");
    var para = document.getElementById("validation-errors");
    var valid = true;
    
    if(startDt == "" || endDt == ""){
        para.innerHTML="Date(s) missing.";
        valid = false;
    }
    else if( (new Date(startDt).getTime() > new Date(endDt).getTime()))
    {
        para.innerHTML="Start date must occur before End date.";
        valid = false;
        //btn.disabled=false;
    }
    return valid;
}