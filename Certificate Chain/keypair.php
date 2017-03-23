<?php

class KeyPairExample
{
    public $keyPair;
   
    function __construct () {
        $keySize = 1024;
        $this->keyPair = openssl_pkey_new(array($keySize));
    }
 
    public function getPublicKey() {
    	$pubKey = openssl_pkey_get_details($this->keyPair);
        return $pubKey["key"];
    }  
   
    public function getPrivateKey() {
    	openssl_pkey_export($this->keyPair, $priKey);
        return $priKey;
    }
    
}

?>
