<?php
require("logincheck.php");
?>
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
<?php include 'nav & footer/adminNav.php'?>

<header>

</header>

<div class="container colCard ">
  <p>Details</p>
  <button class="collapsible">10th December 2021</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna
      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
      ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <ul>

      <li>hello</li>
      <li>hello</li>
      <li>hello</li>
      <input type="submit" class="btn btn-secondary btn-block" value="Edit" name="">
      <input type="submit" class="btn btn-secondary btn-block" value="Delete" name="">
    </ul>
  </div>
  <button class="collapsible">10th November 2021</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna
      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
      ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <ul>

      <li>hello</li>
      <li>hello</li>
      <li>hello</li>
      <input type="submit" class="btn btn-secondary btn-block" value="Edit" name="">
      <input type="submit" class="btn btn-secondary btn-block" value="Delete" name="">
    </ul>
  </div>
  <button class="collapsible">10th October 2021</button>
  <div class="content">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna
      aliqua. Ut enim ad minim veniam, quis nostrud exercitation
      ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    <input type="submit" class="btn btn-secondary btn-block" value="Edit" name="">
    <input type="submit" class="btn btn-secondary btn-block" value="Delete" name="">
  </div>
</div>
<script src="js/collapsibleCards.js"></script>

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