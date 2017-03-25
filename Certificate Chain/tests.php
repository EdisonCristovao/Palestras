<?php
use PHPUnit\Framework\TestCase;  // Teste para php 7
require './code.php';

class CaesarCipherTest extends TestCase // Teste para php 7
//class CertificateSolution extends PHPUnit_Framework_TestCase
{
    public function testCreateCACert()
    {
        $keyPair = new KeyPairExample();
        $caName = "Root Certification Authority";
        $caCert = createCACert($caName, $keyPair);
        $this->assertEquals($caName, openssl_x509_parse($caCert)["subject"]["CN"]);
    }

    public function testeIssueCert() {
      $keyPair = new KeyPairExample();
      $caName = "Root Certification Authority";
      $caCert = createCACert($caName, $keyPair);

      $keyPair2 = new KeyPairExample();
      $caName2 = "Edison Junior";
      $caCert2 = issueCert($caName2, $keyPair2, $caCert, $keyPair);
      $this->assertEquals($caName2, openssl_x509_parse($caCert2)["subject"]["CN"]);
      openssl_x509_export($caCert2, $certout);
      echo $certout;

    }
}

?>
