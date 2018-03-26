<?php
include('db.php');
include('function.php');
if(isset($_POST["id_job"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM jobs 
		WHERE id_job = '".$_POST["id_job"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nomor"] = $row["nomor"];
		$output["tanggal"] = $row["tanggal"];
		$output["store"] = $row["store"];
		$output["alamat"] = $row["alamat"];
		$output["kategori"] = $row["kategori"];
		$output["keterangan"] = $row["keterangan"];
		
	}
	echo json_encode($output);
}
?>