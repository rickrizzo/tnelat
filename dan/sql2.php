<?php

	abstract class SQL_Operation {

		protected function initialize ($vals) {	
			$this->pdo = new PDO("mysql:host=localhost;dbname=tnelat;charset=utf8;", "root");
			$this->statements = [];

			// For each property in the constructor...
			$ctor = new ReflectionMethod($this, '__construct');
			$params = $ctor->getParameters();

			// Instantiate a matching variable with it's value.
			// This just automates:
			// __construct($apple) { $this->apple = $apple; }

			for($x = 0; $x < count($params); $x++) {
				$this->{$params[$x]->name} = $vals[$x];
			}
		}

		public final function execute() {
			$queries = [];

			// Find the properties of this object
			$properties = get_object_vars($this);

			// Prepare each statement to form queries:
			// For each statement...
			foreach ($this->statements as $statement) {

				// Prepare the statement.
				$query = $this->pdo->prepare($statement); 

				// Use a regex to find each substring in the form ":var_name" in the statement.
				// These represent our unbound variables.
				$unbound_vars = preg_match_all("/:\w*/", $statement, $matches);

				// For each unbound variable...
				foreach ($matches[0] as $match) {

					// Bind the variable to the value of the property of this object with the same name (sans the leading colon)
					// This is for sanitation.
					$query->bindValue($match, $this->{substr($match, 1)});
				}

				// Append the prepared query to the list	
				$queries[] = $query;
			}

			// Execute and log the output of each query
			$output = [];
			foreach ($queries as $query) {				
				$output[] = $query->execute();
			}

			// Handle output in a method that may be overwritten by subclasses.
			return $this->evaluate($output);
		}

		protected function evaluate($data) { var_dump($data); }
	}

	class InsertUser extends SQL_Operation {
		public function __construct($username, $password, $email) {
			initialize(func_get_args());
			$this->statements[] = "INSERT INTO Users (Username, Password, Email) VALUES (:username, :password, :email)";
		}
	}

	class RemoveUser extends SQL_Operation {
		public function __construct($UID) {
			initialize(func_get_args());
			$this->statements[] = "DELETE FROM Users WHERE UID = :UID";
		}
	}

	class AddComment extends SQL_Operation {
		public function __construct($authorUID, $accountUID, $rating, $body) {
			initialize(func_get_args());
			$this->statements[] = "INSERT INTO Comments (AuthorUID, AccountUID, Rating, Body) VALUES (:authorUID, :accountUID, :rating, :body)";
		}
	}

	class RemoveComment extends SQL_Operation {
		public function __construct($CID) {
			initialize(func_get_args());
			$this->statements[] = "DELETE FROM Comments WHERE CID = :CID";
		}
	}

	class GetCommentsBy extends SQL_Operation {
		public function __construct($UID) {
			initialize(func_get_args());
			$this->statements[] = "SELECT * FROM Users INNER JOIN Comments WHERE AuthorUID = :UID";
		}
	}

	class GetCommentsAbout extends SQL_Operation {
		public function __construct($UID) {
			initialize(func_get_args());
			$this->statements[] = "SELECT * FROM Users INNER JOIN Comments WHERE AccountUID = :UID";
		}
	}

	class GetUser extends SQL_Operation {
		public function __construct($UID) {
			initialize(func_get_args());
			$this->statements[] = "SELECT * FROM Users WHERE UID = :UID";
		}
	}

	class GetUserByUsername extends SQL_Operation {
		public function __construct($username) {
			initialize(func_get_args());
			$this->statements[] = "SELECT * FROM Users WHERE UID = :username";
		}
	}

?>

<?	
	// Manages a POST request from the client.
	// Processes the item marked 'request' as the name of one the methods
	// of the SQL class. All other parameters are processed in order as 
	// the parameters of that function. That function is executed and its
	// output is echoed back to the client.

	function test($one, $two, $three) {
		$derp = new InsertUser('dsad','dsada','a');
		var_dump($derp->execute());
	}

	if (isset($_POST['request'])) {
		test(1,2,3);
		return;

		$request = $_POST['request'];
		$args = get_defined_vars()['_POST'];
		unset($args['request']);
		$args = array_values($args);

		$query = new SQL();
		call_user_func_array([$query, $request], $args);
		echo($query->execute());
	}
?>