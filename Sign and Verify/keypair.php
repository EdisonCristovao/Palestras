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

    public function encryptWPublicKey($data) {
       openssl_public_encrypt($data, $dataCrypted, $this->getPublicKey());
       return $dataCrypted;
    }

    public function decryptWPrivateKey($data) {
        openssl_private_decrypt($data, $dataDecrypted, $this->getPrivateKey());
        return $dataDecrypted;
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

    public function signMenssage($msg){
      openssl_sign($msg, $signature, $this->getPrivateKey(), OPENSSL_ALGO_SHA1);
      return $signature;
    }

    public function verifyMenssage($msg, $signature){
      $reto = openssl_verify($msg, $signature, $this->getPublicKey(), OPENSSL_ALGO_SHA1);
      if ($reto == 1)
        return true;
      else
        return false;

    }

}

?>
