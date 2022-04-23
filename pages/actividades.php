
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
          <a class="nav-link active" aria-current="page" href="../index.php">volver</a>
        </li>
        <li class="nav-item">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            agregar actividad
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
        <h5 class="modal-title" id="staticBackdropLabel" style="color: white;">Agregar actividad</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="form-group">
       <input type="text" placeholder="Nombre" name="activitie" id="activitie">
       </div>
        <br><br>
        <div class="form-group">
           <input type="text" placeholder="Precio" name="price" id="price">
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

      <br><br>
      <br><br>
    









<div class="container">
<table class="table table-light">
  <thead>
    <tr>
      <th scope="col">codigo</th>
      <th scope="col">actividad</th>
      <th scope="col">precio</th>
      <th scope="col">acciones</th>

    </tr>
  </thead>
  <tbody>
      <?php
        include("../config/conexion.php");
        $query="select * from activities";
        $res=mysqli_query($link,$query);
        while($row=mysqli_fetch_array($res)){


            echo '<tr>
            <th>'.$row[0].'</th>
            <td>'.$row[1].'</td>
            <td>$'.$row[2].'</td>
            <td>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop-'.$row[0].'">
            <i class="fas fa-trash"></i>
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop2-'.$row[0].'">
            <i class="fa fa-pen"></i>
            </button>
            </td>
            
            
          
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop-'.$row[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content  bg-danger">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Eliminar actividad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" style="color:aliceblue">
                    ¿Deseas eliminar la actividad <strong>'.ucfirst($row[1]).'</strong> ?
                  </div>
                  <div class="modal-footer">
                  <form action="../abm/abm_activities.php" method="POST">
                    <input type="hidden" name="uid" value='.$row[0].'>
                    <input type="hidden" name="verbo" value="delete">


                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-light">Eliminar</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>


            <div class="modal fade" id="staticBackdrop2-'.$row[0].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content " >
              <form  action="../abm/abm_activities.php" method="POST"> 
                <div class="modal-header bg-primary"">
                  <h5 class="modal-title" id="staticBackdropLabel" style="color: aliceblue;">Actulizar actividad</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" >
                  <input type="hidden" name="aid" id="aid"  value='.$row[0].'>
                  <input type="hidden" name="verbo" id="verbo"  value="update">

                  <label for="">Actividad</label>
                  <br>
                  <div class="form-group">
                  <input type="text" name="activitie" required id="activitie" value='.$row[1].' placeholder="Nombre">
                  </div>
                  <br><br>
                  <label for="">Precio</label>
                  <br>
                  <div class="form-group">
                  <input type="text" name="price" id="price" required value='.$row[2].' placeholder="precio">
                  </div>
                  </div>
                <div class="modal-footer">
                  
                  

                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-outline-primary" onclik="handleChange()">Actualizar</button>
                </div>
                </form>

              </div>
            </div>
          </div>






            </tr>';
        }
      ?>
    
  </tbody>
</table>

 


</div>
<footer class="text-center text-lg-start bg-primary text-muted ">
  
  <div class="text-center p-4" style="color:aliceblue">
    © 2022 Desarrollado por:
    <a class="text-reset fw-bold" href="#">Felix Eduardo Etchegaray</a>
  </div>
  <!-- Copyright -->
</footer>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>



<script src="../js/validationAddActivitieForm.js"></script>
<script src="../js/validationUpdateActivitieForm.js"></script>


</body>
</html>