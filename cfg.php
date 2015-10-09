<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'master');
define('DB_PASSWORD', 'password');
//define('DB_DATABASE', 'TeamDB');
define('DB_DATABASE_INFO', 'TeamInformation');
define('DB_DATABASE_LOGIN', 'TeamLogin');
define('LOGIN_TABLE_NAME', 'TeamLogin');
define('INFORMATION_TABLE_NAME', 'TeamInfo');
$Logindb = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE_LOGIN);
$Teamdb  = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE_INFO);

if($Logindb->connect_error)
{

}

if($Teamdb->connect_error)
{
}


?>
