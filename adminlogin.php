<?php
include("config.php");
session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body class="bg">
<?php include 'nav & footer/loginNavA&D.php'; ?>
<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="box">
                <h3 class="feature-title">Admin Login</h3>
                <!--                <img src="images/maleplaceholder.png" class=" center">-->
                <form method="post">
                    <div class="loginInfo">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="A_UN" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="A_PW" required>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Login" name="logAdmin">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST["logAdmin"])) {
                        try {
                            $conn = new PDO($db, $un, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $query = $query = "SELECT `username` FROM `D-passwords` WHERE  `password`=? and `username`=? ";
                            $st = $conn->prepare($query);

                            $st->bindValue(1, $_POST["A_PW"], PDO::PARAM_STR);
                            $st->bindValue(2, $_POST["A_UN"], PDO::PARAM_STR);
                            $st->execute();
                            $result = $st->fetch();
                            if ($result[0] == $_POST["A_UN"]) {
                                $_SESSION["a_un"] = $result[0];
                                header("location:admin.php");
                            } else {
                                echo '<script>alert("Incorrect user name or password")</script>';
                            }

                        } catch (PDOException $th) {
                            echo $th->getMessage();
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="container features ">
    <div class="row center">
        <div class=" col-md-12">
            <div class="aboutus">
                <h1>About Us</h1>
                <p>
                    Why do we use it?
                    It is a long established fact that a reader will be distracted by the readab
                    le content of a page when looking at its layout. The point of using Lorem
                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed t
                    o using 'Content here, content here', making it look like readable English. Many
                    desktop publishing packages and web page editors now use Lorem Ipsum as their de
                    fault model text, and a search for 'lorem ipsum' will uncover many web sites still
                    in their infancy. Various versions have evolved over the years, sometimes by accide
                    nt, sometimes on purpose (injected humour and the like).
                </p>

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