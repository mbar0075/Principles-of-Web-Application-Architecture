<?php
class Db {
    // The database connection
    protected static $connection;

     //Try connect, returning false on failure
    public function connect() {

        //Try connecting to the database
        if(!isset(self::$connection)) {
            // Load config file into array
            $config = parse_ini_file('./Config.ini');
            self::$connection = new mysqli($config['server'], $config['dbUsername'], $config['dbPassword'], $config['dbName']);
        }

        //If connection was not successful, return false
        //If successful, return connection
        if(self::$connection === false) {
            return false;
        }
        return self::$connection;
    }

    // Query the database
    public function query($query) {
        //Connecting to the database
        $connection = $this -> connect();

        //Querying the database
        $result = $connection -> query($query);

        return $result;
    }

    //Fetch records from table
    public function select($query) {
        $rows = array();
        $result = $this -> query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result -> fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    //Fetch the last error
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    //Quote and escape value for use in a database query
    public function quote($value) {
        $connection = $this -> connect();
        return "'" . $connection -> real_escape_string($value) . "'";
    }
}

?>
