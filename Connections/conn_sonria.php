<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
/*$hostname_conn_sonria = "mysql.server271.com";
$database_conn_sonria = "arocha_sonria";
$username_conn_sonria = "3difica";
$password_conn_sonria = "produccion";*/

$hostname_conn_sonria = "sonriamx.powwebmysql.com";
$database_conn_sonria = "db_sonria";
$username_conn_sonria = "user_sonria";
$password_conn_sonria = "db_sonria123";
$conn_sonria = mysql_pconnect($hostname_conn_sonria, $username_conn_sonria, $password_conn_sonria) or trigger_error(mysql_error(),E_USER_ERROR); 

