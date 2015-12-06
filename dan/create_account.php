<?php
  	include 'SQL_Operation.php';
    include 'formatting.php';

  	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        $vars = process_request($_POST);

        if ( validateNewUser($vars['username'], $vars['password'], $vars['password_confirm'], 
                              $vars['email'], $vars['first_name'], $vars['last_name'], $vars['phone']) ) {

            // Generate a random salt
            $salt = hash('sha256', uniqid(mt_rand(), true));      

            // Apply salt before hashing
            $salted_password = hash('sha256', $salt . $vars['password']);
            
            // Store the salt with the password, so we can apply it again and check the result
            $user = (new InsertUser($vars['username'], $vars['email'], $salted_password, $vars['first_name'],
                                   $vars['last_name'], intval($vars['phone']), $salt))->execute();
            
            echo 'User created successfully.';    
        }    		
  	}

    function validateNewUser($username, $password, $password_confirm, $email,
                              $first_name, $last_name, $phone) {

        $err = '';

        // Check that all fields are filled in
        if (empty($username) || empty($password) || empty($password_confirm)
            || empty($email) || empty($first_name) || empty($last_name)) {

            $err = 'Please fill in all required fields.';
        }

        // Check for valid username
        else if ( strlen($username) < 3 || !ctype_alnum($username) ) {
            $err = 'A valid username is at least three characters. Only alphanumeric characteres are allowed.';
        }

        // Check for duplicate username
        else if ( count( (new GetUserByUsername($username))->execute()) > 0 ) {
            $err = 'That username already exists.';
        } 

        // Check for matching password fields
        else if ($password != $password_confirm) {
            $err = 'The entered passwords did not match.';
        }

        // Check for valid password
        else if ( strlen($password) < 5 ) {
            $err = 'A valid password is at least 5 characters long.';
        }

        // Check for valid email
        else if ( !strpos($email, '@') ) {
            $err = 'Please enter a valid email address.';
        }

        // Check for duplicate email
        else if ( count( (new GetUserByEmail($email))->execute()) > 0 ) {
            $err = 'An account is already associated with that email address.';
        } 

        // Check for valid phone, if phone was entered
        else if ( strlen($phone) != 0 && strlen($phone) != 10) {
            $err = 'Please enter a valid 10 digit phone number.';
        }

        // Else valid
        else {
            return true;
        }

        echo '<span class="error">' . $err . '</span>';
        return false;
    }

?>