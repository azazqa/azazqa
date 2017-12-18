<?php
	class Database{
	    private $host      = 'localhost';
	    private $user      = 'azazqa';
	    private $pass      = 'kms1125533*';
	    private $dbname    = 'azazqa';

	  
	 
	    private $dbh;
	    private $error;

	    public function connect(){
	    	// Set DSN
	        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
	        // Set options
	        $options = array(
	            PDO::ATTR_PERSISTENT    => true,
	            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
	        );
	        // Create a new PDO instanace
	        try{
	            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
	        }
	        // Catch any errors
	        catch(PDOException $e){
	            $this->error = $e->getMessage();
	        }
	        return $this->dbh;
	    }
	}
?>