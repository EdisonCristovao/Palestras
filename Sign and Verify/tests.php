<?php

require './code.php';

class SignSolution extends PHPUnit_Framework_TestCase
{
    private $message = "Cwm fjord bank glyphs vext quiz.";
   	private $message2 = "Esse teste eu achei massa d+";
    public function testSignAndVerify()
    {
        $keyPair = new KeyPairExample();
        $keyPair2 = new KeyPairExample();
        
        $signature = sign($this->message, $keyPair);
        //assinei a mesma msg com um par de chaves diferentes
        $signature2 = sign($this->message2, $keyPair2);
        
        //verificando se a assinatura é do par de chaves atual === true
        $this->assertTrue(verify($this->message, $signature, $keyPair));
 		
 		//verificando se a assinatura 2 é do par de chaves atual === false
        $this->assertFalse(verify($this->message2, $signature2, $keyPair));
    
    }
 
}

?>
