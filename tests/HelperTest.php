<?php

namespace Tests;

use App\Helper;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    public function testWithInvalidInput()
    {
        $this->assertEquals("Input should be number type!", Helper::f('test'));
    }

    public function testWithNumber()
    {
        $this->assertEquals("9,527", Helper::f(9527));
        $this->assertEquals("3,345,678", Helper::f(3345678));
        $this->assertEquals("-123.45", Helper::f(-123.45));
        $this->assertEquals("-123,678.45", Helper::f(-123678.45));
        $this->assertEquals("123,456,789.1234", Helper::f(123456789.1234));
        $this->assertEquals("1.01", Helper::f(1.01));
    }

    public function testWithNumberByPHPBuildInFunction()
    {
        $this->assertEquals("9,527", Helper::f2(9527));
        $this->assertEquals("3,345,678", Helper::f2(3345678));
        $this->assertEquals("-123.45", Helper::f2(-123.45));
        $this->assertEquals("-123,678.45", Helper::f2(-123678.45));
        $this->assertEquals("123,456,789.1234", Helper::f2(123456789.1234));
        $this->assertEquals("1.01", Helper::f2(1.01));
    }
}
