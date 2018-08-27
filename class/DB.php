<?php

//change the sql database variables below
define("DB_HOST", "localhost");
define("DB_USER", "");
define("DB_PASSWORD", "");
define("DB_DATABASE", "timenodey");

class DB
{
    // Connecting to database
    public function connect()
    {
        // connecting to mysql
        $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        if (mysqli_connect_errno()) {
            echo "<p>Failed to connect to MySQL: " . mysqli_connect_error() . "</p>";
        }

        // return database handler
        return $connection;
    }

}
 
