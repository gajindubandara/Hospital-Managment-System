<!DOCTYPE html>

<html lang="en">

<head>

    <title>Bootstrap Tutorial Sample Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>
<?php include 'nav & footer/adminNav.html'?>

<header>

</header>

<div class="container features">
    <div class="row center">
        <div class="col-lg-4 col-md-4 col-sm-6">
            <h3 class="feature-title">Reserve a number!</h3>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" name="">
            </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Patient No" name="">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" placeholder="Contact Number" name="">
          </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email Address" name="email">
            </div>
          <div class="form-group">
            <input type="date" class="form-control"  name="">
          </div>
<!--            <div class="form-group">-->
<!--                <textarea class="form-control" rows="4"></textarea>-->
<!--            </div>-->
            <input type="submit" class="btn btn-secondary btn-block" value="Submit" name="">
        </div>
    </div>
</div>


<?php include  'nav & footer/footer.html'?>
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