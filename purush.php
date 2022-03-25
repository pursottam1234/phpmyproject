<?php
 session_start();
 $id = $_SESSION['user_id'];
    include('db/connect.php');
    // if(isset($_POST['title']) && isset($_POST['discriptions']))
    $title = $_POST['title'];
    $date=date('y-m-d');
    $description=$_POST['description'];
    if($title!=='' && $description!==''){

        $query = "INSERT INTO goal(title,accomplish_date,description,user_id) VALUES('$title','$date','$description','$user_id')";
        if(mysqli_query($conn,$query)){

            $msg ="successfully inserted";
       
    }else{

        $msg="some error occured: ".mysqli_error($conn);
    }
      header('Location:../Goal.php?msg='.$msg);
      header('Location:../view-goal.php');
    }
?>

