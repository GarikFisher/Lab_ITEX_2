getSelectInf1();
getSelectInf2();
getSelectInf3();
getSelectInf4();

function get1(){
const ajax= new XMLHttpRequest();
let name=document.getElementById("select1").value;
ajax.open("GET","request1.php?name="+name);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.responseText);
		document.getElementById("table1").innerHTML=ajax.responseText;
	}
	else alert("not");
}
ajax.send(null);
}

function get2(){
const ajax= new XMLHttpRequest();
let department=document.getElementById("select2").value;
ajax.open("GET","request2.php?department=" + department);
ajax.onload=function(){
	if(ajax.status===200){
		var res = ajax.responseXML.firstChild.children;
		console.dir(res);
		output="";
		for(var i=0; i<res.length; i++){
			output+="<tr>";
			output+="<td>"+res[i].children[0].textContent +"</td>";
			output+="</tr>";
		}
		document.getElementById("table2").innerHTML="<th>nurse name</th>"+output;
	}
	else alert("not");
}
ajax.send(null);
}

function get3(){
const ajax= new XMLHttpRequest();
var shift=document.getElementById("select3").value;
ajax.open("POST","request3.php?shift=" + shift);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.responseText);
		let res=JSON.parse(ajax.response);
		let output="";
		for(let i in res){
			output+="<tr><td>"+res[i].nuse_name+"</td>" + "<td>"+res[i].ward_name+"</td></tr>";
		}
		document.getElementById("table3").innerHTML="<th>nurse name</th>"+"<th>name ward</th>"+output;
	}
	else alert("not");
}
ajax.send(null);
}



function insert_nurse(){
const ajax= new XMLHttpRequest();
let id=document.getElementById("id").value;
let name=document.getElementById("name").value;
let date=document.getElementById("date").value;
let depart_select=document.getElementById("depart_select").value;
let shift=document.getElementById("duty_select").value;
ajax.open("GET","insert_nurses.php?id=" + id + "&name=" + name + "&date=" + date + "&depart_select=" + depart_select + "&shift=" + shift);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.status);
	}
	else alert("not");
}
ajax.send(null);
}

function insert_ward(){
const ajax= new XMLHttpRequest();
let id=document.getElementById("id_ward").value;
let name=document.getElementById("ward_name").value;
ajax.open("GET","insert_wards.php?id=" + id + "&name=" + name);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.status);
	}
	else alert("not");
}
ajax.send(null);
}


function set(){
const ajax= new XMLHttpRequest();
let name_nurse=document.getElementById("name_select").value;
let name_ward=document.getElementById("ward_select").value;
ajax.open("GET","appointings.php?name_nurse=" + name_nurse + "&name_ward=" + name_ward);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.status);
	}
	else alert("not");
}
ajax.send(null);
}


function getSelectInf1(){
const ajax= new XMLHttpRequest();
ajax.open("GET","Select1.php");
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.responseText);
		let res=JSON.parse(ajax.response);
		output="";
		for (let i in res ) {
			output+="<option>" + res[i].name + "</option>"
		}
		document.getElementById("select1").innerHTML=output;
		document.getElementById("name_select").innerHTML=output;
	}
	else alert("not");
}
ajax.send(null);
}

function getSelectInf2(){
const ajax= new XMLHttpRequest();
ajax.open("GET","Select2.php");
ajax.onload=function(){
	if(ajax.status===200){
		let res=JSON.parse(ajax.response);
		output="";
		for (let i in res ) {
			output+="<option>" + res[i].department + "</option>"
		}
		document.getElementById("select2").innerHTML=output;
		document.getElementById("depart_select").innerHTML=output;
	}
	else alert("not");
}
ajax.send(null);
}

function getSelectInf3(){
const ajax= new XMLHttpRequest();
ajax.open("GET","Select3.php");
ajax.onload=function(){
	if(ajax.status===200){
		let res=JSON.parse(ajax.response);
		output="";
		for (let i in res ) {
			output+="<option>" + res[i].shift + "</option>"
		}
		document.getElementById("select3").innerHTML=output;
		document.getElementById("duty_select").innerHTML=output;
	}
	else alert("not");
}
ajax.send(null);
}

function getSelectInf4(){
const ajax= new XMLHttpRequest();
ajax.open("GET","Select4.php");
ajax.onload=function(){
	if(ajax.status===200){
		let res=JSON.parse(ajax.response);
		output="";
		for (let i in res ) {
			output+="<option>" + res[i].name + "</option>"
		}
		document.getElementById("ward_select").innerHTML=output;
	}
	else alert("not");
}
ajax.send(null);
}
