</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
<link rel="stylesheet" href="formstyle.css">
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <form action=" " method="post">
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter your username" required>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <button type="submit">Login</button>
    </form>
    <div class="note">
        Don't have an account? <a href="mainpage.php">Register here</a>
    </div>
</div>
</body>
</html>


<!-- <?php
    include("./db_operation.php");
    $connString = connectToDatabase();
    $tableName = 'userdetails';
    if (isset($_POST['username'], $_POST['password'])) {
        getData($tableName, $_POST['username'], $_POST['password'], $connString);
    }
?> -->










<!-- 
// if($_REQUEST){
//     print_r($_REQUEST);
//     echo "</br>";
//    // echo $_POST['username'];
// } -->
<!-- excel has physical memory,cant form relational
 database itself is a server---multiple table linked to each other-relational 
 connecting to database--- connect to database
 connection string-connected returned
 send query,execute,fetch to read using connection string=conn-->
