# tnelat
######(it's talent spelled backwards)
A web based application to rate/review peers  
Created for Web Systems
##Installation
To install tnelat start by cloning or forking this repo onto your local apache server. You'll need Apache 2.2 or higher, MySQL installed on your machine, and PHP 5. Once cloned, you will need to make a `connector.php` file. Save this file in the components directory. The contents should look something like this:  
`<?php  
  $host = '<your-server-name>';   
  $user ='<your-mysql-username>';     
  $password = '<your-mysql-password>';   
?>`

You're ready to go!  Go to the index.php file and see the site.
