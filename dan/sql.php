<?php

	class SQL {

		public function __construct () {	
			$this->pdo = new PDO("mysql:host=localhost;dbname=tnelat;charset=utf8;", "root");
			$this->statements = [];
		}

		public function execute() {
			$output = [];
			foreach ($this->statements as $statement) {
				array_push($output, $statement->execute());
			}
			return $output;
		}

		// =========== QUERIES ============

		public function add_user($username, $password, $email) {

			$statement = $this->pdo->prepare("INSERT INTO Users (Username, Password, Email) VALUES (:username, :password, :email)");
			$statement->bindValue(':username', $username, PDO::PARAM_STR);
			$statement->bindValue(':password', $password, PDO::PARAM_STR);
			$statement->bindValue(':email', $email, PDO::PARAM_STR);
			array_push($this->statements, $statement);
		}

		public function remove_user($UID) { 

			$statement = $this->pdo->prepare("DELETE FROM Users WHERE UID = :UID");
			$statement->bindValue(':UID', $UID, PDO::PARAM_INT); 
			array_push($this->statements, $statement);
		}

		public function add_comment($senderUID, $recipientUID, $rating, $body) { 

			$statement = $this->pdo->prepare("INSERT INTO Comments (SenderUID, RecipientUID, Rating, Body) VALUES (:senderUID, :recipientUID, :rating, :body)"); 
			$statement->bindValue(':senderUID', $senderUID, PDO::PARAM_INT);
			$statement->bindValue(':recipientUID', $recipientUID, PDO::PARAM_INT);
			$statement->bindValue(':rating', $rating, PDO::PARAM_INT);
			$statement->bindValue(':body', $body, PDO::PARAM_STR);
			array_push($this->statements, $statement);
		}

		public function remove_comment($commentID) { 

			$statement = $this->pdo->prepare("DELETE FROM Comments WHERE CommentID = :commentID"); 
			$statement->bindValue(':commentID', $commentID, PDO::PARAM_INT);
			array_push($this->statements, $statement);
		}

		public function get_comments_from($UID) { 

			$statement = $this->pdo->prepare("SELECT * FROM Users INNER JOIN Comments WHERE SenderUID = :UID"); 
			$statement->bindValue(':UID', $UID, PDO::PARAM_INT);
			array_push($this->statements, $statement);
		}

		public static function get_comments_about($UID) {

			$statement = $this->pdo->prepare("SELECT * FROM Users INNER JOIN Comments WHERE RecipientUID = :UID"); 
			$statement->bindValue(':UID', $UID, PDO::PARAM_INT);
			array_push($this->statements, $statement);
		}

		public static function get_user_by_id($UID) { 
			$statement = $this->pdo->prepare("SELECT * FROM Users WHERE UID = :UID"); 
			$statement->bindValue(':UID', $UID, PDO::PARAM_INT);
			array_push($this->statements, $statement);
		}

		public static function get_user_by_username($username) { 

			$statement = $this->pdo->prepare("SELECT * FROM Users WHERE Username = :username"); 
			$statement->bindValue(':username', $username, PDO::PARAM_STRING);
			array_push($this->statements, $statement);
		}
	}
	
	// Manages a POST request from the client.
	// Processes the item marked 'request' as the name of one the methods
	// of the SQL class. All other parameters are processed in order as 
	// the parameters of that function. That function is executed and its
	// output is echoed back to the client.

	function test($one, $two, $three) {
		var_dump(func_get_args());
	}

	if (isset($_POST['request'])) {

		$request = $_POST['request'];
		$args = get_defined_vars()['_POST'];
		unset($args['request']);
		$args = array_values($args);

		$query = new SQL();
		call_user_func_array([$query, $request], $args);
		echo($query->execute());
	}
?>