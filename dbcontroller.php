<?php
class DBController {
	private $host = "localhost";
	private $user = "id794005_bdpackage123";
	private $password = "bangladesh";
	private $database = "id794005_bdpackage123";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
		function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysqli_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysqli_query($query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($query) {
		$result = mysqli_query($query);
		if (!$result) {
			die('Invalid query: ' . mysqli_connect_errno());
		} else {
			return $result;
		}
	}
}
?>