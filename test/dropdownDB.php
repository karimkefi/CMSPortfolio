<?php

use PHPUnit\Framework\TestCase;

require('../dropdownDB.php');

class StackTest extends TestCase
{

    // ------Test --- getValuesfromDB --- function //

    //success
    public function test_getValuesfromDB_Success()
    {
        $inputA =[['keyX'=>'test1'], ['keyX'=>'test2']];
        $inputK = 'keyX';
        $expected = '<option value="keyX">test1</option><option value="keyX">test2</option>';
        $case = getValuesfromDB($inputA, $inputK);
        $this->assertEquals($case, $expected);
    }


}