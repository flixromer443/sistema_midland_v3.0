<?php
 include("../config/conexion.php");
 switch($_POST['verbo']){
     case 'create':
        $activitie=htmlspecialchars($_POST['activitie']);
        $price=htmlspecialchars($_POST['price']);
        if(!empty($activitie)&&!empty($price)){
            $query="select * from activities where activitie='$activitie'";
            $res=mysqli_query($link,$query);
            if(mysqli_num_rows($res)>0){
                echo json_encode(1);
            }else{
                $stmt=mysqli_prepare($link,"INSERT INTO activities(activitie,price) values(?,?)");
                mysqli_stmt_bind_param($stmt,'ss',$activitie,$price);
                mysqli_stmt_execute($stmt); 
                echo json_encode(0);
            }
        }
     break;
     case 'delete':
         $uid=htmlspecialchars($_POST['uid']);
         $stmt=mysqli_prepare($link,"DELETE FROM activities WHERE id=?");
         mysqli_stmt_bind_param($stmt,'i',$uid);
         mysqli_stmt_execute($stmt); 
         header("Location:../pages/actividades.php");
     break;
     case 'update':
        $aid=$_POST['aid']; 
        $activitie=$_POST['activitie'];
        $price=$_POST['price'];        
        if(strlen($price)>2 && strlen($activitie)>3){
            $stmt=mysqli_prepare($link,"UPDATE activities SET activitie=?, price=? WHERE id=?");
            mysqli_stmt_bind_param($stmt,'ssi',$activitie,$price,$aid);
            mysqli_stmt_execute($stmt); 
            header("Location:../pages/actividades.php");
        }else{
            header("Location:../pages/actividades.php");
        }
     break;
     
 }
?>
