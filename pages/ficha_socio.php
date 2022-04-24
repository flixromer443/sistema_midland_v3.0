<?php
    include("../config/conexion.php");
    $id=$_GET['id'];
    $query="select * from partners where id='$id'";
    $res=mysqli_query($link,$query);
    $row=mysqli_fetch_array($res);
    $socio=$row[1];
    $query="select * from partners_activities  where pid='$id'";
?>
<!DOCTYPE html>
<html lang="es">
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
            <button type="button" class="btn btn-warning" style="background-color: #ff4081; color:aliceblue" >
            <i class="fa fa-download"></i> Generar factura de AFIP
            </button>
            </a>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" href="#exampleModalToggle5" >
            <i class="fa fa-download"></i> Generar factura instantanea
            </button>
            
            




            
            
            
            
            
            
            
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

<!--factura instantanea-->
<!--modal grande  modal-lg-->

<div class="modal fade " id="exampleModalToggle5" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content " style="color: aliceblue;" >
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalToggleLabel" >Generar factura instantanea </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-modal"></button>
      </div>
      <div class="modal-body">
       <label for="partner" style="color: black;">N° de socio</label>
       <input type="text" class="form-control input" id="number"  disabled placeholder="N° de socio" value="<?php echo $id; ?>">
       <label for="partner" style="color: black;">Nombre y apellido</label>
       <input type="text" class="form-control input" id="partner" disabled placeholder="Nombre y apellido"  value="<?php echo $socio; ?>" >
        <br>
      <?php
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
<script src="../js/validatePayForm2.js"></script>
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