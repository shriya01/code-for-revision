<?php 
include('BaseClass.php');
$cars= array("volvo","BMW","Tata");
$obj = new BaseClass;
//Array Function Demo
echo $obj->sortArray($cars);
echo $obj->isValueExistsInArray($cars, 'BMW');
echo $obj->isKeyExistsInArray($cars, 1);
echo $obj->removeLastElementFromArray($cars);
//String Function Demo
echo $obj->reverseString('Hello');
echo $obj->replaceWordInString('Hello World', 'World', 'Dolly');
echo $obj->countWordsInString('Hello');
echo $obj->convertStringToUCString('hello world');
//For Loop Functions Demo
echo $obj->starPyramidPrint(10);
echo $obj->calculateFactorial(5);
