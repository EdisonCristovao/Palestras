<?php

require './code.php';

class CaesarCipherTest extends PHPUnit_Framework_TestCase
{
    public function testEncrypt()
    {
		$this->assertEquals("TESTE CIFRA DE CESAR", caesarEncrypt("TESTE CIFRA DE CESAR", 0));
		$this->assertEquals("LWKLW UAXJS VW UWKSJ", caesarEncrypt("TESTE CIFRA DE CESAR", 18));
		$this->assertEquals("NYMNY WCZLU XY WYMUL", caesarEncrypt("TESTE CIFRA DE CESAR", 20));
		
		$this->assertEquals("TESTE CIFRA DE CESAR", caesarDecrypt("GRFGR PVSEN QR PRFNE", 13));
		$this->assertEquals("TESTE CIFRA DE CESAR", caesarDecrypt("EPDEP NTQCL OP NPDLC", 11));
		$this->assertEquals("TESTE CIFRA DE CESAR", caesarDecrypt("QBPQB ZFCOX AB ZBPXO", 23));
		$this->assertEquals("TESTE CIFRA DE CESAR", caesarDecrypt("SDRSD BHEQZ CD BDRZQ", 25));
		
    }
}

?>
