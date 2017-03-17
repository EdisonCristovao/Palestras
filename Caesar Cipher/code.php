<?php

/*
CAESAR CIPHER

Your goal is to implement the encrypt and decrypt methods of a caesar cipher.

You have to implement 2 methods, one to encrypt a message, and another to decrypt an encrypted message. Both of them will receive a string, that is the message, and an integer, which is the key that represents how much the alphabet will be shifted.
*/

function caesarEncrypt($plainText, $key) {
	$numDaLetra = getNumeroLetra($plainText);
	$numeroCodificado = ($numDaLetra + $key) % 26;

	return getLetraNumero($numeroCodificado);
}
 
function caesarDecrypt($cipherText, $key) {
	$numeroDaLetra = getNumeroLetra($cipherText);
	$numeroDecodificado = ($numeroDaLetra + (26 - $key)) % 26;

 	return getLetraNumero($numeroDecodificado);
}

function getNumeroLetra($letra){
	for ($i=0; $i < 26; $i++) {
		if (strcasecmp(getLetraNumero($i), $letra) == 0) {
			return $i;
		}
	}
}

function getLetraNumero($num){
$letras = array("A", "B","C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

return $letras[$num];
}
?>
