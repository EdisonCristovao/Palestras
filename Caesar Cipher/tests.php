<?php

require './code.php';

class CaesarCipherTest extends PHPUnit_Framework_TestCase
{
    public function testEncrypt()
    {
		$this->assertEquals("C", caesarEncrypt("A", 2));
		$this->assertEquals("K", caesarEncrypt("J", 1));
		$this->assertEquals("B", caesarEncrypt("A", 0));
    }
}

?>
