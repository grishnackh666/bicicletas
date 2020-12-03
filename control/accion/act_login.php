<?php
    //Con session_start() se puede iniciar una nueva sesión
    //o reanudar la sesión existente
    session_start();

    //Con require_once se incluye el archivo mdbUsuario.php
    require_once (__DIR__."/../mdb/mdbUsuario.php");

        //Se obtiene el correo y password del formulario del login,
        //los datos son recibidos por el método POST
        $correo = $_POST['username'];
        $password = $_POST['password'];

        //Se llama a la funcion autenticarUsuario() que esta en mdbUsuario.php
        $user = autenticarUsuario($correo, $password);


        if($user != null){
            //Si el usuario fue encontrado, se guarda su ID en una sesión con $_SESSION
            $_SESSION['usuario']=['id' => $user->getIdUsuario(),'nombre'=> $user->getNombres(),'apellido'=> $user->getApellidos()];
            $_SESSION['ID_USUARIO'] = $user->getIdUsuario();
            $_SESSION['NOMBRE_USUARIO'] = $user->getNombres()." ". $user->getApellidos();
            $_SESSION['DIRECCION']= $user->getDireccion();
            $_SESSION['CORREO']= $user->getCorreo();
            $_SESSION['TELEFONO']= $user->getTelefono();
            $_SESSION['FOTO']= $user->getImagen();

            if($user->getRol() == 1){
                header("Location: ../../view/administradorUsuarios.php");                
            }else{
                header("Location: ../../view/index.php");
            }
            
            
            
        }else{
            //Si el usuario no existe se vuelve a mostrar el login
            header("Location: ../../view/login.php");
            echo '<p class="alert alert-success agileits" role="alert">inicio realizado incorrectamente!p>';

        }
