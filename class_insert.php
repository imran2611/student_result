<?php 
include ('bootstrap.php');
include ('class_include.php');

$classObj = new classproject();
if (isset($_POST['save_button'])) {

  $cname  = $_POST['cname'];
  $sname  = implode(',',$_POST['sname']);
  $pmarks = implode(',',$_POST['pmarks']);
  $mmarks = implode(',',$_POST['mmarks']);
 
  $classObj->insertData($cname,$sname,$pmarks,$mmarks);

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>class </title>
	<style type="text/css">
          div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
$(document).ready(function(){
  $("#add1").click(function(){
    $(".test").append('<div class="form-group col-md-4"><label>Subject Name </label><input type="text" name="sname[]" class="form-control" required></div><div class="form-group col-md-4"><label>Passing Marks</label><input type="text" name="pmarks[]" class="form-control" required></div><div class="form-group col-md-4"><label>Maximum Marks </label><input type="text" name="mmarks[]" class="form-control" required></div>');
  });

});
</script>
</head>
<body>
	
<div class="container">
    <div class="row">
        <div class="col-md-12">
        			<h1 style="text-align:center"> Class</h1>

<form action="" method="POST">
<a href="class_read.php" class="button" style="text-decoration:none;">List subject</a>
<a href="index.php" class="button" style="text-decoration:none;">student details</a>
<div class="row">
  
        		<div class="form-group col-md-4 col-md-offset-4">

        					<label>Class Name </label><input type="text" name="cname" class="form-control">
        		</div>
</div>

            <div class="test">

        		<div class="form-group col-md-3">
        					<label>Subject Name </label><input type="text" name="sname[]" class="form-control" required>
        		</div>
        		<div class="form-group col-md-3">
        					<label>Passing Marks</label><input type="text" name="pmarks[]" class="form-control" required>
        		</div>
        		<div class="form-group col-md-3">
        					<label>Maximum Marks </label><input type="text" name="mmarks[]" class="form-control" required>
        		</div>
        	<div class="form-group col-md-3">        					
        					<input class="button" id="add1" type="button" value="Add more" class="right">
        	</div>

          </div>
          <div class="col-md-4 col-md-offset-4">
        			<input id="submit" type="submit" name="save_button" value="Save" style="float: center;"> 
          </div> 
</form>  
                			
        	</div>
      </div>
         
             
    </div>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>

