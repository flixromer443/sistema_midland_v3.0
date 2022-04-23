<?php
    /*$id,$link,$cname*/
    
  
  

    function table($pid,$link){
            $query="select * from families where headline='$pid'";
            $res=mysqli_query($link,$query);
            if(mysqli_num_rows($res)>0){
                echo '<input type="hidden" id="pid"value="'.$pid.'">';
                echo '<ul class="list-group">
                <li class="list-group-item active bg-info" style="color:black" aria-current="true">Familiares</li>';
                while($row=mysqli_fetch_array($res)){
                    $aid=$row[1];
                    $query2="select * from partners where id='$aid'";
                    $res2=mysqli_query($link,$query2);
                    $row2=mysqli_fetch_array($res2);
                        echo '<li class="list-group-item">
                        <div class="form-check form-switch">
                        <button type="button" class="btn btn-danger" style="float:right" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row2[0].'">
                        <i class="fa fa-trash"></i>
                        </button>
                        <a href="./ficha_socio.php?id='.$aid.'">
            <button type="button" class="btn btn-primary" style="float:right" >
            <i class="fas fa-eye" style="color:white"></i>
            </button>
            </a>

            
            


            <a href="../components/factura.php?pid='.$aid.'" target="_blank">
            <button type="button" class="btn btn-info" style="float:right"">
            <i class="fa fa-download"></i>
            </button>
            </a>


                        <div class="modal fade" id="staticBackdrop-'.$row2[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-danger">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Eliminar familiar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color:aliceblue">
                    ¿Deseas quitar de la familia a <strong>'.ucfirst($row2[1]).'</strong> ?
                  </div>
                  <div class="modal-footer">
                  <form action="../abm/abm_user.php" method="POST">
                    <input type="hidden" name="aid" value='.$aid.'>
                    <input type="hidden" name="pid" value='.$pid.'>

                    <input type="hidden" name="verbo" value="delete_associated">


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>









                            <label class="form-check-label" for="'.$row2[0].'" style="float:left; text-align:left; margin-right:20px;"><strong>'.$row2[1].'</strong></label>
                       
                        </div></li>';
                        
                    }
                    
                echo '</ul>';
            }else{
                "";
            }
            
            
    
    
    }
?>