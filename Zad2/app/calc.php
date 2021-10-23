<?php
require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

//pobranie parametrów
function getParams(&$x,&$y,&$z){
	$x = isset($_REQUEST['x']) ? $_REQUEST['x'] : null;
	$y = isset($_REQUEST['y']) ? $_REQUEST['y'] : null;
        $z = isset($_REQUEST['z']) ? $_REQUEST['z'] : null;
}


function validate(&$x,&$y,&$z,&$messages){
	
	if ( ! (isset($x) && isset($y) && isset($z))) {
		
		return false;
	}

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $x == "") {
		$messages [] = 'Nie podano kwoty pożyczki!';
	}
	if ( $y == "") {
		$messages [] = 'Nie podano oprocentowania!';
	}
        if ( $z == "") {
		$messages [] = 'Nie podano lat spłaty!';
	}

	
	if (count ( $messages ) != 0) return false;
	
	
	if (! is_numeric( $x )) {
		$messages [] = 'Kwota nie jest liczbą całkowitą';
	}
	
	if (! is_numeric( $y )) {
		$messages [] = 'Oprocentowanie nie jest liczbą całkowitą';
	}	
        
        if (! is_numeric( $z )) {
		$messages [] = 'Ilość lat nie jest liczbą całkowitą';
	}

	if (count ( $messages ) != 0) return false;
	else return true;
}

function process(&$x,&$y,&$z,&$messages,&$result){
	global $role;
	
	
	$x = intval($x);
	$y = intval($y);
	$z = intval($z);
        
        if ($role == 'admin'){
        $result = ($x + ($x*($y/100)))/($z*12); 
        } else {
	$messages [] = 'Tylko administrator może obliczać !';
	}
             
}


$x = null;
$y = null;
$z = null;
$result = null;
$messages = array();


getParams($x,$y,$z);
if ( validate($x,$y,$z,$messages) ) { 
	process($x,$y,$z,$messages,$result);
}


include 'calc_view.php';