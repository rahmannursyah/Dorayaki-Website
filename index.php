<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/homepage.css">
</head>
<body>
    <?php include './layouts/header.php'?>

    <div class="content-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Welcome to Dorayaki Store</h1>
        <p class="lead">
Let's eat Dorayaki with good taste and affordable prices!.</p>
    </div>

    <div style="text-align: center">
        <button style="text-align:center" onclick="gotoProduct()" class="button btn-danger">Show Product!</button>
    </div>
    <script>
        
        function gotoProduct(){
            window.location.href="./products.php";
        }

    </script>
    
    <div class="container">
        <?php include './layouts/footer.php'?>
    </div>
</body>
</html>