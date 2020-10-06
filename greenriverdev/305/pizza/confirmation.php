<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">

    <title>Poppa's Pizza</title>
    <link rel="icon" type="image/png" href="images/pizza.ico">
</head>
<body>
    <div class="container" id="main">

        <!-- jumbotron start -->
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Poppa's Pizza</h1>
            <p class="lead">Serving the Green River community since 1970!</p>
        </div>

        <h1>Thank you for your order <?php echo $_GET['fname'];?></h1>

        <pre>
        <?php
            var_dump($_GET);
        ?>
        </pre>
    </div>
</body>
</html>