<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'master');
define('DB_PASSWORD', 'password');
//define('DB_DATABASE', 'TeamDB');
define('DB_DATABASE_INFO', 'TeamInformation');
define('DB_DATABASE_LOGIN', 'TeamLogin');
define('LOGIN_TABLE_NAME', 'TeamLogin');
define('INFORMATION_TABLE_NAME', 'TeamInfo');
$Logindb = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE_LOGIN);
$Teamdb  = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE_INFO);

// check connection
/*if ($Logindb->connect_errno) {
    printf("Connect failed: %s\n", $Logindb->connect_error);

    echo "Failure on Login DB";
}

// check connection
if ($Teamdb->connect_errno) {
    printf("Connect failed: %s\n", $Teamdb->connect_error);
    echo "Failure on Team DB";
}*/
?>
