<?php
/**
* CalculatorIndexClass
*
* @package
* @subpackage
* @category
* @DateOfCreation        2 July 2018 9:44 AM
* @DateOfDeprecated
* @ShortDescription
* @LongDescription       If Needed)
*/
class CalculatorBaseClass
{
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Add Both The Input Field Provided
     * @LongDescription
     * @param integer $input1
     * @param integer $input2
     * @return [integer]          [Addition Of The Input Fields]
     */
    public function add($input1 = 0, $input2 = 0)
    {
        return $input1+$input2;
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Substract Both The Input Field Provided
     * @LongDescription
     * @param integer $input1
     * @param integer $input2
     * @return [integer]          [Substraction Of The Input Fields]
     */
    public function substract($input1 = 0, $input2 = 0)
    {
        return $input1-$input2;
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Multiply Both The Input Field Provided
     * @LongDescription
     * @param integer $input1
     * @param integer $input2
     * @return [integer]          [Multiplication Of The Input Fields]
     */
    public function multiply($input1 = 0, $input2 = 0)
    {
        return $input1*$input2;
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Divide Both The Input Field Provided
     * @LongDescription
     * @param integer $input1
     * @param integer $input2
     * @return [integer]          [Division Of The Input Fields]
     */
    public function divide($input1 = 0, $input2 = 0)
    {
        return $input1/$input2;
    }
    /**
     * @DateOfCreation       2 July 2018
     * @DateOfDeprecated
     * @ShortDescription     Check If Both The Input Field Are Not Empty
     * @LongDescription
     * @param integer $input1
     * @param integer $input2
     * @return [bool]         [true or false]
     */
    public function validate($input1, $input2)
    {
        if ($input1 != '' && $input2 != '') {
            return true;
        }
        return false;
    }
}
