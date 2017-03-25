<?php
use PHPUnit\Framework\TestCase;  // Teste para php 7
require './code.php';

class CaesarCipherTest extends TestCase // Teste para php 7
//class KeyPairExampleSolution extends PHPUnit_Framework_TestCase
{
  private $msg = "Msg Aleator!a Com divers0s Car@cter legais !!";

    public function testGenerateKeyPair()
    {
      $keyPair = new KeyPairExample();
      $this->assertEquals("OpenSSL key", get_resource_type($keyPair->keyPair));
    }

    public function encryptAndDecript() {
      $keyPair = new KeyPairExample();
    	$msgCif = $keyPair->encryptWPublicKey($msg);
     	$this->assertEquals($msg, $keyPair->decryptWPrivateKey($msgCif));

    }
}

?>
