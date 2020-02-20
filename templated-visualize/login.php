<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <h2>Login Page</h2>
        <form id ="loginForm" action="checkLogin.php" method="POST">
            Username:<input type="text" name="username" required="required" /><br/>
            Password:<input type="password" name="password" required="required" /><br/>
            <input type="submit" value="Login"/>
        </form>
    </body>
</html>