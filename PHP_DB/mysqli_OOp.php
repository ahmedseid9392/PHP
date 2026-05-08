<!-- <?php
// mysqli_OOp.php
//connect  php to  mysqldatabase using mysqli with oop
$severname="localhost";
$username="root";
$password="";
//$dbname="mydb";

//create connection
$conn=new mysqli($severname,$username,$password);

//check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}       
echo " mysqli database connected successfully  using object oriented programming";


$conn->close();
?> -->

<!-- <?php
//mysqli procedurally
$servername="localhost";    
$username="root";
$password="";

//create connection
$conn=mysqli_connect($servername,$username,$password);  
//check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());
}   
echo "mysqli database  connected successfully  using procedural programming";

mysqli_close($conn);
?> -->

<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo " PDO database Connected successfully use object oriented programming";

} catch(PDOException $e) {

    echo "Connection failed: " . $e->getMessage();

}
$conn = null;
?>