<?php
   require '../vendor/autoload.php'; // incluir Composer
    //$firstname,$lastname,$email,$rol,$pass
    function registrar(){
    //registro
    $cliente = new MongoDB\Client("mongodb://root:rootpassword@mongodb:27017");
    $coleccion = $cliente->users->credentials;
    $password = sha1("123456");
    $insertday = date("Y/m/d");

    $resultado = $coleccion->insertOne( [
        'FirstName' => 'Felix Eduardo',
        'LastName' => 'Etchegaray', 
        'Email' => 'fabian.lopez@gmail.com',
        'Role' => 1,
        'Password' => $password ,
        'Insert_date' => $insertday 
    ]);

    echo "Registro insertado con el Object ID '{$resultado->getInsertedId()}'";
    }

?>