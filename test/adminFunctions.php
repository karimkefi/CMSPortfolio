<?php

use PHPUnit\Framework\TestCase;

require('../adminFunctions.php');

class StackTest extends TestCase
{

    // ------Test --- userCredentials --- function //

    //success
    public function test_userCredentials_Success()
    {
        $expected = true;
        $inputA = 'kefi';
        $inputB = 'A1';
        $case = userCredentials($inputA, $inputB);
        $this->assertEquals($case, $expected);
    }
    //failure
    public function test_userCredentials_Failure()
    {
        $expected = false;
        $inputA = 'kefi';
        $inputB = 'A2';
        $case = userCredentials($inputA, $inputB);
        $this->assertEquals($case, $expected);
    }
    //Malformed
    public function test_userCredentials_Malformed()
    {
        $inputA = ['aa', 12];
        $inputB = 'A2';
        $this->expectException(TypeError::class);
        userCredentials($inputA, $inputB);
    }



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

