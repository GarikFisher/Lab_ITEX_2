getSelectInf1();
getSelectInf2();
getSelectInf3();


function get1(){
const ajax= new XMLHttpRequest();
let name=document.getElementById("select1").value;
ajax.open("GET","request1.php?name="+name);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.responseText);
		let res=JSON.parse(ajax.response);
		let output="";
		for(let i in res){
			output+="<tr><td>"+res[i].ward+"</td></tr>";
		}
		localStorage.setItem(name, output);
		document.getElementById("table1").innerHTML="<th>name ward</th>"+output;
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
		console.dir(ajax.responseText);
		let res=JSON.parse(ajax.response);
		let output="";
		for(let i in res){
			output+="<tr><td>"+res[i].name+"</td></tr>";
		}
		localStorage.setItem(department, output);
		document.getElementById("table2").innerHTML="<th>name nurse</th>"+output;
	}
	else alert("not");
}
ajax.send(null);
}

function get3(){
const ajax= new XMLHttpRequest();
var shift=document.getElementById("select3").value;
var department=document.getElementById("select4").value;
ajax.open("POST","request3.php?shift=" + shift + "&department=" + department);
ajax.onload=function(){
	if(ajax.status===200){
		console.dir(ajax.responseText);
		let res=JSON.parse(ajax.response);
		let output="";
		
		for(let i in res){
			output+="<tr><td>"+res[i].name+"</td>" + "<td>"+res[i].date+"</td>" + "<td>"+res[i].ward+"</td></tr>";
		}
		localStorage.setItem((shift+department), output);
		document.getElementById("table3").innerHTML="<th>nurse name</th>"+"<th>date</th>"+"<th>name ward</th>"+output;
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
		document.getElementById("select4").innerHTML=output;
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
	}
	else alert("not");
}
ajax.send(null);
}

function getSaveInf1(){
	let name=document.getElementById("select1").value;
	let out1=localStorage.getItem(name);
	document.getElementById("tableSave1").innerHTML="<th>name ward</th>"+out1;
}


function getSaveInf2(){
	let department=document.getElementById("select2").value;
	let out2=localStorage.getItem(department);
	document.getElementById("tableSave1").innerHTML="<th>name nurse</th>"+out2;
}


function getSaveInf3(){
	let shift=document.getElementById("select3").value;
	let departments=document.getElementById("select4").value;
	let out3=localStorage.getItem(shift+departments);
	document.getElementById("tableSave1").innerHTML="<th>nurse name</th>"+"<th>date</th>"+"<th>name ward</th>"+out3;
}

function clearStorage(){
	localStorage.clear();
}