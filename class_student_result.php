<?php
include ('bootstrap.php');
include ('class_include.php');

$classObj = new classproject();

// $data = $classObj->result($uid);

if(isset($_GET['uid']) && !empty($_GET['uid'])){
    $uid = $_GET['uid']; 
     
    $result = $classObj->result($uid);

     $subject_name  = explode(',',$result[0]['subject_name']);
     $passing_marks = explode(',',$result[0]['passing_marks']);
     $maximum_marks = explode(',',$result[0]['maximum_marks']);
     $student_marks = explode(',',$result[0]['student_marks']);
   
     $maximum_total = array_sum($maximum_marks);// total marks
     // echo $maximum_total;
      $student_total = array_sum($student_marks);// total marks
     //echo $student_total;
     $percentage = round($student_total*100/$maximum_total."%");// percentage calculate 
       
  }


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Result</title>
	<style type="text/css">
       div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}  
table.center {
  margin-left: auto; 
  margin-right: auto;
}
table,th,td{
       text-align: center;
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
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
	       <h1 style="text-align:center">University Of Mumbai</h1>

	  	      <div align="center"> <label>Name</label><input value="<?php echo $result[0]['student_name'];?>">
	  	       <label>Class Name</label><input value="<?php echo $result[0]['class_name'];?>">
	  	   </div>
	  	       <table id="customers" class="center" border="1" style="width: 50%;" style="text-align:center;">
	  	       	     
	  	       	       <tr style="text-align:center;">
	  	       	       	   <th class="th">Subject Name</th>
	  	       	       	   <th>Passing Marks</th>
	  	       	       	   <th>Maximum Marks</th>
	  	       	       	   <th>Marks Obtained</th>
	  	       	       	   <th>Remark</th>
	  	       	       </tr>
	  	       	       <?php
	  	       	        if (is_array($subject_name))
	  	       	         {

                    foreach ($subject_name as $k=>$subject) {
                    	
                         // foreach ($passing_marks as $value) {
                         
                    	?>
                        <tr>
	  	       	       	   <td class="td"><?php echo $subject;?></td>
	  	       	       	   <td><?php echo $passing_marks[$k];?></td>
	  	       	       	   <td><?php echo $maximum_marks[$k];?></td>
	  	       	       	   <td><?php echo $student_marks[$k];?></td>
	  	       	       	   <td><?php 
	  	       	       	   if($student_marks[$k]>=$passing_marks[$k]){
	  	       	                echo "pass" ; 
	  	       	                // echo '<script>alert("You are go to next class")</script>' ; 
	  	       	            }else{
                                echo "fail";
	  	       	            }	?>
	  	       	           </td>
	  	       	        	  	       	       	  
	  	       	       </tr>	  	       	       
                    <?php 
                } 
            }
                ?>
	  	       	     
	  	       </table>
	  	       <div align="center">
	  	       <table>
	  	       <tr>
	  	       <td> <div align="left"> <?php
	  	        echo " <b>Total Marks ".$maximum_total;
	  	        echo " / ".$student_total." = ".$percentage."%"."<b>";

	  	        ?>
	  	         </div></td>
               </tr>
               </table>
               </div>
	  	<div align="center"> <a class="button" href="index.php" style="text-decoration:none;">student details</a></div>

</body>
</html>
