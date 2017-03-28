<?php
use PHPUnit\Framework\TestCase;  // Teste para php 7
require './code.php';

class CaesarCipherTest extends TestCase // Teste para php 7
// class CertificateSolution extends PHPUnit_Framework_TestCase
{
    public function testCreateCACert()
    {
        $keyPair = new KeyPairExample();
        $caName = "Root Certification Authority";
        $caCert = createCACert($caName, $keyPair);
        $this->assertEquals($caName, openssl_x509_parse($caCert)["subject"]["CN"]);
        $this->assertEquals($caName, openssl_x509_parse($caCert)["issuer"]["CN"]);

    }

    public function testeIssueCert() {
      $keyPair = new KeyPairExample();
      $keyPair2 = new KeyPairExample();
      $caName = "Root Certification Authority";
      $caName2 = "Edison Junior";
      $caCert = createCACert($caName, $keyPair);
      $caCert2 = issueCert($caName2, $keyPair2, $caCert, $keyPair);

      $this->assertEquals($caName2, openssl_x509_parse($caCert2)["subject"]["CN"]);
      $this->assertEquals($caName, openssl_x509_parse($caCert2)["issuer"]["CN"]);
   }

   // nao imaginei outros testes, ja que as unicas informaçoes inseridas ja foram testadas
}

?>
