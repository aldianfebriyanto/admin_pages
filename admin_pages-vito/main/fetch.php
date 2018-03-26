<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM jobs ";


if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nomor LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR tanggal LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR store LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR alamat LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR kategori LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR keterangan LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY nomor ASC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	
	$sub_array = array();
	$sub_array[] = $row["nomor"];
	$sub_array[] = $row["tanggal"];
	$sub_array[] = $row["store"];
	$sub_array[] = $row["alamat"];
	$sub_array[] = $row["kategori"];
	$sub_array[] = $row["keterangan"];
	$sub_array[] = '<button type="button" name="update" id_job="'.$row["id_job"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id_job="'.$row["id_job"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>