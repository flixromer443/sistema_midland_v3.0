<?php

    $file=trim($_POST['file']);
    
    createFile($file);
    function createFile($file){
        include("../config/conexion.php");
        $query="select * from $file";
        $res=mysqli_query($link,$query);
        if(mysqli_num_rows($res)>0){
            $route='../files/'.$file.'.csv';
            
            $archivo = fopen ($route, "w+");
            fwrite($archivo, "");
            fclose($archivo);

            $archivo=fopen($route,"w");

            while($row=mysqli_fetch_array($res)){
                $i=0;
                $cadena="";
                while($i<mysqli_num_fields($res)){
                    if($i==mysqli_num_fields($res)-1){
                        $cadena.=$row[$i]."\n";
                        $i++;
                    }else{
                        $cadena.=$row[$i].',';
                        $i++;
                    }
                } 
                fputs($archivo,$cadena);
            }
            fclose($archivo);
        }
    }
    echo json_encode($file);




?>