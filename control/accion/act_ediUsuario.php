<?php
    
    session_start();
    
    require_once (__DIR__.'/../mdb/mdbUsuario.php');
    $idUsuario = $_POST['idUsuario'];
    $nrocedula = $_POST['cedula'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    

    
    
    
    $usuario = new Usuario($idUsuario, $nrocedula, $nombres, $apellidos, $correo, $password, $direccion, $telefono, "". "");
    editarUsuario($usuario);

    header("view/index.php");