<?php
function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tracker";

    // create connection
    $con = mysqli_connect($servername, $username, $password);

    // Check Connection
    if (!$con){
        die("Connection Failed : " . mysqli_connect_error());
    }

    // create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($con, $sql)){
        $con = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "
                        CREATE TABLE IF NOT EXISTS memberships(
                            id INT(11) NOT NULL AUTO_INCREMENT,
                            first_name VARCHAR (100) NOT NULL,
                            last_name VARCHAR (100) NOT NULL,
                            email VARCHAR (255) NOT NULL
                            
                        );
        ";



        if(mysqli_query($con, $sql)){
            return $con;
        }else{
            echo "Cannot Create table...!";
        }

    }else{
        echo "Error while creating database ". mysqli_error($con);
    }

}
