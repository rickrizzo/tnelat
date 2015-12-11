<?php
	// This page represents the framework for interacting with the database. Each subclass
	// of SQL operation represents a distinct operation within the database. Instantiating
	// a new one of these objects with the appropriate constructor variables prepares a 
	// corresponding query. The query can have an order added to it if required, and then 
	// the query is executed via the execute member function. The results of the query
	// are then returned from this function.

	abstract class SQL_Operation {

		protected function initialize ($vals) {
			require "connector.php";
			$this->pdo = new PDO("mysql:host=$host;dbname=tnelat;charset=utf8;", $user, $password);
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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

		public final function order_by($value) {
			if ($this->statement == '')
				exit("<h1 style='color:red;'>FATAL ERROR: Initialize first</h1>");

			$this->statement .= (' ORDER BY ' . $value);
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
				try {
					$rows = $query->fetchAll();
					return $rows;
				}
				catch (PDOException $e){
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
			$this->statement = "INSERT INTO Users (username, email, password, first_name, last_name, phone, salt, admin) VALUES (:username, :password, :email, :first_name, :last_name, :phone, :salt, 0)";
		}
	}

	class RemoveUser extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "DELETE FROM Users WHERE UID = :UID";
		}
	}

	class AddReview extends SQL_Operation {
		public function __construct($authorUID, $accountUID, $category, $body, $rating, $emoji) {
			$this->initialize(func_get_args());
			$this->statement = "INSERT INTO Reviews (authorUID, accountUID, category, emoji, body, rating) VALUES (:authorUID, :accountUID, :category, :emoji, :body, :rating)";
		}
	}

	class GetReview extends SQL_Operation {
		public function __construct($RID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Reviews WHERE RID = :RID";
		}
	}

	class RemoveReview extends SQL_Operation {
		public function __construct($RID) {
			$this->initialize(func_get_args());
			$this->statement = "DELETE FROM Reviews WHERE RID = :RID";
		}
	}

	class GetNextReviews extends SQL_Operation {
		public function __construct($max) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Reviews LIMIT :max";
		}
	}

	class GetReviewsBy extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Reviews WHERE authorUID = :UID";
		}
	}

	class GetReviewsAbout extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Reviews WHERE accountUID = :UID";
		}
	}

	class GetUser extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users WHERE UID = :UID";
		}
	}

	class GetAllUsers extends SQL_Operation {
		public function __construct() {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users";
		}
	}

	class GetUsersLikeFirstName extends SQL_Operation {
		public function __construct($first_name) {
			$this->initialize(func_get_args());
			$this->first_name = '%' . $this->first_name . '%';
			$this->statement = "SELECT * FROM Users WHERE first_name LIKE :first_name";
		}
	}

	class GetUsersLikeLastName extends SQL_Operation {
		public function __construct($last_name) {
			$this->initialize(func_get_args());
			$this->last_name = '%' . $this->last_name . '%';
			$this->statement = "SELECT * FROM Users WHERE last_name LIKE :last_name";
		}
	}

	class GetUserByUsername extends SQL_Operation {
		public function __construct($username) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users WHERE username = :username";
		}
	}

	class GetUsersLikeUsername extends SQL_Operation {
		public function __construct($username) {
			$this->initialize(func_get_args());
			$this->username = '%' . $this->username . '%';
			$this->statement = "SELECT * FROM Users WHERE username LIKE :username";
		}
	}

	class GetUserByEmail extends SQL_Operation {
		public function __construct($email) { 
			$this->initialize(func_get_args());
			$this->statement = "SELECT * FROM Users WHERE email = :email";
		}
	}

	class GetAverageRating extends SQL_Operation {
		public function __construct($UID) {
			$this->initialize(func_get_args());
			$this->statement = "SELECT AVG(rating) AS AverageRating FROM Reviews WHERE accountUID = :UID";
		}
	}
?>