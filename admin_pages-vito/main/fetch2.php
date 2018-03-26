<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "crud");
$columns = array('nomor, tanggal, store, alamat, kategori, keterangan');

$query = "SELECT * FROM jobs WHERE ";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'tanggal BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" AND ';
}

if(isset($_POST["search"]["value"]))
{
 $query .= '
  (id_job LIKE "%'.$_POST["search"]["value"].'%" 
  OR nomor LIKE "%'.$_POST["search"]["value"].'%" 
  OR store LIKE "%'.$_POST["search"]["value"].'%" 
  OR alamat LIKE "%'.$_POST["search"]["value"].'%"
  OR kategori LIKE "%'.$_POST["search"]["value"].'%"
  OR keterangan LIKE "%'.$_POST["search"]["value"].'%" )
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
 ';
}
else
{
 $query .= 'ORDER BY id_job DESC ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($connect, $query));

$result = mysqli_query($connect, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
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

function get_all_data($connect)
{
 $query = "SELECT * FROM jobs";
 $result = mysqli_query($connect, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($connect),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>