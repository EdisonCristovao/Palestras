<?php

require './keypair.php';

/*
CERTIFICATE CHAIN
 
Your goal is to create a Certification Authority's certificate, and another certificate, issued by this CA.
 
You have to implement 2 functions that generate different certificates. The first one to generate a certificate for a Root Certification Authority, and the second one an end user certificate, issued by a CA.

$keyPair is an instance of the class KeyPairExample in ./keypair.php. You must complete this class with your code from previous tasks.
*/

//Generates a certificate for a Root Certification Authority, using given common name $caName and $keyPair
function createCACert($caName, $keyPair) {
	$dn = array('commonName' => $caName);
	$csr = openssl_csr_new($dn, $keyPair->getPrivateKey());
	$ass = openssl_csr_sign($csr, null, $keyPair->getPrivateKey(), 1);
	return $ass;
 	// openssl_csr_sign($csr, null, $keypair->getPrivateKey(), 1);
}
 
//Generates a certificate for someone of common name $cn with $keyPair, issued by a certification authority identified by its x509.certificate $caCertificate and key pair $caKeyPair.
function issueCert($cn, $keyPair, $caCertificate, $caKeyPair) {
	if (openssl_x509_check_private_key($caCertificate, $caKeyPair->getPrivateKey())) {
		return createCACert($cn, $keyPair);
	}
}

?>
