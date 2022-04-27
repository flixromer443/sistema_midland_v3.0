<?php
    function account_table($link,$pid,$state){
       if($state==0 || $state==2){
        $query="select * from accounts where pid='$pid'";
        $res=mysqli_query($link,$query);
        if(mysqli_num_rows($res)>0){

        echo ' <table class="table">
            <thead class="bg-primary">
            <tr>
                <th scope="col" style="color:azure">Cuentas</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
        
            </tr>
            </thead>
            <thead class="bg-warning">
            <tr>
                <th scope="col">N° de socio</th>
                <th scope="col">actividad</th>
                <th scope="col">valor</th>
                <th scope="col">fecha</th>
                <th scope="col">fecha de vencimiento</th>
                <th scope="col">asentar pago</th>
        
            </tr>
            </thead>
            <tbody >';
                while($row=mysqli_fetch_array($res)){
                    $fecha=explode('/',$row[4]);
                    if(intval($fecha[1]+1)==13){
                      $fecha[1]=0;
                      $fecha[2]+=1;
                    }
                    echo '<tr id="code-'.$row[0].'" class="bg-light">
                        <th scope="row">'.$pid.'</th>
                        <td>'.$row[2].'</td>
                        <td>'.$row[3].'</td>
                        <td>'.$row[4].'</td>
                        <td>'.$fecha[0].'/'.intval($fecha[1]+1).'/'.$fecha[2].'</td>
                        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row[0].'">
                        <i class="fa fa-dollar-sign"></i>
                        </button>
                        <div class="form-check" >
                            <input class="form-check-input" style="width:20px;height:20px" type="checkbox" value="1" id="defaultCheck1" onclick="addToPaymentPlan('.$row[0].',this)">
                            <label class="form-check-label" for="defaultCheck1">
                                Agregar a plan de pago
                            </label>
                            </div>
                        </td>
                        




                        <div class="modal fade" id="staticBackdrop-'.$row[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                  <div class="modal-header  bg-warning">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Asentar pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Deseas dejar asentado el pago de la actividad <strong>'.ucfirst($row[2]).'</strong> ?
                  </div>
                  <div class="modal-footer">
                  <form action="../abm/abm_user.php" method="POST">
                    <input type="hidden" name="id" value='.$row[0].'>
                    <input type="hidden" name="pid" value='.$pid.'>

                    <input type="hidden" name="verbo" value="settle_payment">


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-warning">Aceptar</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>







                    </tr>';
                }
                echo '</tbody>
        </table>';
            }else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>';

                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  Este socio se encuentra al dia
                </div>
              </div>';
            }
            
            
            
       }else{


        


        $query="select * from accounts where pid='$pid'";
        $res=mysqli_query($link,$query);
        if(mysqli_num_rows($res)>0){

        echo ' <table class="table">
            <thead class="bg-primary">
            <tr>
                <th scope="col" style="color:azure">Cuentas</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
        
            </tr>
            </thead>
            <thead class="bg-warning">
            <tr>
                <th scope="col">N° de socio</th>
                <th scope="col">actividad</th>
                <th scope="col">valor</th>
                <th scope="col">fecha</th>
                <th scope="col">fecha de vencimiento</th>
                <th scope="col">asentar pago</th>
        
            </tr>
            </thead>
            <tbody >';
                while($row=mysqli_fetch_array($res)){
                    $fecha=explode('/',$row[4]);
                    if(intval($fecha[1]+1)==13){
                      $fecha[1]=0;
                      $fecha[2]+=1;
                    }
                    echo '<tr id="code-'.$row[0].'" class="bg-light">
                        <th scope="row">'.$pid.'</th>
                        <td>'.$row[2].'</td>
                        <td>'.$row[3].'</td>
                        <td>'.$row[4].'</td>
                        <td>'.$fecha[0].'/'.intval($fecha[1]+1).'/'.$fecha[2].'</td>
                        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row[0].'">
                        <i class="fa fa-dollar-sign"></i>
                        </button>
                        <div class="form-check" >
                            <input class="form-check-input" style="width:20px;height:20px" type="checkbox" value="1" id="defaultCheck1" onclick="addToPaymentPlan('.$row[0].',this)">
                            <label class="form-check-label" for="defaultCheck1">
                                Agregar a plan de pago
                            </label>
                            </div>
                        </td>
                        




                        <div class="modal fade" id="staticBackdrop-'.$row[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                  <div class="modal-header  bg-warning">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Asentar pago</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    ¿Deseas dejar asentado el pago de la actividad <strong>'.ucfirst($row[2]).'</strong> ?
                  </div>
                  <div class="modal-footer">
                  <form action="../abm/abm_user.php" method="POST">
                    <input type="hidden" name="id" value='.$row[0].'>
                    <input type="hidden" name="pid" value='.$pid.'>

                    <input type="hidden" name="verbo" value="settle_payment">


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-warning">Aceptar</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>







                    </tr>';
                }

                $query="select f.headline, f.associated, p.partner from families as f inner join partners as p on p.id=f.associated where f.headline='$pid'";
                $res=mysqli_query($link,$query);

                if(mysqli_num_rows($res)>0){
                  while($row=mysqli_fetch_array($res)){
                      $aid=$row[1];
                      $query2="select * from accounts where pid='$aid'";
                      $res2=mysqli_query($link,$query2);
                      if(mysqli_num_rows($res2)>0){
                          while($row2=mysqli_fetch_array($res2)){
                            $fecha=explode('/',$row2[4]);
                            echo '<tr id='.$row2[0].' class="bg-light">
                                <th scope="row">'.$row[1].'</th>
                                <td>'.$row2[2].'</td>
                                <td>'.$row2[3].'</td>
                                <td>'.$row2[4].'</td>
                                <td>'.$fecha[0].'/'.intval($fecha[1]+1).'/'.$fecha[2].'</td>
                                <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row2[0].'">
                                <i class="fa fa-dollar-sign"></i>
                                </button>
                                <div class="form-check" >
                                    <input class="form-check-input" style="width:20px;height:20px" type="checkbox" value="1" id="defaultCheck1" onclick="addToPaymentPlan('.$row2[0].',this)">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Agregar a plan de pago
                                    </label>
                                    </div>
                                </td>
                                
        
        
        
        
                                <div class="modal fade" id="staticBackdrop-'.$row2[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content ">
                          <div class="modal-header  bg-warning">
                            <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Asentar pago</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            ¿Deseas dejar asentado el pago de la actividad <strong>'.ucfirst($row2[2]).'</strong> ?
                          </div>
                          <div class="modal-footer">
                          <form action="../abm/abm_user.php" method="POST">
                            <input type="hidden" name="id" value='.$row2[0].'>
                            <input type="hidden" name="pid" value='.$pid.'>
        
                            <input type="hidden" name="verbo" value="settle_payment">
        
        
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-warning">Aceptar</button>
                          </form>
                          </div>
                        </div>
                      </div>
                    </div>
        
        
        
        
        
        
        
                            </tr>';
                          }
                      }
                  }
               }






































                echo '</tbody>
        </table>';
            }else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </symbol>
              </svg>';

                echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                <div>
                  Este socio se encuentra al dia
                </div>
              </div>';
            }
            
            
            
       }



















































































        




















    }

?>