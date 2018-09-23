<?php
require_once("includes/db.php");
//$user_id=1;
$columns = array("student.name","student.class","student.roll_no","department.dept_name","student.user_id");
$query = "select name,class,roll_no,dept_name,user_id from student,department where student.dept_id=department.dept_id";
//echo "$query";
if(isset($_POST["search"]["value"])){
    $query .= " and  (student.name like '%" . $_POST['search']['value']."%' or student.class like '%". $_POST['search']['value']."%')";
}

if(isset($_POST["order"])){
    $query.= " order by ".$columns[$_POST['order']['0']['column']]." ".$_POST['order']['0']['dir'];
}
else{
    $query.= " order by ".$columns[0]." ASC ";
}

$query1 = " ";

if($_POST["length"]!=-1){
    $query1 = ' limit '.$_POST['start'].','.$_POST['length'];
}

$number_filtered_row = mysqli_num_rows(mysqli_query($connection,$query));

$result = mysqli_query($connection , $query.$query1);


$data = array();

while($row = mysqli_fetch_assoc($result)){
    $sub_array = array();
    
    $sub_array[] = $row["name"];
    $sub_array[] = $row["class"];
    $sub_array[] = $row["roll_no"];
    $sub_array[] = $row["dept_name"];
    $sub_array[] = "<button class ='edit fa fa-pencil btn btn-primary' id = '".$row['user_id']."' data-toggle='modal' data-target='#editModal'></button>";
    $sub_array[] = "<button class ='delete fa fa-trash btn btn-danger' id = '".$row['user_id']."' data-toggle='modal' data-target='#deleteModal'></button>";
    // i may have to add some more columns
    
    $data[] = $sub_array;
}

function get_all_data($connection){
    $query =  "select name,class,roll_no,dept_name from student,department where student.dept_id=department.dept_id";
    return (mysqli_num_rows(mysqli_query($connection, $query)));
    
}

$output = array(
    "draw" => intval($_POST['draw']),
    "recordsTotal" => get_all_data($connection),
    "recordsFiltered" => $number_filtered_row,
    "data" => $data,
);


echo json_encode($output);
?>