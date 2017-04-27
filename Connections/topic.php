<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_topic = "localhost";
$database_topic = "forum";
$username_topic = "admin";
$password_topic = "123456";
$topic = mysql_pconnect($hostname_topic, $username_topic, $password_topic) or trigger_error(mysql_error(),E_USER_ERROR); 
?>