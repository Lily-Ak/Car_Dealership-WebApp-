
<!--require 'db_config.php';-->

<!--if ($_SERVER['REQUEST_METHOD'] === 'POST') {-->
<!--    $email = $_POST['email'];-->
<!--    $password = $_POST['password'];-->

<!--    $sql = "SELECT * FROM users WHERE email = ?";-->
<!--    $stmt = $conn->prepare($sql);-->
<!--    $stmt->bind_param("s", $email);-->
<!--    $stmt->execute();-->
<!--    $result = $stmt->get_result();-->
<!--    $user = $result->fetch_assoc();-->

<!--    if ($user && password_verify($password, $user['password'])) {-->
<!--        header("Location: ../index.php?success=true");-->
<!--    } else {-->
<!--        echo "Invalid email or password.";-->
<!--    }-->

<!--    $stmt->close();-->
<!--}-->


<!-- This PHP code is a basic example of a script that handles user authentication by checking a submitted email and password against a database of user records. Here's a breakdown of what each part of the code does:

1. `require 'db_config.php';`: This line includes the file 'db_config.php', which presumably contains the configuration details for connecting to the database. This step is necessary to establish a connection to the database.

2. `if ($_SERVER['REQUEST_METHOD'] === 'POST') {`: This conditional statement checks if the HTTP request method is POST. This indicates that form data has been submitted to the server.

3. Retrieving Form Data:
   - `$email = $_POST['email'];`: This line retrieves the email value submitted through the POST request.
   - `$password = $_POST['password'];`: This line retrieves the password value submitted through the POST request.

4. Database Query:
   - `$sql = "SELECT * FROM users WHERE email = ?";`: This SQL query retrieves all columns from the 'users' table where the email matches the submitted email.
   - `$stmt = $conn->prepare($sql);`: This prepares the SQL query for execution.
   - `$stmt->bind_param("s", $email);`: This binds the value of the email to the prepared statement.
   - `$stmt->execute();`: This executes the prepared statement.
   - `$result = $stmt->get_result();`: This retrieves the result of the executed statement.
   - `$user = $result->fetch_assoc();`: This fetches the associative array representing the first row of the result set (if any). This array contains user information.

5. Authentication Check:
   - `if ($user && password_verify($password, $user['password'])) {`: This condition checks if the user exists (i.e., the result from the database is not empty) and if the submitted password matches the hashed password stored in the user's record.
   - `echo "Login successful!";`: If the condition is true, this message is displayed, indicating a successful login.
   - `else { echo "Invalid email or password."; }`: If the condition is false, this message is displayed, indicating invalid login credentials.

6. `stmt->close();`: This line closes the prepared statement, freeing up resources.

Overall, this PHP script demonstrates a simple authentication process by querying a database for a user's record, comparing the submitted password with the stored hashed password, 
and providing appropriate feedback to the user based on the outcome of the authentication check. -->