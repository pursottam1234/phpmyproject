<?php

$id = $_SESSION['user_id'];
include('db/connect.php');
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$goalQuery = "SELECT * FROM goal WHERE user_id='$id'";
$goalResult = mysqli_query($conn,$goalQuery);
?>


<!-- ********-->
 <html>
    <head>
        <title>purush-goal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    </head>
    <body style="background: #333A56">
    <u style="color:#A9A9A9;"><i><h1 class="row justify-content-center" style="color:#A9A9A9"><-- GOALS AND UPLOADS --></h1></i></u>
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <?php
                    include('db/connect.php');
                    $query="SELECT * FROM goal WHERE user_id='$id'";
                    $display= mysqli_query($conn, $query);
                    ?>
                            <!-- <table class="table justify-content-center" style="color: #00FFFF;">
                                <thead>
                                    <th>Goal Title</th>
                                    <th>Descriptions</th>
                                    <th>Accomplish Date</th>
                                </thead>
                                <tbody>
                                    <?php while($row= mysqli_fetch_assoc($display)){ ?>
                                        <tr>
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                            <td><?php echo $row['accomplish_date'];?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody> -->
                            </table>
        
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/18e7e11ee0.js" crossorigin="anonymous"></script>
        <script src="js/bootbox.min.js"></script>
        
       
    </body>
</html>
