<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include('CalculatorBaseClass.php');
if (isset($_POST['input1']) || isset($_POST['input2']) || isset($_POST['submit'])) {
    $input1 = $_POST['input1'];
    $input2 = $_POST['input2'];
    $obj1 = new CalculatorBaseClass;
    if ($obj1->validate($input1, $input2) == false) {
        echo "<div style='color:#780000;'>Please Enter Value In Both Input Fields</div>";
    } else {
        $obj1 = new CalculatorBaseClass;
        //get the value of submit and perform relevant operation by passing value to switch case
        $option = $_POST['submit']; 
        switch ($option) {
            case 'ADD':
            $result = $obj1->add($input1, $input2);
            break;
            case 'SUBSTRACT':
            $result =  $obj1->substract($input1, $input2);
            break;
            case 'MULTIPLY':
            $result =  $obj1->multiply($input1, $input2);
            break;
            case 'DIVIDE':
                if ($input2 == 0) {
                    echo "<div style='color:#780000;'>Input 2 Field Must Be Greater Than 0</div>";
                } else {
                    $result =  $obj1->divide($input1, $input2);
                }
            break;
            default:
               echo "please select a valid operation";
            break;
	    }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calculator Index</title>
	<style type="text/css">
		input{ width:100px; }
		input[type="submit"] { width: 118px; }
	</style>
</head>
<body>
	<form action="" method="post">
		<input type="text" placeholder="input1" name="input1" value="<?php if (isset($input1)) {
			echo $input1;
		} ?>">
		<input type="text" placeholder="input2" name="input2" value="<?php if (isset($input2)) {
			echo $input2;
		} ?>">
		<input type="text" name="output" value="<?php if (isset($result)) {
			echo $result;
		} ?>"><br>
		<input type="submit" name="submit" value="ADD">
		<input type="submit" name="submit" value="SUBSTRACT">
		<input type="submit" value="MULTIPLY" name="submit"><br>
		<input type="submit" name="submit" value="DIVIDE">
	</form> 
</body>
</html>
