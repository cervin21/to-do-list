<?php

$MYSQLi = new mysqli("localhost", "", "", "");

if(!$MYSQLi){
	die("Error: Cannot connect to the database");
}
?>