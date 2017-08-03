<?php
/*Contains DB Connections Info*/
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'id2357704_test_schema');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'id2357704_dbtest');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>