<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE jobss 
			SET nomor = :nomor, tanggal = :tanggal, store = :store, alamat = :alamat, kategori = :kategori, keterangan = :keterangan  
			WHERE id_job = :id_job
			"
		);
		$result = $statement->execute(
			array(
				':nomor'	=>	$_POST["nomor"],
				':tanggal'	=>	$_POST["tanggal"],
				':store'	=>	$_POST["store"],
				':alamat'	=>	$_POST["alamat"],
				':kategori'	=>	$_POST["kategori"],
				':keterangan'	=>	$_POST["keterangan"],
				':id'			=>	$_POST["id_job"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>