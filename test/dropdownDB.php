<?php

use PHPUnit\Framework\TestCase;

require('../dropdownDB.php');

class StackTest extends TestCase
{
    // ------Test --- createDropdownfromDB --- function //

    //success
    public function test_createDropdownfromDB_Success()
    {
        $inputA =[['keyX'=>'test1'], ['keyX'=>'test2']];
        $inputK = 'keyX';
        $expected = '<option value="test1">test1</option><option value="test2">test2</option>';
        $case = createDropdownfromDB($inputA, $inputK);
        $this->assertEquals($case, $expected);
    }

    //Malformed
    public function test_createDropdownfromDB_Malformed1()
    {
        $inputA = [['test1','test2']];
        $this->expectException(TypeError::class);
        createDropdownfromDB($inputA);
    }

    //Malformed
    public function test_createDropdownfromDB_Malformed2()
    {
        $inputA = 'test1';
        $this->expectException(TypeError::class);
        createDropdownfromDB($inputA);
    }

}