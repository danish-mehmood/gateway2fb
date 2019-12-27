// var start = document.getElementById("startDate");
// var end = document.getElementById("endDate");

function compare()
{
    var startDt = document.getElementById("startDate").value;
    var endDt = document.getElementById("endDate").value;
    var btn =document.getElementById("submitter");
    var para = document.getElementById("validation-errors");

    if( (new Date(startDt).getTime() < new Date(endDt).getTime()))
    {
        console.log("theek hai janay do" );
        btn.disabled=false;
    }
    else {
        console.log("mat janay dena ");
        para.innerHTML="end date must be larger than start date";


        // console.log(para);


    }
}


// console.log("hahahah");