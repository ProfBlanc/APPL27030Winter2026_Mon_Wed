
let divs = document.querySelectorAll(".divs");  //an array of values
let i = 0;
for(let d of divs){  //iterate thru all values of array
    i++;
    d.innerHTML += "<h1>Div " + i  + "</h1>";
    d.innerHTML += "Double the value of <strong>" + i + "</strong>";
    d.innerHTML += " is " + i * 2; 

}