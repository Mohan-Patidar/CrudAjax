<?php
include 'dbcon.php';

$sql = "SELECT * FROM crud ORDER BY id ASC";
$result = mysqli_query($conn,$sql);
$output="";
if(mysqli_num_rows($result)>0){
    $output ='<table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>email</th>
                <th>Phone</th>
                <th>City</th>
                <th width="90px">Edit<th>
                <th width="90px">Delete<th>
             
            </tr>';

            while($row = mysqli_fetch_assoc($result)){
                $output .="<tr>
                <td>{$row["id"]}</td>
                <td>{$row["name"]}</td>
                <td>{$row["email"]}</td>
                <td>{$row["phone"]}</td>
                <td>{$row["city"]}</td>
                <td><button class='edit-btn' data-eid='{$row["id"]}'>Edit</button></td>
                <td><button class='delete-btn' data-id='{$row["id"]}'>Delete</button></td>
               
                
                </tr>";
            }
            $output .="<table>";

            echo $output;

}else{
      echo "no record found";
}





?>