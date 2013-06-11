<?php
    
    define('DB_SERVER', 'localhost8888');
    define('DB_USERNAME', 'neo');
    define('DB_PASSWORD','jQueryMaster7');
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
    }

?>
