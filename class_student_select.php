<?php 

include ('class_include.php');

if(!empty($_POST)) 
{    
     $classObj = new classproject();
     $newdata = $classObj->classSearch($_POST['class_id']);

   $table='';
      foreach ($newdata as $row) {

        $data = explode(",",$row['subject_name']);
        foreach ($data as  $value) {
          $table.='<div class="form-group col-md-6">'.$value.'</div>
                 <div class="form-group col-md-12 col-md-offset-12">
                       <input type="text" name="marks[]">
                 </div></div>';
        }

                     
}            
   // $table.='</tbody>
            // </table></div></div>';
       echo $table;
        
}  
?>