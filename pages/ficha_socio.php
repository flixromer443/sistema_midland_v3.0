<?php
    include("../config/conexion.php");
    $id=$_GET['id'];
    $query="select * from partners where id='$id'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $query="select * from partners_activities  where pid='$id'";
?>
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
          <a class="nav-link active" aria-current="page" href="./socios.php">volver</a>
        </li>
        <li class="nav-item">
        <?php
          if($row[2]==1){
            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            agregar familiar
        </button>';
          }
        ?>
        
        </li>
        <li class="nav-item" id="paymentButton" style="display: none;">
          
            <button type="button" class="btn btn-primary" onclick="pay();" >
              plan de pago
            </button>
          
        </li>
      </ul>
    </div>
  </div>
</nav>
<!--navbar-->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
 
  <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: white;">Agregar familiar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="container" style="background-color:rgba(49, 68, 85, 0.600);padding:10px 10px 10px 10px;">



<div class="row rounded">
  <div class="col-sm-3">
  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
  
  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fa-arrow-down-short-wide"></i>

Filtrar por
    </button>

    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <input type="hidden" name="headline" id="headline" value="<?php echo $id;?>">
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
      </div>
      <div class="container" id="message">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<!--modal-->
    <br><br>
    <br><br>
    <div class="container">
    <table class="table table-primary table-striped table-hover">
        <thead>
        <tr>
          <th scope="col">N° de socio</th>
          <th scope="col">Nombre y apellido</th>
          <th scope="col">titular</th>
          <th scope="col">Facturas</th>

  
        </tr>
        </thead>
  
  
  
  
  
        <tbody>                   
            <tr>
            <th scope="row"><?php echo $row[0] ;?></th>
            <td><?php echo $row[1] ;?></td>
            <td>
              <?php 
                if($row[2]==2){
                  $query2="select * from families where associated='$id'";
                  $res2=mysqli_query($link,$query2);
                  $row2=mysqli_fetch_array($res2);
                  echo '<a href="./ficha_socio.php?id='.$row2[0].'">'.$row2[0].'</a>';
                  
                }else{
                  include("../components/checkbox_tiular.php");
                    checkbox_titular($row[0],$row[2]);
                }
              ?>
            </td>
            <td>
            <!-- Button trigger modal -->
            <a href="../components/factura.php?pid=<?php echo $id;?>" target="_blank">
            <button type="button" class="btn btn-primary" >
            <i class="fa fa-download"></i> Generar cuota social
            </button>
            </a>
            
            <?php
              if($row[2]==1){
                echo '<a href="../components/factura2.php?pid='.$id.'" target="_blank">
                <button type="button" class="btn btn-info" >
                <i class="fa fa-download"></i> Generar cuota familiar
                </button>
                </a>';
                echo '<a href="../components/factura_familar_afip.php?pid='.$id.'" target="_blank">
                <button type="button" class="btn btn-secondary" >
                <i class="fa fa-download"></i> Generar factura familiar de AFIP
                </button>
                </a>';
              }
            ?>
          
          <a href="../components/factura_afip.php?pid=<?php echo $id;?>" target="_blank">
            <button type="button" class="btn btn-warning" >
            <i class="fa fa-download"></i> Generar factura de AFIP
            </button>
            </a>
            
            




            
            
            
            
            
            
            
            </td>
        </tr>
      





        
          </tbody>
              </table>
    </div>



    <div class="container">
    <div class="container">
    <div class="container">
    <div class="container">
   <?php
    include("../components/ficha2.php");
    ficha($id,$link);
   ?>
</div>
</div>
</div>
</div>
<br><br>








<div class="container">
    <div class="container">
    <div class="container">
    <div class="container">
   <?php
    include("../components/family_table.php");


    table($id,$link,$row[2]);
    
   ?>
</div>
</div>
</div>
</div>

<br><br>






<!--cuentas-->
<div class="container">
<div class="container">
<div class="container">
<div class="container">
    <?php
      include("../components/table_accounts.php");
      account_table($link,$id,$row[2]);

    ?>
</div>
</div>
</div>
</div>
<!--cuentas-->













<script src="../js/checkboxesPartnerValidation.js"></script>
<script src="../js/checkboxHeadlineValidation.js"></script>

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../js/findPartnerFilter2.js"></script>
<script src="../js/addToPaymentPlan.js"></script>
<br><br><br>
<footer class="text-center text-lg-start bg-primary text-muted ">
  
  <div class="text-center p-4" style="color:aliceblue">
    © 2022 Desarrollado por:
    <a class="text-reset fw-bold" href="#">Felix Eduardo Etchegaray</a>
  </div>
  <!-- Copyright -->
</footer>
            </body>
</html>