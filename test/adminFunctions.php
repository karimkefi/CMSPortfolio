<?php

use PHPUnit\Framework\TestCase;

require('../adminFunctions.php');

class StackTest extends TestCase
{

    // ------Test --- sanitiseString --- function //

    //success
    public function test_sanitiseString_Success()
    {
        $expected = '/kefi&amp;';
        $inputA = '  /\kefi&  ';
        $case = sanitiseString($inputA);
        $this->assertEquals($case, $expected);
    }

    //failure
    public function test_sanitiseString_Failure()
    {
        $expected = '12';
        $inputA = 12;
        $case = sanitiseString($inputA);
        $this->assertEquals($case, $expected);
    }

    //Malformed
    public function test_sanitiseString_Malformed()
    {
        $inputA = ['aa', 12];
        $this->expectException(TypeError::class);
        sanitiseString($inputA);
    }


}

