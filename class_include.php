<?php
class classproject
{
  public $servername = 'localhost';
  public $username   = 'root';
  public $password   = '';
  public $dbname     = 'class';
  public $connect;

  public function __construct()
 {
   $this->connect = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
   if(mysqli_connect_error()){
      trigger_error("failed to connect database".mysqli_connect_error());
    }else{
     return $this->connect;
    }

  }

  public function insertData($cname,$sname,$pmarks,$mmarks)
  {
  
    $sql = "INSERT INTO class_table (class_name,subject_name,passing_marks,maximum_marks)VALUES('".$cname."','".$sname."','".$pmarks."','".$mmarks."')";
    $result = $this->connect->query($sql);
    if($result==true){
       echo '<script>alert("Successfully save")</script>';
    }else{
      echo '<script>alert("insert data failed ")</script>';
    }
  }

  public function readTable($table)
{
  $sql = "SELECT * FROM ".$table;
  $result = $this->connect->query($sql);
    $data = array();

    while($row = $result->fetch_assoc()){
    $data[] = $row;
    }
    return $data;
  
}

  public function x($data)
{
  echo "<pre>";
  print_r($data);
  exit();
}

 public function displayById($id)
{
  $query = "SELECT * FROM class_table WHERE id = ".$id;
  $result = $this->connect->query($query);
  if($result->num_rows>0){  
  $row = $result->fetch_assoc();
  return $row;
  }else{
       echo "Record Not Found";
  }
} 

 public function edit($cname,$sname,$pmarks,$mmarks,$id)
 {
  // print_r($sname);
  // exit();

   $sql = "UPDATE class_table SET class_name='".$cname."',subject_name='".$sname."',passing_marks='".$pmarks."',maximum_marks='".$mmarks."' WHERE id = ".$id;
    
   $result = $this->connect->query($sql); 
   if($result==true){
        // echo '<script>alert("Update successfully")</script>';
        header('location:class_read.php');
      }else{
        echo '<script>alert("Update Failed")</script>';
     }     
 }
  
    public function deleteData($id)
  {    
    $sql = "DELETE FROM class_table WHERE id = ".$id." ";
    $result = $this->connect->query($sql);
    if ($result==TRUE) {
      // echo '<script>alert("delete successfully record")</script>';
      header('location:class_read.php');
    }else{
        echo '<script>alert("delete failed")</script>';
    }
  }

  public function studendInsertData($sname,$marks,$class_id)

  { 
   // $sql = "SELECT * from class_table WHERE id = '".$class_id."'";
   // // echo $sql;
   // // exit();
   // $result = $this->connect->query($class_id);
   // $row = mysqli_fetch_assoc($result);

    $sql = "INSERT INTO student_table (class_id,student_name,student_marks)VALUES('".$class_id."','".$sname."','".$marks."')";
    $result = $this->connect->query($sql);
    if($result==true){
       echo '<script>alert("Successfully save")</script>';
    }else{
      echo '<script>alert("insert data failed ")</script>';
    }
  }

  public function className()
  {
    $sql    = "SELECT * FROM class_table";
    $result = $this->connect->query($sql);
    $final_array=array();
    while ($row = mysqli_fetch_assoc($result)) {
      array_push($final_array, $row);
    }
     
    return $final_array;
  }

   public function classSearch($id)
  {
    $sql    = "SELECT * FROM class_table where id=".$id."";
    $result = $this->connect->query($sql);
    $final_array=array();
    while ($row = mysqli_fetch_assoc($result)) {
      array_push($final_array, $row);
    }

    return $final_array;
  }
   
   public function studentTable()
  {
      $sql = "SELECT student_table.id,student_table.student_name,student_table.student_marks,class_table.subject_name
              FROM student_table
              inner JOIN class_table ON class_table.id=student_table.class_id";     
      $result = $this->connect->query($sql);
      $data = array();
      while($row = $result->fetch_assoc()){ 
      $data[] = $row;
      }
      return $data;     
  } 
     
     public function result($id)
      {
        
        $sql ="SELECT student_table.student_name,class_table.class_name,class_table.subject_name, class_table.passing_marks,class_table.maximum_marks,student_table.student_marks
          FROM student_table
          inner JOIN class_table ON class_table.id=student_table.class_id where student_table.id='".$id."'"; 
        $result = $this->connect->query($sql);
        // $data = mysqli_fetch_array($result);
        $data = array();
        while($row = $result->fetch_assoc()){
           $data[] = $row;
        }
        return $data;

       } 


 } //close class


?>