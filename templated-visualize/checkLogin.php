<?php
session_start();


$servername="localhost";
$db_username="root";
$db_password="";
$dbname="library_db";
$bool=true;

$conn = new mysqli($servername, $db_username, $db_password, $dbname);
$username=$conn ->real_escape_string($_POST['username']); //get the username from the post method 
$password=$conn ->real_escape_string($_POST['password']); //get password from post method

if ($conn->connect_error){
    die("connection failed: " . $conn->connect_error);
} //new connect to db method in PHP 7.0

$table_password="";
$table_username="";
$found=
$results=$conn->query("SELECT * FROM users"); //Query the users table and store into results
while($row=$results->fetch_assoc())
    {
        
        $table_username=$row['username']; //keep passing username into $table_username until query is finished
        $table_password=$row['password'];  //keep passing password into $table_password until query is finished

        if($username==$table_username) //username and password checking
        {
               
            if($password==$table_password)
            {
                $_SESSION['user'] = $username; //   set the current session user as $username
                header("location:home.php"); //redirects to authenticated page
             }
        }else
            {
                print '<script>alert("Incorrect Username or Password!");</script>';
                print '<script>window.location.assign(login.php");</script>';
        }
    }
    

?>
