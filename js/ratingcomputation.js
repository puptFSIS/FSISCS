 //Computation of ratings
function getAverage(){
    var Q1=document.getElementById('Quality').value;
    var E2=document.getElementById('Efficiency').value;
    var T3=document.getElementById('Timeliness').value;
    var total;
    var ave;
                    
    var error1 = 'Out of Range, 1 to 5 only.';
    var errorNaN = 'Input is Not a Number.';
    var errorNaNave = "Can't calculate Average";

    if(Q1 > 5)
    {
        // alert('Out of Range, 1 is Lowest and 5 is Highest Rating');
        document.getElementById('error1').innerHTML = error1;
    } else if(isNaN(Q1)) {
         document.getElementById('error1').innerHTML = errorNaN;
    } else {
        document.getElementById('error1').innerHTML = '';
    }

    if(E2 > 5)
    {
        // alert('Out of Range, 1 is Lowest and 5 is Highest Rating');
        document.getElementById('error2').innerHTML = error1;
    } else if(isNaN(E2)) {
         document.getElementById('error2').innerHTML = errorNaN;
    } else {
        document.getElementById('error2').innerHTML = '';
    }

    if(T3 > 5)
    {
        // alert('Out of Range, 1 is Lowest and 5 is Highest Rating');
        document.getElementById('error3').innerHTML = error1;
    } else if(isNaN(T3)) {
         document.getElementById('error3').innerHTML = errorNaN;
    } else {
        document.getElementById('error3').innerHTML = '';
    }

    if(!Q1 && E2 && T3) { //checked
        if(isNaN(E2) || isNaN(T3)) {
           document.getElementById('error4').innerHTML = errorNaN;
           document.getElementById('Average').value = ''; 
        } else if(!isNaN(parseInt(E2)) && !isNaN(parseInt(T3))) {
            total = parseInt(E2)+parseInt(T3);
            ave = total/2;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave.toFixed(2);
        }
    } else if(Q1 && !E2 && T3) { //checked
        if(isNaN(Q1) || isNaN(T3)) {
           document.getElementById('error4').innerHTML = errorNaN;
           document.getElementById('Average').value = ''; 
        } else if(!isNaN(parseInt(Q1)) && !isNaN(parseInt(T3))) {
            total = parseInt(Q1)+parseInt(T3);
            ave = total/2;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave.toFixed(2);
        }
    } else if(Q1 && !T3 && E2){ //checked
        if(isNaN(Q1) || isNaN(E2)) {
           document.getElementById('error4').innerHTML = errorNaNave;
           document.getElementById('Average').value = '';
        } else if(!isNaN(parseInt(Q1) && !isNaN(parseInt(E2)))) {
            total = parseInt(Q1)+parseInt(E2);
            ave = total/2;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave.toFixed(2);
        } 
    } else if(Q1 && !E2 && !T3) {
        if(isNaN(Q1)) {
           document.getElementById('error4').innerHTML = errorNaNave;
        } else if(!isNaN(parseInt(Q1))) {
            ave = Q1;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave;
        }  
    } else if(!Q1 && !T3 && E2) {
        if(isNaN(E2)) {
           document.getElementById('error4').innerHTML = errorNaNave;
        } else if(!isNaN(parseInt(E2))) {
            ave = E2;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave;
        }  
    } else if(!Q1 && !E2 && T3) {
        if(isNaN(T3)) {
           document.getElementById('error4').innerHTML = errorNaNave;
        } else if(!isNaN(parseInt(T3))) {
            ave = T3;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave;
        }  
    } else if(Q1 && E2 && T3) { //checked
        if(isNaN(Q1) || isNaN(E2) || isNaN(T3)) {
           document.getElementById('error4').innerHTML = errorNaNave;
           document.getElementById('Average').value = '';
        } else if(!isNaN(parseInt(Q1)) && !isNaN(parseInt(E2)) && !isNaN(parseInt(T3))) {
            total = parseInt(Q1)+parseInt(E2)+parseInt(T3);
            ave = total/3;
            document.getElementById('error4').innerHTML = '';
            document.getElementById('Average').value=ave.toFixed(2);
        }  
    } else if(!Q1 && !E2 && !T3){
        ave = '';

    document.getElementById('Average').value=ave;
    }
}

