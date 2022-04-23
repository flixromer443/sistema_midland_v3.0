<?php
 include("../config/conexion.php");

$filter=htmlspecialchars($_POST['filter']);
$search=htmlspecialchars($_POST['search']);
$response="";
switch($filter){
    case 1:

        $query="select * from partners where id='$search'";
        $res=mysqli_query($link,$query);
        if(mysqli_num_rows($res)>0){
          $response.='
              <table class="table table-primary table-striped table-hover">
        <thead>
        <tr>
          <th scope="col">N° de socio</th>
          <th scope="col">Nombre y apellido</th>
          <th scope="col">Acciones</th>
  
        </tr>
        </thead>
  
  
  
  
  
        <tbody>';
          while($row=mysqli_fetch_array($res)){
            $pid=$row[0];
              
            $response.= '<tr>
            <th scope="row">'.$row[0].'</th>
            <td>'.ucfirst($row[1]).'</td>
            <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row[0].'">
            <i class="fas fa-trash"></i>
            </button>
            <a href="./ficha_socio.php?id='.$row[0].'">
            <button type="button" class="btn btn-primary" >
            <i class="fas fa-eye" style="color:white"></i>
            </button>
            </a>
            
          
            <div class="modal fade" id="staticBackdrop-'.$row[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-danger">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Eliminar socio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color:aliceblue">
                    ¿Deseas dar de baja a <strong>'.ucfirst($row[1]).'</strong> ?
                  </div>
                  <div class="modal-footer">
                  <form action="../abm/abm_user.php" method="POST">
                    <input type="hidden" name="uid" value='.$row[0].'>
                    <input type="hidden" name="verbo" value="delete">


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            
            




           
            
            
            
            
            
            </td>
        </tr>';
        





          }
          $response.='</tbody>
              </table>';
              echo json_encode($response);
 
        }

        
          else{
            $response.='
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>

      <div class="alert alert-info d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        <div>
            No se encontr&oacute; nigun socio.
        </div>
      </div>

            ';
            echo json_encode($response);
          }
      break;

      case 2:

        $query="select * from partners where partner LIKE '%$search%'";
        $res=mysqli_query($link,$query);
        if(mysqli_num_rows($res)>0){
          $response.='
              <table class="table table-primary table-striped table-hover">
        <thead>
        <tr>
          <th scope="col">N° de socio</th>
          <th scope="col">Nombre y apellido</th>
          <th scope="col">Acciones</th>
  
        </tr>
        </thead>
  
  
  
  
  
        <tbody>';
          while($row=mysqli_fetch_array($res)){
            $pid=$row[0];
              
            $response.= '<tr>
            <th scope="row">'.$row[0].'</th>
            <td>'.ucfirst($row[1]).'</td>
            <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row[0].'">
            <i class="fas fa-trash"></i>
            </button>
            <a href="./ficha_socio.php?id='.$row[0].'">
            <button type="button" class="btn btn-primary" >
            <i class="fas fa-eye" style="color:white"></i>
            </button>
            </a>
            
          
            <div class="modal fade" id="staticBackdrop-'.$row[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-danger">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Eliminar socio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color:aliceblue">
                    ¿Deseas dar de baja a <strong>'.ucfirst($row[1]).'</strong> ?
                  </div>
                  <div class="modal-footer">
                  <form action="../abm/abm_user.php" method="POST">
                    <input type="hidden" name="uid" value='.$row[0].'>
                    <input type="hidden" name="verbo" value="delete">


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            
            




           
            
            
            
            
            
            </td>
        </tr>';
        





          }
          $response.='</tbody>
              </table>';
              echo json_encode($response);
 
        }

        
          else{
            $response.='
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
      </svg>

      <div class="alert alert-info d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
        <div>
            No se encontr&oacute; nigun socio.
        </div>
      </div>

            ';
            echo json_encode($response);
          }
      break;
    }
?>