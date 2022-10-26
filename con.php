<?php
    $db_dbname = "social";
    $db_user = "root";
    $db_pass = "";

    try {
        $dbh = new PDO("mysql:host=localhost;port=;dbname=$db_dbname", $db_user, $db_pass,array(
            PDO::ATTR_DEFAULT_FETCH_MODE =>PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //after php5.3.6
        ));
        //$p->exec('SET NAMES utf8');
    } catch (PDOException $e) {
        print "Error!: " . $e->getMessage() . "<br/>";
        die();
    }
?>