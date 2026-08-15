<?php
//1º o diretoruio base
//2º onde estão as viewa
//3º acesso à BD

define("BASE_DIR", dirname(__FILE__, 2)); 
define("VIEW_DIR", BASE_DIR . "/View");

$_ENV["DB_HOST"] = "localhost:3307";
$_ENV["DB_USER"] = "root";
$_ENV["DB_PASS"] = "Sergio.2026";
$_ENV["DB_NAME"] = "biblioteca";