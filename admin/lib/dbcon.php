<?php
//core
function dbcon(){
	$user = "root";
	$pass = "";
	$host = "localhost";
	$db = "thesis";
	return mysqli_connect($host,$user,$pass,$db);
	// mysqli_select_db($db);
}

function host(){
	$h = "http://".$_SERVER['HTTP_HOST']."/thesis/";
	return $h;
}

function hRoot(){
	$url = $_SERVER['DOCUMENT_ROOT']."/thesis/";
	return $url;
}

//parse string
function gstr(){
    $qstr = $_SERVER['QUERY_STRING'];
    parse_str($qstr,$dstr);
    return $dstr;
}

?>
