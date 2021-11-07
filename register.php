
<?php  
$fnam='';
$lnam=''; 
$gen='';
$eid='';
$pno=''; 
$add='';
$uname='';
$ps=''; 

$servername="localhost";
$username="root";
$password="";
$dbname="gopi";
$connection=mysqli_connect($servername,$username,$password,$dbname);
if($connection)
  {
    echo "connected";
  }
else
{
  echo "not connected";
}

$fnam=$_POST["firstname"];
$lnam=$_POST["lastname"];
$gen=$_POST["gender"];
$eid=$_POST["email"];
$pno=$_POST["phone"];
$add=$_POST["address"];
$uname=$_POST["username"];
$ps=$_POST["password"];

$sql="insert into pizza values('$fnam','$lnam','$gen','$eid','$pno','$add','$uname','$ps')";

if($connection->query($sql)===TRUE)
  {
    echo "<br>inserted";
  }

//  include("main.html");
mysqli_close($connection);
?>