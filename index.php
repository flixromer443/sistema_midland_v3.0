<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <link rel="shortcut icon" href="./img/midland.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Sistema Midland</title>
</head>
<body style="background-color:#90caf9">
<!--navbar-->
<?php include("./components/navbar.php")?>
<!--navbar-->

<!--botones-->
<br><br><br>
<div class="container">
    <div class="container">
    <div class="container">
    <div class="container">
   <div class="row">
    <div class="col-sm-5 ">
    <div class="card text-white bg-primary mb-3 " style="max-width: 18rem;" onclick="window.location.replace('./pages/socios.php')" >
        <div class="card-header"></div>
        <div class="card-body boton">
            <h3 class="card-title  fuente"><i class="fa fa-users"></i> Socios</h3>
            <p class="card-text" ></p>
        </div>
        </div>
    </div>
    
    <div class="col-sm-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;  " onclick="window.location.replace('./pages/actividades.php')"  >
        <div class="card-header"></div>
        <div class="card-body boton">
            <h3 class="card-title fuente"><i class="fa fa-calendar"></i> Actividades</h3>
        </div>
        </div>
    </div>
   <div class="col-sm-5" >
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;  " data-bs-toggle="modal" href="#exampleModalToggle">
        <div class="card-header"></div>
        <div class="card-body boton">
            <h3 class="card-title fuente"><i class="fa fa-database"></i> Backup</h3>
        </div>
        </div>
            </div>
             
        <div class="col-sm-5" >
            <div class="card text-white bg-warning mb-3" style="max-width: 18rem;  " data-bs-toggle="modal" href="#exampleModalToggle4">
        <div class="card-header"></div>
        <div class="card-body boton">
            <h3 class="card-title fuente"><i class="fa fa-dollar-sign"></i> Cobros</h3>
        </div>
        </div>
            </div>
   </div>
</div></div></div></div>
<!--botones-->




<!--Backup mooal-->
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-success" style="color: white;" id="modal-bkp">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel" ><i class="fa fa-database"></i> Backup</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-modal"></button>
      </div>
      <div class="modal-body">
        Si desea realizar una copia de seguridad presione <strong>Continuar.</strong>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" onclick="sendRequest()">Continuar</button>
      </div>
    </div>
    <div id="loader"  style="display:none;" class="modal-dialog modal-dialog-centered">
        <h1 style="color: white">Cargando...</h1>
        <div class="spinner-grow text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-light" role="status">
          <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
    </div>
  </div>
 
</div>
<!--Backup mooal-->












<!--modal grande  modal-lg-->
<div class="modal fade" id="exampleModalToggle4" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " >
      <div class="modal-header bg-warning"  style="color: aliceblue;">
        <h5 class="modal-title" id="exampleModalToggleLabel" ><i class="fa fa-dollar-sign"></i> Cobros</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-modal"></button>
      </div>
      <div class="modal-body">
        Si desea continuar seleccione una <strong>opci&oacute;n</strong>.
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-toggle="modal" href="#exampleModalToggle6">Liquid&aacute;r sueldo </button>
        <button class="btn btn-secondary" data-bs-toggle="modal" href="#exampleModalToggle5">Generar factura instantanea</button>
      </div>
    </div>
   
  </div>
 
</div>
<!--Factura instantanea-->
<div class="modal fade " id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content " style="color: aliceblue;" >
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalToggleLabel" >Generar factura instantanea </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-modal"></button>
      </div>
      <div class="modal-body">
       <label for="partner" style="color: black;">N° de socio</label>
       <input type="text" class="form-control input" id="number" placeholder="N° de socio">
       <label for="partner" style="color: black;">Nombre y apellido</label>
       <input type="text" class="form-control input" id="partner"placeholder="Nombre y apellido">
        <br>
      <?php
      include("./config/conexion.php");
        $query="select * from activities";
        $res=mysqli_query($link,$query);
        if(mysqli_num_rows($res)>0){
            echo '<input type="hidden" id="pid"value="'.$pid.'">';
            echo '<table class="table">
            <thead class="bg-primary" style="color:white">
              <tr>
                <th scope="col">Actividad</th>
                <th scope="col">Precio</th>
                <th scope="col">Fecha de emisi&oacute;n</th>
                <th scope="col">Agregar</th>
              </tr>
            </thead>';
            while($row=mysqli_fetch_array($res)){
              echo '<tbody class="bg-light">
              <tr>
                <td>'.$row[1].'</td>
                <td>
                  <div class="input-group mb-3">
                  <button class="btn btn-warning disabled" type="button" >$</button>
                  <input type="text" class="form-control" placeholder="0" id="price-'.$row[0].'" >
                  </div>
                </td>
                <td>
                  <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="dd/mm/aaaa" maxlength="10" oninput="autoCompleteDate(this)"id="date-'.$row[0].'" >
                  </div>
                </td>
                <td>
                  <div class="form-check form-switch">
                  <input class="form-check-input" id="'.$row[0].'"  style="float:right" onclick="addToPayment('.$row[0].',this)" type="checkbox" role="switch">
                  </div>
                </td>
              </tr>';
            }
            
              




            echo'</tbody>
          </table>';
            
        }else{
            "no funciona";
        }
        
      ?>  



 



















      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" onclick="pay(1)"><i class="fa fa-print"></i> Factura digital</button>
        <button class="btn btn-warning" onclick="pay(2)"><i class="fa fa-print"></i> Factura de AFIP</button>
      </div>
    </div>
   
  </div>
 
</div>
<!--factura instantanea-->



<!--liquidacion de sueldos-->
<div class="modal fade " id="exampleModalToggle6" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content " style="color: aliceblue;" >
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalToggleLabel" >Liquidaci&oacute;n de sueldos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-modal"></button>
      </div>
      <div class="modal-body">
       <label for="partner" style="color: black;">Nombre y apellido</label>
       <input type="text" class="form-control input" id="settlementReceiver"placeholder="Nombre y apellido">
       
       <label for="partner" style="color: black;">N° de documento</label>
       <input type="text" class="form-control input" id="settlementDocument" placeholder="N° de documento">
       
       <label for="partner" style="color: black;">Actividad</label>
       <input type="text" class="form-control input" id="settlementActivitie"placeholder="Actividad">
       
       <br><br>
       
       <label for="partner" style="color: black;">Porcentaje de interes</label>
       <div class="input-group mb-3">
        <button class="btn btn-warning disabled" type="button" >%</button>
        <input type="number" class="form-control input" id="settlementPercentage"placeholder="0">
       </div>
       
       <label for="partner" style="color: black;">Total</label>
       <div class="input-group mb-3">
        <button class="btn btn-warning disabled" type="button" >$</button>
        <input type="number" class="form-control input" id="settlementAmount"placeholder="0">
       </div>
        <br>
      



 



















      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" onclick="sendSalarySettlement()"><i class="fa fa-print"></i> Liquidar sueldo</button>
      </div>
    </div>
   
  </div>
 
</div>
<!--liquidacion de sueldos-->






































<?php
    include("./components/footer.php");


?>
<script src="./plugins/jquery/jquery.min.js"></script>

<script src="./js/sendBackupRequest.js"></script>
<script src="./js/validatePayForm.js"></script>
<script src="./js/validateSalarySettlement.js"></script>
</body>
</html>