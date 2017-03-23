<?php

require './code.php';

class CertificateSolution extends PHPUnit_Framework_TestCase
{  
    public function testCreateCACert()
    {
        $keyPair = new KeyPairExample();
        $caName = "Root Certification Authority";
        $caCert = createCACert($caName, $keyPair);
        $this->assertEquals($caName, openssl_x509_parse($caCert)["subject"]["CN"]);


        $keyPair2 = new KeyPairExample();
        $caName2 = "Edison Junior";
        $caCert2 = issueCert($caName2, $keyPair2, $caCert, $keyPair);
		$this->assertEquals($caName2, openssl_x509_parse($caCert2)["subject"]["CN"]);

    }
}

?>
