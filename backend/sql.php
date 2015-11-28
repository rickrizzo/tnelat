<?php
	
	//Connection Data
	require '../components/connector.php';
	
	class sql {
		public static function execute ($func, $vars) {

			//Glbal Scope
			GLOBAL $host;
			GLOBAL $user;
			GLOBAL $password;
			$database = 'tnelat';
			$db = new PDO("mysql:host=$host;", $user, $password);

			//Create Database & Tables
			$db->exec("CREATE DATABASE IF NOT EXISTS $database CHARSET utf8");

			//Prepare Queries
			$query = sql::$func();
			$statement = $db->prepare($query);

			//Bind Array Keys
			$keys = array_keys($vars);
			for ($x = 1; $x <= count($vars); $x++) {
				$statement->bindValue($x, $vars[$keys[$x-1]]);
			}
			$statement->execute();
		}

		//Database Functions
		private static function add_user()
			{ return "INSERT INTO Users (Username, Password, Email) VALUES (?, ?, ?)"; }

		private static function remove_user()
			{ return "DELETE FROM Users WHERE UserID = ?"; }

		private static function add_comment()
			{ return "INSERT INTO Comments (SenderUID, RecipientUID, Rating, Body) VALUES (?, ?, ?, ?)"; }

		private static function remove_comment()
			{ return "DELETE FROM Comments WHERE CommentID = ?"; }

		private static function get_comments_from()
			{ return "SELECT * FROM Users INNER JOIN Comments WHERE SenderUID = UID and SenderUID = ?"; }

		private static function get_comments_about()
			{ return "SELECT * FROM Users INNER JOIN Comments WHERE SenderUID = UID and RecipientUID = ?"; }

		private static function get_user_by_id() 
			{ return "SELECT * FROM Users WHERE UID = ?"; }

		private static function get_user_by_username() 
			{ return "SELECT * FROM Users WHERE Username = ?"; }
	}
	
	if (isset($_POST['request'])) {
		$request = $_POST['request'];
		$args = get_defined_vars()['_POST'];
		array_shift($args);
		echo(sql::execute($request, $args));
	}

	/*function sql($call, $args) {
		$server = 'localhost';
		$user = 'root';
		$database = 'tnelat';
		$connection = new mysqli($server, $user, null, $database);
		if ($connection->connect_error) 
			{ return $connection->error; }
		if (!$result = $connection->query(call_user_func_array($call, $args))) 
			{ return $connection->error; }
		else { 
			var_dump($result);
			while ($row = $result->fetch_array(MYSQL_ASSOC))
				{ $myArray[] = $row; }
			$connection->close(); 
			echo json_encode($result); 
		}
	}*/
?>