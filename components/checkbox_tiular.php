<?php
function checkbox_titular($pid,$state){
    if($state==1){

    echo '<div class="form-check form-switch">
                <input class="form-check-input bg-success" id="'.$pid.'" onclick="changeHeadlineCheckbox('.$pid.')"  type="checkbox" role="switch"  checked>
                </div>';
    }else{
        echo '<div class="form-check form-switch">
                    <input class="form-check-input" id="'.$pid.'" onclick="changeHeadlineCheckbox('.$pid.')"  type="checkbox" role="switch"  >
               </div>';
    }













}


?>