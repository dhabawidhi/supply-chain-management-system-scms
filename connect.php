<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'db_scms');

$db_host = 'localhost'; // don't forget to change
$db_user = 'root';
$db_pwd = '';
$database = 'db_scms';

$dbc = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD) OR die ('Could not connect to MySQL: ' . mysql_error() );
mysql_select_db (DB_NAME) OR die ('Could not select the database: ' . mysql_error() );

/*$GLOBALS[MyDB] = mysql_connect("localhost", "root", "");

mysql_select_db("db_scms", $GLOBALS[MyDB]);
$handler = $GLOBALS[MyDB];
*/
$title="SCMS";

?>