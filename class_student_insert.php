<?php 
include ('bootstrap.php');
include ('class_include.php');

$classObj = new classproject();
if (isset($_POST['save_button1'])) {
  $sname   = $_POST['sname'];
  $class_id   = $_POST['class_name'];
  
  // echo $class_id;
  // exit();
  $marks  = implode(',',$_POST['marks']);

  $classObj->studendInsertData($sname,$marks,$class_id);
}
  $newdata = $classObj->className();





        
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Student</title>
	<style type="text/css">
         /* div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}*/
input[type=text], select {
  width: 100%;
  padding: 7px 20px;
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
    $(".test").append('<div class="form-group"><label>Subject Marks </label><input type="text" name="marks[]" class="form-control" required></div>');
  });

});
</script>
</head>
<body>
	
<div class="container">
    <div class="row">
        <div class="col-md-12">
        			<h1 style="text-align:center"> Student Details</h1>

<form action="" method="POST">

<a href="index.php" class="button" style="text-decoration:none;">student details</a>
  <div class="row">         
      <div class="col-md-4 col-md-offset-2">
        	<label>Student Name </label><input type="text" name="sname" class="form-control">
          <div id="resultData"></div>
        </div>

        <div class="col-md-4">
          <label>Class Name</label> 
            <select name="class_name" id="class_name"> 
              <?php foreach ($newdata as $value) {?>
               <option value="<?php echo $value['id'];?>"> 
               <?php echo $value['class_name'];?></option>
              <?php }?>
             
            </select>                                                  
        </div>           
  </div>
<!-- 
    <div class="test">
        <input class="button" id="add1" type="button" value="Add more" class="right">
        <div class="form-group">
            <label>Subject Marks</label><input type="text" name="smarks[]" class="form-control" required>
        </div>
     </div>   -->  
      <div class="col-md-3 col-md-offset-4"> 
     <input id="submit" type="submit" name="save_button1" value="Save" style="float: center;"> 
      </div>
               
</form>   
             	 </div>
          </div>         
    </div>    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script type="text/javascript">

$(document).ready(function(){
  $("#class_name").change(function(){
   
   var cid = $('#class_name').val();

       $.ajax({
      type: "POST",
      url: 'class_student_select.php',
      data: {'class_id':cid},
      success:function(result){
        // alert(result);
        $('#resultData').html(result);
      }

    });



  });
});

</script>

  </body>
</html>

