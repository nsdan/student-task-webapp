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
			let text = "";
			for (let x = 0; x < myObj.length; x++){
				if (x === (myObj.length - 1)) { text += myObj[x].name; }
				else { text += myObj[x].name + ", "; }
			}
			txtHint.innerText = text;
		}
	};
  
  xhttp.open("GET", "php11F_gethint2.php?keyword="+str, true); 
  xhttp.send();    
} 

