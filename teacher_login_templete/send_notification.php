
        

<?php
 $query = "SELECT * FROM  `assigement_record`";
 $result = mysqli_query($link, $query); 
 ?>




<?php

if (mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_array($result)) {
       $assigement_id=$row['assigement_id'];
    $title=$row['title'];
    $assigement_start_date=$row['assigement_start_date'];
    $assigement_end_date=$row['assigement_end_date'];
  
          $datetime1 = strtotime($assigement_start_date);
      $datetime2 = strtotime($assigement_end_date);
          $secs = $datetime2 - $datetime1;// == <seconds between the two times>
          $days = $secs / 86400;
          if($days==6){
            $query="UPDATE assigement_record SET notification='only five days remaining for assigement Submission' WHERE assigement_id='$assigement_id'";
            mysqli_query($link,$query);
      }
 }       
}

 ?>  

  

