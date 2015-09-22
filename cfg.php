<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'master');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', 'TeamDB');
define('DB_DATABASE_1', 'TeamInformation')
define('LOGIN_TABLE_NAME', 'TeamLogin')
define('INFORMATION_TABLE_NAME', 'TeamInfo');
$Logindb = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$Teamdb = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE_1);

/* check connection */
if ($Logindb->connect_errno) {
    printf("Connect failed: %s\n", $Logindb->connect_error);
    exit();
}

/* check connection */
if ($Teamdb->connect_errno) {
    printf("Connect failed: %s\n", $Teamdb->connect_error);
    exit();
}
?>