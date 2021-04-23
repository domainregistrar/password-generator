<?php

namespace domainregistrar\PasswordGenerator;

use \PHPUnit\Framework\TestCase;

class PasswordGenTest extends TestCase {

    public function testInstantiationOfPasswordGen()
    {
        $obj = new PasswordGen();

        $this->assertInstanceOf(PasswordGen::class, $obj);
    }

    public function testRandSpecial()
    {
        $obj = new PasswordGen();
        $arr = $obj::randSpecial(5);

        $this->assertIsArray($arr);
        $this->assertCount(5, $arr);
    }

    public function testRandNumber()
    {
        $obj = new PasswordGen();
        $arr = $obj::randNumber(5);

        $this->assertIsArray($arr);
        $this->assertCount(5, $arr);
    }

    public function testGeneratePasswordInsufficientLength()
    {
        $this->expectException(\LengthException::class);
        $this->expectExceptionMessage("Insufficient length to fulfil password requirements.");

        $obj = new PasswordGen();
        $pass = $obj::generate(20, true, true, 2, 200);
    }

    public function testPasswordContainsAtLeastOneLowerChar()
    {
        $obj = new PasswordGen();
        $pass = $obj::generate(2, true, true, 0, 0);

        $this->assertMatchesRegularExpression('/[a-z]/', $pass);
    }
    public function testPasswordContainsAtLeastOneUpperChar()
    {
        $obj = new PasswordGen();
        $pass = $obj::generate(2, true, true, 0, 0);

        $this->assertMatchesRegularExpression('/[A-Z]/', $pass);
    }

    public function testPasswordCorrectLength()
    {
        $obj = new PasswordGen();
        $pass = $obj::generate(238954, true, true, 348, 243);

        $this->assertSame(strlen($pass), 238954);
    }
}