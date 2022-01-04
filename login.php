<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
<?php include 'nav & footer/adminNav.php'?>

<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="box">
                <h3 class="feature-title">Doctor</h3>
<!--                <img src="images/maleplaceholder.png" class=" center">-->
                <form method="post">
                    <div class="loginInfo">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="UN" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Password" name="PW" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-secondary btn-block" value="Login" name="logDoc">
                </form>
                <?php
                if(isset($_POST["logDoc"]))
                {
                    $un = $_POST["UN"];
                    $pw = $_POST["PW"];
                    if($un == "admin" && $pw == "1234")
                    {
                        $_SESSION["un"] = $un;
                        header("location:index.php");

                    }
                    else
                    {
                        echo "Incorrect user name or password";
                    }

                }
                ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="box">
                <h3 class="feature-title">Patient</h3>
<!--                <img src="images/maleplaceholder.png" class=" center">-->
                <form method="post">
                    <div class="loginInfo">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Password" name="">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-secondary btn-block" value="Login" name="">
                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'nav & footer/footer.php' ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

</html>