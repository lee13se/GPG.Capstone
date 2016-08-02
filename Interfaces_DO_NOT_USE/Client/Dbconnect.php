<?php

$dbuser = "systemsdesigndb";
$dbpass = "op6xR1FY4KaF";
$dbhost = "mysql01.webritetech.com";
$dbname = "gpg01";


$dbconnection = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

@mysql_select_db($dbname) or die('Error finding database!');


?> 