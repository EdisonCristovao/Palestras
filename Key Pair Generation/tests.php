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
      $this->assertNotEquals("", $keyPair->decryptWPrivateKey($msgCif));

    }

    public function encryptAndDecriptWithDiferentKey() {
      $keyPair = new KeyPairExample();
      $keyPair2 = new KeyPairExample();
      $msgCif = $keyPair->encryptWPublicKey($msg);
     	$this->assertEquals("", $keyPair2->decryptWPrivateKey($msgCif));

    }

    public function encryptAndDecriptWithDiferentMsg() {
      $keyPair = new KeyPairExample();
      $keyPair2 = new KeyPairExample();
      $msgCif = $keyPair->encryptWPublicKey($msg);
      $msgCif2 = $keyPair2->encryptWPublicKey($msg);
     	$this->assertEquals($keyPair->decryptWPrivateKey($msgCif), $keyPair2->decryptWPrivateKey($msgCif));

    }

    public function encryptExist() {
      $keyPair = new KeyPairExample();
      $msgCif = $keyPair->encryptWPublicKey($msg);
      $this->assertNotEquals("", $msgCif);
      $this->assertNotEquals("", $keyPair->decryptWPrivateKey($msgCif));
    }

    public function verificaSeChavesSaoIguais(){
      $keyPair = new KeyPairExample();
      $keyPair2 = new KeyPairExample();
      $this->assertNotEquals($keyPair->getPrivateKeyPem(),$keyPair2->getPrivateKeyPem());
      $this->assertNotEquals($keyPair->getPublicKeyPem(),$keyPair2->getPublicKeyPem());
    }

    public function encryptMsgEncrypted(){
      $keyPair = new KeyPairExample();
      $msgCif = $keyPair->encryptWPublicKey($msg);
      $msgCif2 = $keyPair->encryptWPublicKey($msgCif);
      $this->assertEquals($msgCif, $keyPair->decryptWPrivateKey($msgCif2));

    }


}

?>
