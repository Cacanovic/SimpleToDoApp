<?php

$db=new Mysqli;

$db->connect('localhost','root','', '1todo');

if(!$db){
	echo "greska sa povezivanjem na bazu";
}

?>