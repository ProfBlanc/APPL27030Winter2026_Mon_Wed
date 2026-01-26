

for(let i = 1; i <=5; i++ ){

    let selectedDiv = document.getElementById("d" + i);
    selectedDiv.innerHTML += "<h1>Div " + i + "</h1>";
    selectedDiv.innerHTML += "Double the value of <strong>" + i + "</strong>";
    selectedDiv.innerText += " is " + i * 2; 

}