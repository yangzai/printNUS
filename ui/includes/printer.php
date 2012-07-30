<?php
class Printer{
	/*
		The find static method selects categories
		from the database and returns them as
		an array of Printer objects.
	*/
	/*
	public static function find($tableName){
		global $db;
		$query = "SELECT * FROM ".$tableName;
		$st = $db->prepare($query);

		// This will execute the query
		$st->execute();

		// Testing if this page works up till here
		echo "No problem with executing query in printer.php!<br>";
		
		// Returns an array of Printer objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Printer");
	}
	*/
	public static function sqlQuery($query){
		global $db;
		$st = $db->prepare($query);

		// This will execute the query
		$st->execute();

		// Testing if this page works up till here
		//echo "No problem with executing sqlQuery in printer.php!<br>";
		
		// Returns an array of Printer objects:
		return $st->fetchAll(PDO::FETCH_CLASS, "Printer");
	}
	
	public static function rowCount($query){
		global $db;
		$st = $db->prepare($query);

		// This will execute the query
		$st->execute();

		// Testing if this page works up till here
		//echo "No problem with executing rowCount in printer.php!<br>";
		
		// Returns an array of Printer objects:
		return $st->fetchColumn();
	}
}
?>