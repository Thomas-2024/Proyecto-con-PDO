<?php
    function MiConexion(){
        $database="iua";
        $user='root';
        $password='';

        try{
            $conexion=new PDO('mysql:host=localhost:3307;dbname='.$database,$user,$password,
                            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                        );
        
            }catch (PDOException $e){
            echo "Error".$e->getMessage();
        }
        return $conexion;
    }
?>
