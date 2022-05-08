//read the movie object from localstorage
let myObject = localStorage.getItem('moviesInCart');
myObject = JSON.parse(myObject);



function insertMovies(){
    //read tickCount from localstorage
    let ticketCount = localStorage.getItem('numberInCart');
    ticketCount = JSON.parse(ticketCount);
    document.getElementById("ticketCount").innerHTML = ticketCount;

    var table = document.getElementById("data");
    table.innerHTML = "" ;
    var tr = "" ;
    var overallTotal= 0;
    var index= 0 ;
    var overallTotal=  localStorage.getItem('totalCost');
    overallTotal = JSON.parse(overallTotal);
    myObject.forEach(x=>{
//read the totalCost from lcoalstorage

var totalCost = x.ticket_price * x.tickets_in_cart  ;

        if(x.tickets_in_cart>0) {
            tr += '<tr>';
            tr += '<td><i class="fa-solid fa-circle-minus" style="color:red" onclick="remove(' + index + ')"></i>' + x.title + '</td>' + '<td> R' + x.ticket_price + '.00</td>' + '<td><i class="fa-solid fa-circle-minus" style="color:red" id="ticketCart' + index + '"  onclick="editDown(' + index + ')">' + x.tickets_in_cart + '</i><i class="fa-solid fa-circle-plus" style="color: green" onclick="editUP(' + index + ')"></i></td>' + '<td id="totalCost' + index + '"> R' + totalCost + '.00</td>';
            tr += '</tr>';
        }
index++;
    })
    tr += '<tr style="background-color: #808080">';
    tr += '<td> Total </td>' + '<td> <td>' +'</td>' + '<td style="color:darkred;font-weight:bold" id="total"> R' + overallTotal + '.00</td>';
    tr += '</tr>';
    table.innerHTML+=tr;

}





function remove(index){

        //delete the row by index
        document.getElementById("myTable").deleteRow(index+1);

        //retrieve the ticket amount and edit it
    var x = parseInt(document.getElementById("ticketCount").innerText);
    var y = myObject[index]['tickets_in_cart'];
    var total = x-y;
    //add it to localstorage again
    localStorage.setItem('numberInCart', JSON.stringify(total));
    document.getElementById("ticketCount").innerText = total;
    //*************************************************************

    //Edit total price***************************************************************
    var overallTotal=  localStorage.getItem('totalCost');
    overallTotal = JSON.parse(overallTotal);
    var tCount = myObject[index]['tickets_in_cart'];
    var tPrice = myObject[index]['ticket_price'];

    var newTotal = overallTotal - (tCount*tPrice) ;

    //add it back to localStorage
    localStorage.setItem('totalCost', JSON.stringify(newTotal));

    document.getElementById("total").innerText ="" ;
    document.getElementById("total").innerText ="R" + newTotal + ".00";
    //*********************************************************************************

}



function editDown(index){
    var str = "ticketCart" + index ;
    var ticketQuan = parseInt(document.getElementById(str).innerText);
    ticketQuan--;

    if(ticketQuan == 0)
    {
        remove(index) ;
    }
    else
    {

        document.getElementById(str).innerHTML =  ticketQuan ;
    }

    //Change cart value******************************************************
    let ticketCount = localStorage.getItem('numberInCart');
    ticketCount = JSON.parse(ticketCount);

    ticketCount-- ;
    localStorage.setItem('numberInCart', JSON.stringify(ticketCount));

    document.getElementById("ticketCount").innerText = ticketCount;
    //*************************************************************************

    //Change Total cost of movie ticket****************************************
    var id = "totalCost" + index;
    var total = myObject[index]['ticket_price'] * ticketQuan;
    document.getElementById(id).innerText ="R" + total +".00"  ;
    //*************************************************************************

    //Change overall total and write to localstorage
    var text = document.getElementById("total").innerText;
    var overallTot = parseInt(text.substr(1,3));
    overallTot -= myObject[index]['ticket_price'] ;
    document.getElementById("total").innerText = "R" + overallTot + ".00";
    localStorage.setItem('totalCost', JSON.stringify(overallTot));
}

function editUP(index){
    var str = "ticketCart" + index ;
    var ticketQuan = parseInt(document.getElementById(str).innerText);
    ticketQuan++;
        document.getElementById(str).innerHTML = ticketQuan;

    //Change cart value******************************************************
    let ticketCount = localStorage.getItem('numberInCart');
    ticketCount = JSON.parse(ticketCount);

    ticketCount++ ;
    localStorage.setItem('numberInCart', JSON.stringify(ticketCount));

    document.getElementById("ticketCount").innerText = ticketCount;
    //*************************************************************************

    //Change Total cost of movie ticket****************************************
    var id = "totalCost" + index;
    var total = myObject[index]['ticket_price'] * ticketQuan;
    document.getElementById(id).innerText ="R" + total +".00"  ;
    //*************************************************************************

    //Change overall total and write to localstorage
    var text = document.getElementById("total").innerText;
    var overallTot = parseInt(text.substr(1,3));
    overallTot += myObject[index]['ticket_price'] ;
    document.getElementById("total").innerText = "R" + overallTot + ".00";
    localStorage.setItem('totalCost', JSON.stringify(overallTot));
}
