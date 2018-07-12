<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
/**
 * BaseClass
 *
 * @package
 * @subpackage
 * @category
 * @DateOfCreation       29-Jun-2018
 * @DateOfDeprecated
 * @ShortDescription     Contains functions related to array,string and loop
 * @LongDescription
 */

class BaseClass
{
    /*--------------------------------------
            Array functions
    ----------------------------------------*/
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Sort Sequential Array Either Asending Or Descending
     * @LongDescription
     * @param [array] $arrayToSort [The Array Which Is Going To Be Sort]
     * @param [booleans] $desc        [accepts true or false]
     */
    public function sortArray($arrayToSort, $desc = 'false')
    {
        sort($arrayToSort); //Default sort arrays in ascending order
        if ($desc===true) {
            rsort($arrayToSort); //if $desc holds true sort arrays in descending order
        }
        $clength = count($arrayToSort);
        echo "After Sorting - <br />";
        for ($x = 0; $x < $clength; $x++) {
            echo $arrayToSort[$x];
            echo "<br>";
        }
        echo "<hr />";
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Check Value Exists In Array Or Not
     * @LongDescription
     * @param  [array]  $array
     * @param  [string]  $value
     */
    public function isValueExistsInArray($array = [], $value = '')
    {
        if (in_array($value, $array)) {
            echo $value." value exists";
        } else {
            echo $value." value not exists";
        }
        echo "<hr />";
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Check key Exists In Array Or Not
     * @LongDescription
     * @param  [array]  $array
     * @param  [string]  $value
     */
    public function isKeyExistsInArray($array = [], $key = '')
    {
        if (array_key_exists($key, $array)) {
            echo $key." key exists!";
        } else {
            echo $key." key does not exist!";
        }
        echo "<hr />";
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Removes Last Element From Array
     * @LongDescription
     * @param  [array]  $array
     */
    public function removeLastElementFromArray($array = [])
    {
        echo 'Given Array :- ';
        print_r($array);
        echo "<br />";
        array_pop($array);

        echo 'After Removing Last Element From Array :- ';
        print_r($array);
        echo "<hr />";
    }

    /*--------------------------------------------
                String Functions
    --------------------------------------------*/
    /**
     * @DateOfCreation        29-June-2018
     * @DateOfDeprecated
     * @ShortDescription      [Reverses The Given String]
     * @LongDescription
     * @param string $stringToReverse 
     * @return string $reversedString  
     */
    public function reverseString($stringToReverse = '')
    {
        $reversedString = '';
        echo "String is ". $stringToReverse;
        echo "<br />";
        if ($stringToReverse != '') {
            $reversedString = strrev($stringToReverse);
        }
        return "Reverse String is ".$reversedString;
    }
    /**
     * @DateOfCreation        29-June-2018
     * @DateOfDeprecated
     * @ShortDescription      [Replaces the specified word with the given word]
     * @LongDescription
     * @param [string] $stringToReplace [String in which we have to replace word]
     * @param string $wordToReplace   [word which is going to be replaced]
     * @param string $wordReplaceBy   [word ehich will replace the word]
     * @return [string] [replaced string]
     */
    public function replaceWordInString($stringToReplace = '', $wordToReplace = '', $wordReplaceBy = '')
    {
        $replacedString = '';
        echo "<hr />";
        echo "Given word is - ".$stringToReplace."<br />";
        if ($stringToReplace != '') {
            $replacedString =  str_replace($wordToReplace, $wordReplaceBy, $stringToReplace);
        }
        return "After replacing word ".$wordToReplace." by word ".$wordReplaceBy." string is - ".$replacedString;
    }
    /**
     * @DateOfCreation        29-June-2018
     * @DateOfDeprecated
     * @ShortDescription      Count number of words in string
     * @LongDescription
     * @param  [string] $string [string in which we count words]
     * @return [string]         [message about word count]
     */
    public function countWordsInString($string)
    {
        echo "<hr />";
        echo "Given word is - ".$string;
        echo "<br />";
        if ($string != '') {
            $count =  str_word_count($string);
        }
        return 'Word count in string is '.$count;
    }
    /**
     * @DateOfCreation        29-June-2018
     * @DateOfDeprecated
     * @ShortDescription      Covert First Element Of Each Word To Uppercase In String
     * @param  [string] $string [string to be modified]
     * @return [string]         [converted uppercase string]
     */
    public function convertStringToUCString($string)
    {
        echo "<hr />";
        echo "Given string is - ".$string;
        if ($string != '') {
            return "<br />Modified UC String is - ".ucwords($string);
        }
    }
    /*-----------------------------------------
                For Loop Functions
    -----------------------------------------*/
    /**
     * @DateOfCreation        29-June-2018
     * @DateOfDeprecated
     * @ShortDescription      creates a pyramid till the given length
     * @param  [int] $heightOfPyramid [pyramid length in integers]
     */
    public function starPyramidPrint($heightOfPyramid)
    {
        echo "<hr />";
        echo "Given length is -".$heightOfPyramid;
        echo "<br />";
        for ($i=1; $i<=$heightOfPyramid; $i++) {
            echo " ";
            for ($j=1; $j<=$i;$j++) {
                echo "*";
            }
            echo "<br />";
        }
    }
    /**
     * @DateOfCreation        29-June-2018
     * @DateOfDeprecated
     * @ShortDescription      Calculates the factorial of a given number
     * @param  [int] $number  [numbers whose factorial is to be calculated]
     * @return [int]         [factorial value]
     */
    public function calculateFactorial($number)
    {
        echo "<hr />";
        echo "Given number is - ".$number;
        echo "<br />";
        //Default value of factorial
        $factorial = 1;
        for ($i=1; $i<=$number;$i++) {
            $factorial = $factorial * $i;
        }
        return "factorial of number is - ".$factorial;
    }
}
