<?php
     session_start();
     $expense ="";
     $description="";
     $type ="";
     $date="";
     $price=0;
     $id=0;
     $edit_state =false;


     $db= mysqli_connect('localhost','root','','tracker');



    if (isset($_POST['save'])) {
        $expense = $_POST['expense'];
        $description = $_POST['description'];
        $type = $_POST['types'];
        $date = $_POST['datePublished'];
        $price= $_POST['price'];


        $query =  "INSERT INTO expenses (expense, description,types ,datePublished,price) VALUES ('$expense', '$description','$type','$date','$price')";
        mysqli_query($db,$query);
        $_SESSION['msg'] ="Record Saved";
        header('location: expenses.php');
    }

    if(isset($_POST['update'])){
        $expense = mysqli_real_escape_string($_POST['expense']);
        $description = mysqli_real_escape_string($_POST['description']);
        $type = mysqli_real_escape_string($_POST['types']);
        $date = mysqli_real_escape_string($_POST['datePublished']);
        $price = mysqli_real_escape_string($_POST['price']);

        $id = mysqli_real_escape_string($_POST['id']);

        mysqli_query($db,"UPDATE expenses SET expense='$expense', description='$description',types='$type',datePublished='$date',price='$price' WHERE id=$id");
        $_SESSION['msg'] ="Record Updated";
        header('location: expenses.php');

    }

    if(isset($_GET['del'])){
        $id=$_GET['del'];
        mysqli_query($db,"DELETE FROM expenses WHERE id=$id");
        $_SESSION['msg'] ="Record Deleted";
        header('location: expenses.php');
    }

    $results =mysqli_query($db,"SELECT * FROM expenses");


?>