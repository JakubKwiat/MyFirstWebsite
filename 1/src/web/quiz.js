function wyswietl()
{
	document.getElementById("gratulacje").innerHTML="<h1>Dziękuję za wzięcie udziału w Ankiecie</h1>"
}
function count_clicks() {
    if (localStorage.click_count) {
        localStorage.click_count = Number(localStorage.click_count) + 1;
    } else {
        localStorage.click_count = 1;
    }
    var div = document.getElementById("result");
    div.innerHTML = "Liczba Wypełnionych Ankiet Ogólnie: " +
        localStorage.click_count;
}

function myFunction() {
const costam= document.getElementById("contact");
  var para = document.createElement("div");
  para.style.margin="auto";
  para.style.width="200px";
  para.style.backgroundColor="#CCCC00";
  para.style.padding="20px";
  para.style.color="white";
  para.style.textAlign="center";
  para.innerText = "Przykładowy mail";
  contact.appendChild(para);
}
function count_clicks_session() {
    if (sessionStorage.click_count) {
        sessionStorage.click_count = Number(sessionStorage.click_count) + 1;
    } else {
        sessionStorage.click_count = 1;
    }
    var div = document.getElementById("result-session");
    div.innerHTML = "Liczba Wypiełnionych Ankiet W Tej Sesji: " +
        sessionStorage.click_count;
}
$( function() {
    $( "#datepicker" ).datepicker();
  } );
  
 $(function() {
	 $('input[type="checkbox"]')
 } );

  