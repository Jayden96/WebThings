<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
        <h2>Registration </h2>
        <form action="register.php" method="POST">
            Username:<input type="text" name="username" required="required" /><br/>
            Password:<input type="password" name="password" required="required" /><br/>
            <input type="submit" value="Register"/>
        </form>
    </body>
</html>
<?php

$servername="localhost";
$db_username="root";
$db_password="";
$dbname="library_db";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //(function removed in PHP 7.0) -> $username = mysqli_escape_string($_POST['username']);
    //(function removed in PHP 7.0) -> $password = mysqli_escape_string($_POST['password']);
    


    $bool=true;

    //(deprecated) -> mysql_connect("localhost", "root", "") or die(mysql_error()); // Connects to Localhost server by Wamp 
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    $username = $conn -> real_escape_string($_POST['username']); //get the username from the post method 
    $password = $conn -> real_escape_string($_POST['password']); //get password from post method

    if ($conn->connect_error){
        die("connection failed: " . $conn->connect_error);
    } //new connect to db method in PHP 7.0

    //(deprecated) -> $query = mysql_query("Select * from users"); //Query the users table
    $result = $conn->query("SELECT * FROM users"); //Query the users table (Corrected version)
    //(deprecated) -> while($row = mysql_fetch_array($query)) //display all results from query by row
    while($row=$result->fetch_assoc())
    {
        $table_users = $row['username']; //store first username unto $table_users, repeats until query is finished
        if($username == $table_users) // checks for duplicate username from users table to see if username taken
        {
            $bool = false;
            Print '<script>alert("Username has been taken!");</script>'; //Indicates to user
            Print '<script>window.location.assign("register.php");</script>'; //redirect to register.php
        }
    }
    
    if($bool) 
    {
        //(deprecated) -> mysql_query("INSERT INTO users (username, password) VALUES ('$username','$password')"); // SQL: inserts values into users table 
        $query="INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($conn,$query);
        print '<script>alert("Successfully Registered!");</script>';//Alerts user on successful registration
        print '<script>window.location.assign("login.php");</script>'; //redirect to login.php
    }
}
?>

