<?php
    /* define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD','');
    define('DB_DATABASE','islamic_scholars');
    
    class DB_Class{
        function __construct() {
            $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD)
            or
                die('Database Connection Failed ->' . mysql_error());
                mysql_select_db(DB_DATABASE, $connection) 
            or
                die('Database Selection Failed ->' . mysql_error());
        }
    } */
?>
<?php
	$db_conn = mysql_connect("localhost","root","root","");
	if(!$db_conn) {
		die("Failed to Connect to the Database");
	}
	$db_select = mysql_select_db("islamicscholars", $db_conn);
	if(!$db_select){
		die("Failed to Select the Database");
	}
?>
