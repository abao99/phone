<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_product = "localhost";
$database_product = "product";
$username_product = "admin";
$password_product = "123456";
$product = mysql_pconnect($hostname_product, $username_product, $password_product) or trigger_error(mysql_error(),E_USER_ERROR); 
?>