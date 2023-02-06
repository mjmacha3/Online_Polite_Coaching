<?php 


/**
 * database config
 */

$a= $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$a = str_replace('index.php','',$a);

//print_r ($_SERVER);
define('APP_NAME','Polite Coaching');
define('APP_DESC','Web Version');
define('MAIL_HOST','smtp.outlook.com');
define('MAIL_USERNAME','');
define('MAIL_PASSWORD','');
//var_dump($_SERVER['REQUEST_SCHEME'] );
if ($_SERVER['SERVER_NAME']=='localhost')
{
    //database config for local server
        define('DBHOST','');
        define('DBNAME','');
        define('DBUSER','');
        define('DBPASS','');
        define('DBDRIVER','');
        define('ROOT',$a);
}else
{
    //database config for live server
    define('DBHOST','');
    define('DBNAME','WORKFORCE');
    define('DBUSER','');
    define('DBPASS','');
    define('DBDRIVER','');
    define('ROOT',$a);
}

define('DEBUG',true);
if (DEBUG)
{
ini_set('display_errors',1);
}else
{
    ini_set('display_errors',0);
}
