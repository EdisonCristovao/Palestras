<?php
use PHPUnit\Framework\TestCase;  // Teste para php 7
require './code.php';

class CaesarCipherTest extends TestCase // Teste para php 7
//class SignSolution extends PHPUnit_Framework_TestCase
{
    private $message = "Cwm fjord bank glyphs vext quiz.";
    public function testSignAndVerify()
    {
        $keyPair = new KeyPairExample();
        $signature = sign($this->message, $keyPair);
        $this->assertTrue(verify($this->message, $signature, $keyPair));
    }

    public function testeVerifyMsgDiferente(){
      $msg = "outra msg diferente";
      $keyPair = new KeyPairExample();
      $signature = sign($this->message, $keyPair);
      $this->assertFalse(verify($msg, $signature, $keyPair));
    }

    public function testeParDeChavesDiferentes(){
      $msg = "outra msg diferente";
      $keyPair = new KeyPairExample();
      $keyPair2 = new KeyPairExample();
      $signature = sign($this->message, $keyPair);
      $this->assertFalse(verify($this->message, $signature, $keyPair2));
    }

    public function testeOutraAssinatura(){
      $msg = "outra msg diferente";
      $keyPair = new KeyPairExample();
      $signature = sign($this->message, $keyPair);
      $signature2 = sign($msg, $keyPair);
      $this->assertFalse(verify($this->message, $signature2, $keyPair));

    }

    public function testeMesmaAssinatura(){
      $keyPair = new KeyPairExample();
      $signature = sign($this->message, $keyPair);
      $signature2 = sign($this->message, $keyPair);
      $this->assertTrue(verify($this->message, $signature2, $keyPair));

    }

}

?>
