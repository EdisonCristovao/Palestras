<?php

/*
KEY PAIR GENERATION
 
Your goal is to generate a key pair using php openssl functions.
 
You have to implement the constructor and all four functions of the class KeyPairExample.

PHP OpenSSL functions should be used. Information about those can be found on http://php.net/manual/en/ref.openssl.php
*/

class KeyPairExample
{
    public $keyPair;
   
    function __construct () {
        //should create a new key pair, and store it on $this->keyPair
        $keySize = 1024;
        $this->keyPair = openssl_pkey_new(array($keySize));
    }
 
    public function getPublicKeyPem() {
        //returns the public key of the key pair on PEM format
        $pubKey = openssl_pkey_get_details($this->keyPair);
        return $pubKey["key"];
    }  
   
    public function getPrivateKeyPem() {
        //returns the private key of the key pair on PEM format
        openssl_pkey_export($this->keyPair, $priKey);
        return $priKey;
    }
   
    public function encryptWPublicKey($data)
    {
        //encrypts data with the public key
       openssl_public_encrypt($data, $dataCrypted, $this->getPublicKeyPem());
       return $dataCrypted;
    }
   
    public function decryptWPrivateKey($data)
    {
        //decrypts data with the private key
        openssl_private_decrypt($data, $dataDecrypted, $this->getPrivateKeyPem());
        return $dataDecrypted;
    }
 
}

?>
