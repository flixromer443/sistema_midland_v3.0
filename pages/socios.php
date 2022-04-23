
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/midland.png">
    <title>Sistema Midland</title>


    <!-- Font Awesome -->
<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</head>
<body style="background-color:#90caf9">


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














<!--navbar-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-primary">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
    <img src="../img/midland.png" alt="" width="30" height="24" class="d-inline-block align-text-top">C.A.F.M</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">volver</a>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            agregar socio
        </button>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            facturaci&oacute;n general
        </button>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--navbar-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form id="form1">  
  <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: white;">Agregar socio</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       <input type="text" placeholder="Nombre/s" name="firstname" id="firstname">
       </div>
        <br><br>
        <div class="form-group">
           <input type="text" placeholder="Apellido/s" name="lastname" id="lastname">
        </div>
        <br><br>
        <div class="form-group">
           <input type="number" placeholder="N° de socio" name="partner_id" id="partner_id">
        </div>
      </div>
      <div class="container" id="message">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
</form>
  </div>
</div>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Facturaci&oacute;n general</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn1"></button>
      </div>
      <div class="modal-body" id="generalModal">
        <p><strong>IMPORTANTE:</strong> esta accion generar&aacute;
           la factura mensual de cada socio del sistema, 
           se recomienda hacerlo entre el dia 1 y el dia 5 de cada mes. <br>Si desea continuar presione <strong>Aceptar</strong></p>
           
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="btn2">Cerrar</button>
        <button type="button" class="btn btn-primary" onclick="execute()" id="btn3">Aceptar</button>
      </div>
    </div>
  </div>
</div>










      <br><br>
      <br><br>
    


<div class="container rounded" style="background-color:rgba(49, 68, 85, 0.600);padding:10px 10px 10px 10px;">
<p style="color: white;">Buscar socios</p>  
<div class="row">
  <div class="col-sm-3">
  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  
  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-outline-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-arrow-down-short-wide"></i>

Filtrar por
    </button>

    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" value="1" onclick="changeFilter(1)" >N° de socio</a></li>
      <li><a class="dropdown-item" value="1" onclick="changeFilter(2)" >Nombre y apellido</a></li>
     

    </ul>
  </div>
</div>
        
        
     
  
  </div>
 
  <div class="col-sm-3" id="filter_response">
   
  </div>
    <div class="col-sm-3" id="submit" hidden>
      <button type="button" class="btn btn-primary mb-3" onclick="findPartners()">Buscar</button>
    </div>
      
  </div>
</div>











<div class="container" id="response">


 


</div>

<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>


<script src="../js/findPartnerFilter.js"></script>
<script src="../js/validationAddPartnerForm.js"></script>
<script src="../js/executeGeneralBilling.js"></script>
<?php
    include("../components/footer.php");


?>
</body>
</html>