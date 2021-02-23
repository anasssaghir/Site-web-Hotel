<?php

include ('../db_gl.php');
$eid = $_GET['eid'];
$approval ="Autoriser";
$napproval="Non Autoriser";

$view="select * from contact where id = '$eid' ";
$re = mysqli_query($con,$view);
while ($row=mysqli_fetch_array($re))
{
	$id =$row['approval'];
}

if($id=="Non Autoriser")
{
	$sql ="UPDATE `contact` SET `approval`= '$approval' WHERE id = '$eid' ";
	if(mysqli_query($con,$sql))
	{
		echo '<script>alert("Nouvelle chambre ajoutée") </script>' ;
		header("Location: messages.php");
	}
}
else {
$sql ="UPDATE `contact` SET `approval`= '$napproval' WHERE id = '$eid' ";
	if(mysqli_query($con,$sql))
	{
		echo '<script>alert("Nouvelle chambre ajoutée") </script>' ;
		header("Location: messages.php");
	}

}
?>