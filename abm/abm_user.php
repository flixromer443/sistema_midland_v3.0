<?php
    include("../config/conexion.php");
    switch($_POST['verbo']){
        case 'create':
            $firstname=trim($_POST['firstname']);
            $lastname=trim($_POST['lastname']);
            $partner_id=trim($_POST['partner_id']);
            if(!empty($firstname)&&!empty($lastname)){
                $complete_name=trim(strtoupper($firstname))." ".trim(strtoupper($lastname));
                $query="select * from partners where partner='$complete_name' or id='$partner_id'";
                $res=mysqli_query($link,$query);
                if(mysqli_num_rows($res)>0){
                    echo json_encode(1);
                }else{
                    $stmt=mysqli_prepare($link,"INSERT INTO partners(id,partner) values(?,?)");
                    mysqli_stmt_bind_param($stmt,'is',$partner_id,$complete_name);
                    mysqli_stmt_execute($stmt); 
                    echo json_encode(0);
                }
            }
        break;
        case 'delete':
            $uid=trim($_POST['uid']);

            $query="SELECT * FROM families WHERE headline='$uid'";
                    $res=mysqli_query($link,$query);
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_array($res)){
                            //0 no hay familia
                            //1 titular
                            //2 a cargo de un titular
                            $fstate=0;
                            $stmt=mysqli_prepare($link,"UPDATE partners SET headline=? WHERE id=?");
                            mysqli_stmt_bind_param($stmt,'ii',$fstate,$row[1]);
                            mysqli_stmt_execute($stmt); 
                        }
                    }
                    $stmt=mysqli_prepare($link,"DELETE FROM families where headline=?");
                    mysqli_stmt_bind_param($stmt,'i',$uid);
                    mysqli_stmt_execute($stmt); 
                    





            $stmt=mysqli_prepare($link,"DELETE FROM partners WHERE id=?");
            mysqli_stmt_bind_param($stmt,'i',$uid);
            mysqli_stmt_execute($stmt); 

            




            header("Location:../pages/socios.php");
        break;
        case 'my_courses':
            $cid=$_POST['cid'];
            $pid=$_POST['pid'];
            $action=$_POST['action'];
            switch($action){
                case 0:
                    $stmt=mysqli_prepare($link,"DELETE FROM partners_activities WHERE pid=? AND aid=?");
                    mysqli_stmt_bind_param($stmt,'ii',$pid,$cid);
                    mysqli_stmt_execute($stmt); 
                    echo json_encode("eliminado con exito");
                break;
                case 1:
                  
                    $stmt=mysqli_prepare($link,"INSERT INTO partners_activities(pid,aid) values(?,?)");
                    mysqli_stmt_bind_param($stmt,'ii',$pid,$cid);
                    mysqli_stmt_execute($stmt); 
                    echo json_encode("ingresado con exito");
                break;
            }
        break;
        case 'headline':
            $pid=$_POST['pid'];
            $action=$_POST['action'];
            switch($action){
                case 0:
                    $stmt=mysqli_prepare($link,"UPDATE partners SET headline=? WHERE id=?");
                    mysqli_stmt_bind_param($stmt,'ii',$action,$pid);
                    mysqli_stmt_execute($stmt); 
                    
                    $query="SELECT * FROM families WHERE headline='$pid'";
                    $res=mysqli_query($link,$query);
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_array($res)){
                            //0 no hay familia
                            //1 titular
                            //2 a cargo de un titular
                            $fstate=0;
                            $stmt=mysqli_prepare($link,"UPDATE partners SET headline=? WHERE id=?");
                            mysqli_stmt_bind_param($stmt,'ii',$fstate,$row[1]);
                            mysqli_stmt_execute($stmt); 
                        }
                    }
                    $stmt=mysqli_prepare($link,"DELETE FROM families where headline=?");
                    mysqli_stmt_bind_param($stmt,'i',$pid);
                    mysqli_stmt_execute($stmt); 
                    
                    echo json_encode("eliminado con exito");
                break;
                case 1:
                  
                    $stmt=mysqli_prepare($link,"UPDATE partners SET headline=? WHERE id=? ");
                    mysqli_stmt_bind_param($stmt,'ii',$action,$pid);
                    mysqli_stmt_execute($stmt); 
                    echo json_encode("ingresado con exito");
                break;
            }
        break;
        case 'delete_associated':
            $aid=$_POST['aid'];
            $pid=$_POST['pid'];
            $stmt=mysqli_prepare($link,"DELETE FROM families WHERE headline=? and associated=?");
            mysqli_stmt_bind_param($stmt,'ii',$pid,$aid);
            mysqli_stmt_execute($stmt); 

            $fstate=0;
            $stmt=mysqli_prepare($link,"UPDATE partners SET headline=? WHERE id=?");
            mysqli_stmt_bind_param($stmt,'ii',$fstate,$aid);
            mysqli_stmt_execute($stmt); 

            header("Location:../pages/ficha_socio.php?id=".$pid."");
        break;
        case 'add_associated':
            $hid=$_POST['hid'];
            $aid=$_POST['aid'];

            $query="SELECT * FROM families WHERE headline='$hid' and associated='$aid'";
            $res=mysqli_query($link,$query);
            if(mysqli_num_rows($res)>0){
                header("Location:../pages/ficha_socio.php?id=".$hid."");
            }else{
                $query="SELECT * FROM families WHERE associated='$aid'";
                $res=mysqli_query($link,$query);
                if(mysqli_num_rows($res)>0){
                    header("Location:../pages/ficha_socio.php?id=".$hid."");
                }else{
                    $stmt=mysqli_prepare($link,"INSERT INTO families(headline,associated) values(?,?)");
                    mysqli_stmt_bind_param($stmt,'ss',$hid,$aid);
                    mysqli_stmt_execute($stmt); 
    
                    //0 no hay familia
                    //1 titular
                    //2 a cargo de un titular
                    $fstate=2;
                    $stmt=mysqli_prepare($link,"UPDATE partners SET headline=? WHERE id=?");
                    mysqli_stmt_bind_param($stmt,'ii',$fstate,$aid);
                    mysqli_stmt_execute($stmt); 
                    header("Location:../pages/ficha_socio.php?id=".$hid."");
                }
               

            }   
            
        break;
        //elimina individualmente las deudas de los socios
        case 'settle_payment':
            $id=$_POST['id'];
            $pid=$_POST['pid'];

            $stmt=mysqli_prepare($link,"DELETE FROM accounts WHERE id=?");
            mysqli_stmt_bind_param($stmt,'i',$id);
            mysqli_stmt_execute($stmt); 
            header("Location:../pages/ficha_socio.php?id=".$pid."");
        break;

        //genera la facturacion mensual de todos los socios del sistema
        case 'general_billing':
            $query="SELECT DATE_FORMAT(now(),'%d/%m/%Y')";
            $res=mysqli_query($link,$query);
            $row=mysqli_fetch_array($res);
            $fechadb=explode('/',$row[0]);
            $query2="SELECT * FROM general_billings";
            $res2=mysqli_query($link,$query2);
            $found=false;
            while($row2=mysqli_fetch_array($res2)){
                $fechadb2=explode('/',$row2[1]);
                if(trim($fechadb[1])==trim($fechadb2[1])&&trim($fechadb[2])==trim($fechadb2[2])){
                    $found=true;
                    break;
                }
            }
            if($found!=true){
                $stmt=mysqli_prepare($link,"INSERT INTO accounts(pid,activitie,price,fecha) SELECT pa.pid,a.activitie,a.price,DATE_FORMAT(now(),'%d/%m/%Y') from partners_activities as pa inner join activities as a on a.id=pa.aid");
                mysqli_stmt_execute($stmt);

                $stmt=mysqli_prepare($link,"INSERT INTO general_billings(fecha) values(?)");
                mysqli_stmt_bind_param($stmt,'s',$row[0]);
                mysqli_stmt_execute($stmt);
                echo json_encode(0);
            }else{
                echo json_encode(1);
            }
                
            
        break;
  
    }
?>