<?php

include('db.php');
include("function.php");

if(isset($_POST["id_job"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM jobs WHERE id_job = :id_job"
	);
	$result = $statement->execute(
		array(
			':id_job'	=>	$_POST["id_job"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>