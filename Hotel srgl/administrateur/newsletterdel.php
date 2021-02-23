<?php

include ('../db_gl.php');

$id=$_GET['eid'];
if($id=="")
{
echo '<script>alert("Désolé ! Mauvaise Entrée") </script>' ;
		header("Location: messages.php");
}
else{
$view="DELETE FROM `contact` WHERE id ='$id' ";

	if($re = mysqli_query($con,$view))
	{
		echo '<script>alert("Abonné à la newsletter Supprimé") </script>' ;
		header("Location: messages.php");
	}
}
?>