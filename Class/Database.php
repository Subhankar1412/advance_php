<?php

/*this is the class named Database the first charecter of class name shoulld 
    be always in uppercase.
*/
class Database
{
    private $userName = "root";
    private $host = "localhost";
    private $databaseName = "advanced_database";
    private $password = "";
    private $conn;

    /* This is the constructor method of the class. It is called automatically 
        when an object of the class is created.
    */
    public function __construct()
    {
        /*
            This block of code is wrapped in a try-catch block to handle exceptions.
            catch block of code catches any exceptions thrown during the execution of the code in the try block.
        */
        try {
            /*
                This line creates a new PDO object representing a connection to the MySQL database. It uses the values of $this->host, $this->database, $this->username, and $this->password to establish the connection.
            */
            $this->conn = new PDO("mysql::host={$this->host}; dbname={$this->databaseName}", $this->userName, $this->password);
            /*
            This line sets the error handling mode of the PDO connection to ERRMODE_EXCEPTION, which means PDO will throw exceptions when errors occur. 
            */
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            /*
            This line outputs an error message if the connection to the database fails. It retrieves the error message from the caught PDOException object ($e) using the getMessage() method.
            */
            echo "Connection failed: " . $e->getMessage();
        }
    }

    /*
     This is a public method of the class that returns the PDO connection object ($this->conn).
     */
    public function getConnection()
    {
        return $this->conn;
    }
}
