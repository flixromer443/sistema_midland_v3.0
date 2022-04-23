<?php
    /*$id,$link,$cname*/
    
  
  

    function ficha($pid,$link){
            $query="select * from activities";
            $res=mysqli_query($link,$query);
            if(mysqli_num_rows($res)>0){
                echo '<input type="hidden" id="pid"value="'.$pid.'">';
                echo '<ul class="list-group">
                <li class="list-group-item active" aria-current="true">Actividades</li>';
                while($row=mysqli_fetch_array($res)){
                    $aid=$row[0];
                    $query2="select * from partners_activities where pid='$pid' and aid='$aid'";
                    $res2=mysqli_query($link,$query2);
                    if(mysqli_num_rows($res2)>0){
                        echo '<li class="list-group-item">
                        <div class="form-check form-switch">
                            <input class="form-check-input bg-success" id="'.$row[0].'" onclick="changeCheckbox('.$row[0].')" style="float:right" type="checkbox" role="switch"  checked>
                            <label class="form-check-label" for="'.$row[0].'" style="float:left"><strong>'.$row[1].'</strong></label>
                        </div></li>';
                    }else{
                        echo '<li class="list-group-item">
                        <div class="form-check form-switch">
                            <input class="form-check-input" id="'.$row[0].'" onclick="changeCheckbox('.$row[0].')" style="float:right;" type="checkbox" role="switch"  >
                            <label class="form-check-label" for="'.$row[0].'" style="float:left; text-align:left; margin-right:20px;"><strong>'.$row[1].'</strong></label>
                       
                        </div></li>';
                        
                    }
                    
                }
                echo '</ul>';
            }else{
                "no funciona";
            }
            
            
    
    
    }
?>