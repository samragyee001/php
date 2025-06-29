<?php
function connectToDatabase(){
    $host= "localhost";
    $username = "root";//default
    $password = NULL;//value 
    $dbname ="......";
    try{
        $conn = new PDO("mysql:host=$host;dbname=$dbname",$username, $password);
        $conn->setAttribute( PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }catch(PDOException $e)
    {
      echo "Connection failed". $e->getMessage();
    }
}

function createTable($tableName, $conn){
     $query ="CREATE TABLE IF NOT EXISTS $tableName( 
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(50) NOT NULL,
      email VARCHAR(50) NOT NULL,
      password VARCHAR(250) NOT NULL);";
      try{
       $createaTable = $conn->prepare($query);
       if ($createaTable->execute()) {
            return true;
        } else {
            return false;
        }
      }catch(PDOException $e){
        echo"table not created". $e->getMessage();
        return false;
      }
}
function insertUser($tableName,$username, $email, $password,$conn) {
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO $tableName (username, email, password) 
    VALUES ('$username', '$email' , '$hashedpassword')";
    try {
        $insertTable= $conn->prepare($query);
       
        if( $insertTable->execute()){
             // Redirect to login page after successful insertion
            header("Location: ./login.php");
        }
        // echo "</br>"."Data inserted successfully";
    } catch (PDOException $e) {
        echo "</br>"."failed to insert data".$e->getMessage(); 
    }
}
function getData($tableName, $username,$password,$conn){
    $query = "SELECT * FROM $tableName WHERE username = :username";
    try {
        $get = $conn->prepare($query);
        $get->bindParam(':username', $username, PDO::PARAM_STR);
        $get->execute();
        $user = $get->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password,$user['password'])) {
            header("Location: ../modal/dashboarddirect.php");
            echo "Login successful!"; 
            exit();
        } else {
            echo "Invalid username or password";
        }
    } catch (PDOException $e) {
        echo "Login failed" . $e->getMessage();
    }
}
 
function table($tableName, $conn) {
    $query = "SELECT id, fullname, symbol, semester FROM $tableName";
    try {
        $tbl = $conn->prepare($query);
        $tbl->execute();
        return $tbl->fetchAll(PDO::FETCH_ASSOC);  
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];  //Return empty array
    }
}
function getStudentById($conn, $tableName, $id) {
    $query = "SELECT id, fullname, symbol, semester FROM $tableName WHERE id = $id";
    try {
        $stmt = $conn->prepare($query);
        // $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo "Error" . $e->getMessage();
        return null;
    }
}

?>

