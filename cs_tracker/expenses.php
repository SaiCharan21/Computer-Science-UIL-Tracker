<?php  include('server.php');
    if(isset($_GET['edit'])){
        $id= $_GET['edit'];
        $edit_state=true;
        $rec = mysqli_query($db,"SELECT * FROM expenses WHERE id=$id");
        $record= mysqli_fetch_array($rec);
        $expense = $record['expense'];
        $description = $record['description'];
        $type = $record['types'];
        $date = $record['datePublished'];
        $price = $record['price'];
        $id = $record['id'];
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Expenses</title>
    <link rel="stylesheet" type="text/css" href="expenses.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">



</head>
<body>
<main>

<div class="container text-center">
    <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-dollar-sign"></i>   Expense Tracker</h1>
</div>
</main>
    <?php if (isset($_SESSION['message'])): ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <?php $results = mysqli_query($db, "SELECT * FROM expenses"); ?>

    <table>
    <thead>
    <tr>
        <th>Expense</th>
        <th>Description</th>
        <th>Type</th>
        <th>Date</th>
        <th>Price</th>



        <th colspan="1">Edit</th>
        <th colspan="1">Delete</th>

    </tr>
    </thead>
    <tbody>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['expense'];?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['types']; ?></td>
            <td><?php echo $row['datePublished'];?></td>
            <td><?php echo $row['price'];?></td>

            <td>
                <a href="expenses.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>

    </tbody>
</table>



<form method="post" action="server.php" >
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="input-group">
        <label>Expense</label>
        <input type="text" name="expense"  placeholder="Expense" value="<?php echo $expense;?>">
    </div>
    <div class="input-group">
        <label>Description</label>
        <input type="text" name="description" placeholder="Description" value="<?php echo $description;?>">
    </div>

    <div class="input-group">
        <label>Type</label>
        <input type="text" name="types" placeholder="Essential or Miscellanous" value="">
    </div>
    <div class="input-group">
        <label>Date</label>
        <input type="date" name="datePublished" placeholder="Date Added" value="">
    </div>
    <div class="input-group">
        <label>Price</label>
        <input type="number" name="price" placeholder="Price" value="">
    </div>


    <div class="input-group">

            <button class="btn" type="submit" style="background: #ff631c;" name="save" >Save</button>
            </div>
</form>
</body>
</html>