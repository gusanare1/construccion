<?php
class conexion
{
	 //Mejora: Extraer el string de conexion de un archivo aparte
	private $servername = "localhost";
	private $username = "usuario";
	private $password = "password";
	private $dbName = "construccion";
	private $conn = null;
	function openConnection()
	{
		try {
			$conn = new PDO("mysql:host=$this->servername;dbname=$this->dbName", $this->username, $this->password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected successfully";
			return $conn;
		} catch(PDOException $e) {
			//echo "Connection failed: " . $e->getMessage();
			return null;
		}
	}

	function closeConnection()
	{
		$conn = null;
	}

 }


?>