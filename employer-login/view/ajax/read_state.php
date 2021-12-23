<?php
include('../../../config/config.php');
include('../../../config/function.php');

 //get search term
    $searchTerm = $_GET['term'];
    
    //get matched data from skills table
   $query=  $conn->query("SELECT * FROM state_master WHERE state_name LIKE '%".$searchTerm."%' ORDER BY state_name ASC");
    if($query->num_rows > 0)
    {
    while($row=$query->fetch_array())
    {
        
         $data[] = $row['state_name'];
    }
    
    
    }
   
    echo json_encode($data);

?>