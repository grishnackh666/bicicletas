<?php
   
    session_start();
    
    require_once (__DIR__."/../mdb/mdbUsuario.php");
    require_once (__DIR__."/../../modelo/entidad/Usuario.php");

        $nrocedula = $_POST['nrocedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        
        
        
        $usuario = new Usuario(NULL,$nrocedula, $nombre, $apellido, $correo, $password, $direccion, $telefono, "");
        registrarUsuario($usuario);
        header("Location: ../../view/login.php");
