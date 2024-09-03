<?php
    $servername = 'localhost:3307';
    $username = 'root';
    $password = '';

    try {
        $Miconexion = new PDO("mysql:host=$servername;dbname=login_permisos", $username, $password);
        $Miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // poner conexion exitosa en console.log
        echo "
        <script>
        console.log('Conexión a Mysql Exitosa.')
        </script>
        ";
    } catch(PDOException $e) {
        echo "Conexion fallida ". $e->getMessage();
    }
?>