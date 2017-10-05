
//add payments window open/close START
var wind = document.getElementById('add-payment-window');

var btn = document.getElementById("add-payment");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    wind.style.display = "block";
}

span.onclick = function() {
    wind.style.display = "none";
}

// optional
window.onclick = function(event) {
    if (event.target == wind) {
        wind.style.display = "none";
    }
}

//add payments window open/close END


//extended filter show&hide js support

var showhidebtn = document.getElementById("filtershowhide");
var fbinder = document.getElementById("filter-binder");

showhidebtn.onclick = function() {

	if(fbinder.style.display == "none") {fbinder.style.display = "block";}else{fbinder.style.display = "none";}
   
}

//extended filter show&hide js support END



//add payment json support start

var addpaymentbutton = document.getElementById('add-payment-button');
var paymentTitle = document.getElementById('paymentTitle');
var paymentAmount = document.getElementById('paymentAmount');
var paymentCategory = document.getElementById('paymentCategory');
var paymentDate = document.getElementById('paymentDate');
var paymentComment = document.getElementById('paymentComment');


addpaymentbutton.onclick = function (e) {


var Data = { 
	"cmd" : "addpayment",
	"paymentTitle" : ""+paymentTitle.value+"",
	"paymentAmount" : ""+paymentAmount.value+"",
	"paymentCategory" : ""+paymentCategory.value+"",
	"paymentDate" : ""+paymentDate.value+"",
	"paymentComment" : ""+paymentComment.value+""	
	};

var returneddata = sendjson(Data);
var DataArr = JSON.parse(returneddata);

if(DataArr.status == 1) {
	paymentTitle.value='';
	paymentAmount.value='';
	paymentCategory.value='1';
	paymentDate.value='';
	paymentComment.value='';
	alert('insert succesfull');
}else{
	alert('insert fail, please contact');
	}



};


//add payment json support end




//default results without filter
window.onload = function() {

var Data = { "cmd" : "anypropertysearch", "keyword" : "", "limit" : "100" };
var returneddata = sendjson(Data);
var DataArr = JSON.parse(returneddata);

//send to format
jsonDataFormat(DataArr);

};
//default results without filter END




//filter payment json support start


var timeout = null;

anyPropertyInput.onkeyup = function () {

clearTimeout(timeout);

	timeout = setTimeout(function () {

	filterForAll(0);

    }, 500);
};


//filter payment json support end





function filterForAll(id){

if(id != 0){
document.getElementById(id).classList.toggle('filtercategorybutton-active');
}

var cats = [];
for($x = 1; $x<=5; $x++) {
var isactive = document.getElementById("c"+$x).classList.contains("filtercategorybutton-active");

if(isactive) {cats.push($x);}

}




var anyPropertyInput = document.getElementById('anyPropertyInput');





var Data = { "cmd" : "anypropertysearch", "keyword" : ""+anyPropertyInput.value+"", "category" : ""+cats+"" };
var returneddata = sendjson(Data);
var DataArr = JSON.parse(returneddata);

//send to format
jsonDataFormat(DataArr);


}








//format json data and push to div START
function jsonDataFormat(DataArr) {


//output container div
var theDiv = document.getElementById("scroll");

var totalAmount = document.getElementById("totalAmount");

//clear div before every search
theDiv.innerHTML = ""; 

//push value to total records found div
var totalrecords = document.getElementById("totalrecords");
totalrecords.innerHTML = DataArr.length;

var total = 0;

var month = [];
for(var xx=0;xx < 12; xx++){
 month[xx] = 0;
};



//for loop start
for (var i=0;i<DataArr.length;i++) {


//sum by month
var d = new Date(DataArr[i].date);
var m = d.getMonth();
month[m] = (parseInt(month[m]) + parseInt(DataArr[i].amount));
//sum by month


//check if comment exists
if(DataArr[i].comment != '') 
	{var big='big'; var commentdiv = '<div class="results-inner-comment"><div class="results-inner-comment-head">Comment:</div><div class="results-inner-comment-text">'+DataArr[i].comment+'</div></div>';} 
	else{var big = '';var commentdiv ='';}
//check if comment exists end

//geenrate single div content
var divContent= '<div class="results'+big+'"><div class="results-inner"><div class="results-inner-left"><div class="payment-title">'+DataArr[i].title+'</div><div class="resultsbutton">'+DataArr[i].name+'</div></div><div class="results-inner-right"><div class="results-date">'+formatDate(new Date(DataArr[i].date))+'</div><div class="results-amount">-'+formatNumber(DataArr[i].amount)+'</div><div class="results-currency">GEL</div></div></div>'+commentdiv+'</div>';

//total amount calculator
total = (parseInt(total) + parseInt(DataArr[i].amount));

//push data to results-left div
theDiv.innerHTML += divContent; 

         }
//for loop End

//push total amount to total div
totalAmount.innerHTML = formatNumber(total); 



//update monthly graph (payments)
for(var xx=0;xx < 12; xx++){
var monthddiv = document.getElementById('m'+xx);

var pct = percent(total,month[xx]);
var height= pct*1.7; //170px gamovida 100%
monthddiv.style.height = height+"px";
monthddiv.innerHTML = '<div class="bar-percent">'+pct+'</div>';
}

//update monthly graph (payments)


}
//format json data and push to div END







//json resquest form

function sendjson (Data) {

var httpReqObj = new XMLHttpRequest();

httpReqObj.open("POST", "/index.php", false);
httpReqObj.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

var requestData = Data;

httpReqObj.send(JSON.stringify(requestData));

if (httpReqObj.readyState == 4 && httpReqObj.status == 200)
{
  //-- Good
  return httpReqObj.responseText;

}

return 0;
}

//json request form



//calculate percent 
function percent(total,month){

var percent = month/total*100

return percent.toFixed(2);
}

//calculate percent





















//nu es funqciebi sxva failshi unda iyos mara...

//number format
function formatNumber(n) {
    
    return parseFloat(Math.round(n) / 100).toFixed(2);
}
//number format end


//format date
function formatDate(date)
{
  var
    month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
    days  = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']
  ;
  return 'on ' +days[date.getDay()]+', '+date.getDate()+' '+month[date.getMonth()]+' '+date.getFullYear()
}
//format date END

