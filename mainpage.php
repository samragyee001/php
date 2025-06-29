<?php
include './db_operation.php';
include './registrationFrom.php';
$tableName ="userdetails";
$connString = connectToDatabase();
createTable($tableName, $connString);
if(isset($_POST['username'])){ //isset to make sure no empty value taken
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    insertUser($tableName,$username, $email, $password,$connString);
}
// $connString.close();
// if (isset($_POST['username'], $_POST['password'])) {
//     getData($tableName, $_POST['username'], $_POST['password'], $connString);
// }

?>
