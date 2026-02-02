<?php
if(isset($_GET['submit'])){

echo "Form submitted";

$n1 = $_GET['n1'] ?? 0;
$n2 = $_GET['n2'] ?? 0;
$op = $_GET['operator'] ?? '+';

$n1 = is_numeric($n1) ? intval($n1) : 0;
$n2 = is_numeric($n2) ? intval($n2) : 0;

if(!in_array($op, ["+", "-", "*", "/"])){
    $op = "+";
}
$result = 0;
switch($op){
    case "+":
        $result = $n1 + $n2;
        break;
    case "-":
        $result = $n1 - $n2;
        break;
    case "*":
        $result = $n1 * $n2;
        break;
    case "/":
        $result = $n1 / $n2;
        break;
    default: $result = $n1 + $n2; break;
}

echo $n1, $op, $n2, "=", $result;


}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math</title>
</head>
<body>
    <form method="get" >
        <legend>
        First Number
        </legend>
        <input type="number" name="n1" value="" placeholder="Enter first number"/>
        <br/>
        <br/>
        <legend>
        Operator
        </legend>
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <br/>
        <br/>
        <legend>
        Second Number
        </legend>
        <input type="number" name="n2" value="" placeholder="Enter second number"/>
        <br/>
        <br/>
        <input type="submit" name="submit" value="Calculate">

    </form>
    
</body>
</html>