<?php
	abstract class SQL_Operation {

		protected function initialize ($vals) {	
			$this->pdo = new PDO("mysql:host=localhost;dbname=tnelat;charset=utf8;", "root");
			$this->statement = '';

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

			// Find the properties of this object
			$properties = get_object_vars($this);

			// Prepare the statement.
			$query = $this->pdo->prepare($this->statement); 

			// Use a regex to find each substring in the form ":var_name" in the statement.
			// These represent our unbound variables.
			$unbound_vars = preg_match_all("/:\w*/", $this->statement, $matches);

			// For each unbound variable...
			foreach ($matches[0] as $match) {

				// Bind the variable to the value of the property of this object with the same name (sans the leading colon)
				// This is for sanitation.

				if (gettype($this->{substr($match, 1)}) == 'integer')
					$query->bindValue($match, $this->{substr($match, 1)}, PDO::PARAM_INT );
				else
					$query->bindValue($match, $this->{substr($match, 1)} );
			}

			// Execute and return the output of the query
			if ($query->execute()) {
				if ($rows = $query->fetchAll()) {
					return $rows[0];
				}
				else {
					return [];
				}
			}
			else {
				exit("<h1 style='color:red;'>FATAL ERROR: query failure </h1>");
			}				
		}
	}

	class InsertUser extends SQL_Operation {
		public function __construct($username, $password, $email, $first_name, $last_name, $phone, $salt) {
			$this->initialize(func_get_args());
			$this->statement = "INSERT INTO Users (username, email, password, first_name, last_name, phone, salt) VALUES (:username, :password, :email, :first_name, :last_name, :phone, :salt)";
		}
	}

	class RemoveUser extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "DELETE FROM Users WHERE UID = :UID";
		}
	}

	class AddReview extends SQL_Operation {
		public function __construct($authorUID, $accountUID, $emoji, $body) {
			$this->initialize(func_get_args());
			$this->statement = "INSERT INTO Reviews (authorUID, accountUID, emoji, body) VALUES (:authorUID, :accountUID, :emoji, :body)";
		}
	}

	class RemoveReview extends SQL_Operation {
		public function __construct($CID) {
			$this->initialize(func_get_args());
			$this->statement = "DELETE FROM Reviews WHERE CID = :CID";
		}
	}

	class GetNextReviews extends SQL_Operation {
		public function __construct($max) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT TOP :max * FROM Reviews";
		}
	}

	class GetReviewsBy extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users INNER JOIN Reviews WHERE authorUID = :UID";
		}
	}

	class GetReviewsAbout extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users INNER JOIN Reviews WHERE accountUID = :UID";
		}
	}

	class GetUser extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users WHERE UID = :UID";
		}
	}

	class GetUserByUsername extends SQL_Operation {
		public function __construct($username) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users WHERE username = :username";
		}
	}

	class GetUserByEmail extends SQL_Operation {
		public function __construct($email) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users WHERE email = :email";
		}
	}
?>