<?php

use PHPUnit\Framework\TestCase;

require('../uploadFileFunctions.php');

class StackTest extends TestCase
{

    // ------Test --- checkFileSize --- function //

    //success
    public function test_checkFileSize_Success()
    {
        $expected = false;
        $inputA = 500099 ;
        $case = checkFileSize($inputA);
        $this->assertEquals($case, $expected);
    }

    //Malformed
    public function test_checkFileSize_Malformed()
    {
        $inputA = ['aa', 12];
        $this->expectException(TypeError::class);
        checkFileSize($inputA);
    }

    // ------Test --- checkFileType --- function //

    //success
    public function test_checkFileType_Success()
    {
        $expected = false;
        $inputA = 'fooo' ;
        $case = checkFileType($inputA);
        $this->assertEquals($case, $expected);
    }

    //Malformed
    public function test_checkFileType_Malformed()
    {
        $inputA = ['aa', 12];
        $this->expectException(TypeError::class);
        checkFileType($inputA);
    }


}