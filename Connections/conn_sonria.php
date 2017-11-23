<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*$hostname_conn_sonria = "mysql.server271.com";
$database_conn_sonria = "arocha_sonria";
$username_conn_sonria = "3difica";
$password_conn_sonria = "produccion";*/

$hostname_conn_sonria = "127.0.0.1:3306";
$database_conn_sonria = "db_sonria";
$username_conn_sonria = "root";
$password_conn_sonria = "";
$conn_sonria = new mysqli($hostname_conn_sonria, $username_conn_sonria, $password_conn_sonria) or trigger_error(mysql_error(),E_USER_ERROR);
