<?php

/*
CAESAR CIPHER

Your goal is to implement the encrypt and decrypt methods of a caesar cipher.

You have to implement 2 methods, one to encrypt a message, and another to decrypt an encrypted message. Both of them will receive a string, that is the message, and an integer, which is the key that represents how much the alphabet will be shifted.
*/

function caesarEncrypt($plainText, $key) {
	$msg = str_split($plainText);
	$msgEncr = "";

	foreach ($msg as $char )
		$msgEncr .= "".encrypt($char, $key);
	return $msgEncr;
}

function caesarDecrypt($cipherText, $key) {
	$msg = str_split($cipherText);
	$msgDencr = "";

	foreach ($msg as $char )
		$msgDencr .= "".decrypt($char, $key);
	return $msgDencr;
}

function encrypt($char, $key){
	if (caracterEspeciais($char) != null)
		return caracterEspeciais($char);

	$numeroDaLetra = getNumeroLetra($char);
	if ($numeroDaLetra >= 100) {
			$numeroDaLetra -=100;
			return getLetraMaiusculaNumero(formulaEncryp($numeroDaLetra, $key));
		} else
			return getLetraMinusculaNumero(formulaEncryp($numeroDaLetra, $key));
}

function decrypt($char, $key){
	if (caracterEspeciais($char) != null)
		return caracterEspeciais($char);

	$numeroDaLetra = getNumeroLetra($char);
	if ($numeroDaLetra >= 100) {
		$numeroDaLetra -=100;
		return getLetraMaiusculaNumero(formulaDecryp($numeroDaLetra, $key));
	} else
	 	return getLetraMinusculaNumero(formulaDecryp($numeroDaLetra, $key));
}

function formulaEncryp($numeroDaLetra, $key){
	return ($numeroDaLetra + $key) % 26;
}

function formulaDecryp($numeroDaLetra, $key){
	return ($numeroDaLetra + (26 - $key)) % 26;
}

function getNumeroLetra($letra){
	for ($i=0; $i < 26; $i++)
		if (getLetraMinusculaNumero($i)== $letra)
			return $i;
		else if (getLetraMaiusculaNumero($i)== $letra)
			return $i+100;

	return 0;
}

function caracterEspeciais($char){
	$esp = array( " ", "!", "@", "#", "$", "%", "&" , ".", ",", ";", "'");
	for ($i=0; $i < count($esp); $i++)
		if ($esp[$i] == $char)
			return $esp[$i];
	return null;
}

function getLetraMinusculaNumero($num){
$letras = array("a", "b","c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
return $letras[$num];
}

function getLetraMaiusculaNumero($num){
$letras = array("A", "B","C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
return $letras[$num];
}
?>
