function showHint(str) { 
 
  if (str.length == 0) {  
 //Code 4a 
	txtHint.innerText = "";
    return;
  } 
   
  xhttp = new XMLHttpRequest(); 
   
//Code 4b 

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			myObj = JSON.parse(xhttp.responseText);
			let text = "<table>";
			for (let x = 0; x < myObj.length; x++){
				text += "<tr>"
							+"<td>"+ myObj[x].id      + "</td>"
							+"<td>"+ myObj[x].name    + "</td>"
							+"<td>"+ myObj[x].details + "</td>"
							+"<td>"+ myObj[x].due     + "</td>"
							+"<td><img src='edit.png' style='width:30px;height:30px';></td>" 

						+"</tr>";
			}
			text+="</table>";
			txtHint.innerHTML = text;
		}
	};
  
  xhttp.open("GET", "home_gethint2.php?keyword="+str, true); 
  xhttp.send();    
} 

