<?php

class KeyPairExample
{
    public $keyPair;
   
    function __construct () {
        
    }
 
    public function getPublicKey() {

    }  
   
    public function getPrivateKey() {

    }

    public function encryptWPublicKey($data)
    {

    }

    public function decryptWPrivateKey($data)
    {

    }
   
    public function getHash($data) {
        return openssl_digest($data, openssl_get_md_methods()[4]);
    }
   
    public function encryptWPrivateKey($data)
    {
        openssl_private_encrypt($data, $encrypted, $this->getPrivateKey());
        return base64_encode($encrypted);
    }
 
    public function decryptWPublicKey($data)
    {
        openssl_public_decrypt(base64_decode($data), $decrypted, $this->getPublicKey());
        return $decrypted;
    }
 
}

?>
