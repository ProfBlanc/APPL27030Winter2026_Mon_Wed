let name = prompt("Enter your name: ");
let age = prompt("Enter your age: ");

alert("Hello, " + name);
document.write("You are ", age, " years old");
if(age < 5){
    console.log("You are an enfant");
}
else if (age < 13){
    console.log("You are a child");
}
else if (age < 18){
    console.log("You are an teen");
}
else{
    console.log("You are an adult");
}