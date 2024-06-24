<?php
$host = 'luther.aserv.co.za';
$username = 'mrranisu_ranger_db';
$password = "'Ranger123'";
$database = 'mrranisu_ranger_db';

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//project imports
session_start();

require 'definedFunctions.php';

$errors = array();







// This PHP code snippet establishes a connection to a MySQL database using the MySQLi (MySQL Improved) extension. 
// It sets up the necessary credentials and checks the connection status. Here's a breakdown of each part of the code:

// 1. `$host`, `$username`, `$password`, `$database`: These variables store the values needed to connect to the MySQL database.
//    - `$host`: The host name or IP address of the database server (usually 'localhost' when the database server is on the same machine).
//    - `$username`: The username for accessing the database.
//    - `$password`: The password associated with the username.
//    - `$database`: The name of the database to be accessed.

// 2. `mysqli_connect()`: This function is used to establish a connection to the MySQL database server.
//    - It takes the host, username, password, and database as arguments.
//    - The returned value is a database connection object.

// 3. `if (!$conn) { ... }`: This conditional statement checks if the connection to the database was successful or not.
//    - If the connection failed, the code block within the curly braces will be executed.
//    - `die("Connection failed: " . mysqli_connect_error());`: The `die()` function will immediately terminate the script and display an error message along with the specific reason for the connection failure (`mysqli_connect_error()`).

// In summary, this code snippet establishes a connection to a MySQL database using the MySQLi extension. 
// It checks whether the connection was successful and provides an error message if not. The established connection can then be used to interact with the database by executing queries and performing various database operations.