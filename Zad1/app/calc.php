<?php

require_once dirname(__FILE__).'/../config.php';

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];


if ( ! (isset($x) && isset($y) && isset($z) )) {
	
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}


if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano oprocentowania';
}
if ( $z == "") {
	$messages [] = 'Nie podano czasu spłaty';
}


if (empty( $messages )) {
	
	
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą całkowitą';
	}
        
        if (! is_numeric( $z )) {
		$messages [] = 'Trzecia wartość nie jest liczbą całkowitą';
	}

}

if (empty ( $messages )) { 
	
	$x = intval($x);
	$y = intval($y);
        $z = intval($z);
	
        $result = ($x + ($x*($y/100)))/($z*12); 
	
      
}

include 'calc_view.php';