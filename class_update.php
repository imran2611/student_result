<?php 
include ('bootstrap.php');
include ('class_include.php');


$classObj = new classproject();


// Update profile
if(isset($_GET['uid']) && !empty($_GET['uid'])){
    $uid = $_GET['uid'];    
    $result = $classObj->displayById($uid);

    $subject_name  = explode(',',$result['subject_name']);
    $passing_marks = explode(',',$result['passing_marks']);
    $maximum_marks = explode(',',$result['maximum_marks']);
}

if (isset($_POST['update_button'])) {

  $cname  = $_POST['cname'];
  $sname  = implode(',',$_POST['sname']);
  $pmarks = implode(',',$_POST['pmarks']);
  $mmarks = implode(',',$_POST['mmarks']);
  $id     = $_GET['uid'];

  $classObj->edit($cname,$sname,$pmarks,$mmarks,$id);

}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>class </title>
    <style type="text/css">
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

                                  <input class="button" id="add1" type="button" value="Add more" class="right">
                    
                    <form action="" method="POST">

                        <!-- <div class="col-md-12 col-md-offset-12"> -->
<div class="row">
                        <div class="form-group col-md-4 col-md-offset-4">
                            <label>Class Name </label><input type="text" name="cname" class="form-control"
                            value="<?php echo $result['class_name']; ?>">
                        <!-- </div> -->
                        </div>
</div>

    <div class="test">

           <?php foreach ($subject_name as $k => $v) 

           {
               
            ?>
                    <div class="form-group col-md-4">
                            <label>Subject Name </label><input type="text" name="sname[]" class="form-control" required value="<?php echo $v;?>">
                    </div>
                    <div class="form-group col-md-4">
                            <label>Passing Marks</label><input type="text" name="pmarks[]" class="form-control" required value="<?php echo $passing_marks[$k];?>">
                    </div>
                    <div class="form-group col-md-4">
                            <label>Maximum Marks </label><input type="text" name="mmarks[]" class="form-control" required value="<?php echo $maximum_marks[$k];?>">
                    </div>
                        

             

          <?php } ?> </div>
            <div class="col-md-4 col-md-offset-4">
                    <input class="button" type="submit" name="update_button" value="Save" style="float: center;">

             </div>

                    </form>  
              <a class="button" href="class_read.php">List subject</a>

                </div>
            </div>
        </div>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

