<?php
session_start();
if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
    header('Location:login.php');
}
$id = $_SESSION['user_id'];
include('db/connect.php');
$query = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$goalQuery = "SELECT * FROM goal";
$goalResult = mysqli_query($conn, $goalQuery);
include("include/nav.php");
?>

<html>
    <head>
        <title>purush-goal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
    </head>
    <body style="background: #333A56">
    <u style="color:#A9A9A9;"><i><h1 class="row justify-content-center" style="color:#A9A9A9"><-- GOALS AND UPLOADS --></h1></i></u>
        <div class="container">
            <div class="row">
                <?php include('include/left-nav.php'); ?>
                <div class="col-8">
                    <form method="POST" style="margin-top: 30px; background-image: url(./images/2.jpg); background-repeat: no repeat; background-size: cover;" action="db/insert.php">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                            <input type="text" name="title" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Descriptions</span>
                            <input type="text" name="description" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Accomlish_date</span>
                            <input type="date" name="testdate" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <div class="mb-3" style="color:#fff;">
                            <label for="formFileMultiple" class="form-label">Status</label>
                            <div class="status">
                                <select name="status" aria-label="Default select example" class="form-select">
                                    <option value="Complete">Complete</option>
                                    <option value="Incomplete">Incomplete</option>
                                    <option value="Running">Running</option>
                                </select>
                            </div>
                            <!-- <input class="form-control" type="char" id="formFileMultiple" multiple>-->
                        </div>
                        <br>
                        <!-- <input type="submit" value="submit" class="btn btn-primary"> -->
                        <button type="submit" class="btn btn-primary" style="margin-top:-10px; margin-left: 600px;" >Save</button>
                    </form>
                    <?php include('include/message.php'); ?>
                    <div class="row justify-content-md-center" style="color: #CD5C5C">
                        <?php 
                        if(mysqli_num_rows($goalResult)==0){
                            echo "<h3>Oops! sorry, there is no any goal titles...</h3>";
                        }else{  ?>

                            <table class="table" style="color: #00FFFF;">
                                <thead>
                                    <th>Goal Title</th>
                                    <th>Descriptions:</th>
                                    <th>Accomplish Date:</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php while($row=mysqli_fetch_assoc($goalResult)){ ?>
                                        <tr>
                                            <td><?php echo $row['title'];?></td>
                                            <td><?php echo $row['description'];?></td>
                                            <td><?php echo $row['accomplish_date'];?></td>
                                            <td><a href="#" onclick="deleteConfirmation(<?php echo $row['id'];?>);"><i class="fa-solid fa-trash"></i></a> | <a href="update.php?id=<?php echo $row['id'];?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/18e7e11ee0.js" crossorigin="anonymous"></script>
        <script src="js/bootbox.min.js"></script>
        <script>
            function deleteConfirmation(id){
                bootbox.confirm({
                    message: "Are you sure?",
                    buttons: {
                        confirm: {
                            label: 'Yes',
                            className: 'btn-success'
                        },
                        cancel: {
                            label: 'No',
                            className: 'btn-danger'
                        }
                    },
                    callback: function (result) {
                        if(result){
                            window.location = 'db/delete-goal.php?id='+id;
                        }
                    }
                });
            }
            
        </script>
       
    </body>
</html>
