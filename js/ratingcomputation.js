 //Computation of ratings
                function getAverage(){
                    var Q1=document.getElementById('Quality').value;
                    var E2=document.getElementById('Efficiency').value;
                    var T3=document.getElementById('Timeliness').value;
                    var total;
                    var ave;
                    
                    if(!Q1 && E2 && T3) { //checked
                    total = parseInt(E2)+parseInt(T3);
                    ave = total/2;

                    document.getElementById('Average').value=ave.toFixed(2);
                    } else if(Q1 && !E2 && T3) { //checked
                        total = parseInt(Q1)+parseInt(T3);
                        ave = total/2;

                        document.getElementById('Average').value=ave.toFixed(2);
                    } else if(Q1 && !T3 && E2){ //checked
                        total = parseInt(Q1)+parseInt(E2);
                        ave = total/2;

                        document.getElementById('Average').value=ave.toFixed(2);
                    } else if(Q1 && !E2 && !T3) {
                        ave = Q1;
                        
                        document.getElementById('Average').value=ave;
                    } else if(!Q1 && !T3 && E2) {
                        ave = E2;

                        document.getElementById('Average').value=ave;
                    } else if(!Q1 && !E2 && T3) {
                        ave = T3;

                        document.getElementById('Average').value=ave;
                    } else if(Q1 && E2 && T3) { //checked
                        total = parseInt(Q1)+parseInt(E2)+parseInt(T3);
                        ave = total/3;

                        document.getElementById('Average').value=ave.toFixed(2);
                    } else if(!Q1 && !E2 && !T3){
                        ave = 0

                        document.getElementById('Average').value=ave;
                    }
                }