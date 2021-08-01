<?php 
include ('class_include.php');


  $classObj = new classproject();
  $table = "class_table";
  $userview = $classObj->readTable($table);

 if(isset($_GET['deleteId']) and !empty($_GET['deleteId'])){
    $deleteId = $_GET['deleteId'];
    $classObj->deleteData($deleteId);
}

//     $classObj->x($userview[3]);
//   echo "<pre>";
//       print_r($userview[1]['subject_name']);  
//   echo "<table>";
//        $newvar = explode(",",($userview[1]['subject_name']));
//        echo "<tr>";
//        foreach ($newvar as $key => $value) {
//         echo "<td>$value</td>";
//            $newvar[$key]=$value;
// echo "</tr>";
//        }
// echo "</table>";

//      print_r($newvar);
       

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Class table</title>
    <style type="text/css">
.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}
.styled-table th,
.styled-table td {
    padding: 12px 15px;
}
.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}
.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
  </style>
</head>
<body>

<table class="styled-table" style="text-align:center;" width="100%">
    <thead>
        <h1 style="text-align:center;">Student Subject</h1>
        <tr style="text-align:center;">
            <th>Sr no</th>
            <th>Class Name</th>
            <th>Subject Name</th>
            <th>Passing Marks</th>
            <th>Maximum Marks</th>
            <th>Update</th>  
            <th>Delete</th>          
        </tr>       
    </thead>
    <tbody>
         
 <?php 
         foreach ($userview as $row) {
 ?>
           <tr class="active-row">
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $row['class_name']?></td>
                  <td><?php echo $row['subject_name']?></td>
                  <td><?php echo $row['passing_marks']?></td>
                  <td><?php echo $row['maximum_marks']?></td>                  
                  <td><a href="class_update.php?uid=<?php echo $row["id"];?>" style="text-decoration:none; color: green;">edit</a></td>
                  <!-- <td><input type="submit" name="delete_button" value="Delete"></td> -->
                  <td><a href="class_read.php?deleteId=<?php echo $row["id"];?>"style="text-decoration:none; color: green;">delete</a></td>
            </tr>          
<?php }?>
       
      
    </tbody>
</table>
<a class="button" href="class_insert.php" style="text-decoration:none;">Add subject</a>
</body>
</html>