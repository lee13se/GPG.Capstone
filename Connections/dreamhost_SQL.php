<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_dreamhost_SQL = "PutDatabaseURLHere";
$database_dreamhost_SQL = "PutDatabaseNameHere";
$username_dreamhost_SQL = "PutDatabaseUsernameHere";
$password_dreamhost_SQL = "PutDatabasePasswordHere";
$dreamhost_SQL = mysql_pconnect($hostname_dreamhost_SQL, $username_dreamhost_SQL, $password_dreamhost_SQL) or trigger_error(mysql_error(),E_USER_ERROR);
?>
