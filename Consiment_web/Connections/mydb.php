<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_mydb = "localhost";
$database_mydb = "perfectbanking";
$username_mydb = "root";
$password_mydb = "1234";
$mydb = mysql_pconnect($hostname_mydb, $username_mydb, $password_mydb) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("Set Names UTF8");
?>