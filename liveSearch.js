function showHint(keyword){
	 let xhttp = new XMLHttpRequest();

    // cek kesiapan ajax
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200)
           document.getElementById("tableTask").innerHTML = xhttp.responseText;
    }
    // ekseskusi ajax
    xhttp.open('GET', 'liveSearch.php?keyword=' + keyword, true);
    xhttp.send();
}