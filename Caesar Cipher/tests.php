<?php
use PHPUnit\Framework\TestCase;  // Teste para php 7
require './code.php';

class CaesarCipherTest extends TestCase // Teste para php 7
//class CaesarCipherTest extends PHPUnit_Framework_TestCase
{
    public function testEncrypt(){
      $this->assertEquals("bcd", caesarEncrypt("abc", 1));
    }

    public function testAutomaticAllKey() {
      $msg = "esse teste e divertido";

      for ($i=0; $i < 26; $i++) {
        $msgEnc = caesarEncrypt($msg, $i);
        $msgDec = caesarDecrypt($msgEnc, $i);
        $this->assertEquals($msg, $msgDec);

      }
    }

    public function testAutomaticAllKey2() {
      $msg = "The quick brown fox jumps over the lazy dog";

      for ($i=0; $i < 26; $i++) {
        $msgEnc = caesarEncrypt($msg, $i);
        $msgDec = caesarDecrypt($msgEnc, $i);
        $this->assertEquals($msg, $msgDec);

      }
    }

    public function testeComLetraMaiuscula() {
      $msg = "The Quick Brown fOx jumps over The lAzy dog";

      for ($i=0; $i < 26; $i++) {
        $msgEnc = caesarEncrypt($msg, $i);
        $msgDec = caesarDecrypt($msgEnc, $i);
        $this->assertEquals($msg, $msgDec);

      }
    }

    public function testeComCaracterEspecifico() {
      $msg = "The Qui'$'k BroWn fOx j@mps ov!r T''he lAzy dog";

      for ($i=0; $i < 26; $i++) {
        $msgEnc = caesarEncrypt($msg, $i);
        $msgDec = caesarDecrypt($msgEnc, $i);
        $this->assertEquals($msg, $msgDec);

      }
    }
}

?>
