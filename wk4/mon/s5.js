//get all of the child divs (not decendants) of container class

// .container > div

let divs = document.querySelectorAll(".container > div");
console.log(divs);

//for(let d of divs){}
for(let i = 0; i < divs.length; i++){

    if(i % 2 == 0){
    
        let selectedDiv = divs[i];
        selectedDiv.addEventListener("mouseover", 
            function(el){
                el.target.style.background = "blue";
            }
        );
        selectedDiv.addEventListener("mouseout", 
            function(el){
                el.target.style.background = "white";
            }
        );

    }

}