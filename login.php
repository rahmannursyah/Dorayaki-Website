<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body class="text-center">
    <form class="form-signin" action="./controllers/loginController.php" method="post">
        <!-- signin error -->

        <?php 
            
            if(isset($_GET['error'])){
        ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo "Wrong Paswword"?>
                </div>
        <?php
              
            }else if(isset($_GET['succ'])){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo "<strong> Success!</strong> Register Success!"?>
                </div>
                <?php
            }
        ?>
        
        <h1 class="h2 mb-4 font-weight-normal">Sign in</h1>
        <label for="inputUsername" class="sr-only">Email</label>
        <input type="text" id="inputUsername" class="form-control mb-1 mt-1" placeholder="Email" name="username" required="" autofocus="" value="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-1 mt-1" placeholder="Password" name="password" required="" value="">
        <div class="checkbox mb-2 mt-2">
            <label>
                <input type="checkbox" value="remember-me" name="remember"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Sign in</button>
        <span class="mt-2 d-inline-block">Doesn't have an account yet? Register <a href="./register.php">here</a></span>
        <p class="mt-5 mb-3 text-muted">© Copyrighted 2019 Bluejack</p>
        <p class="mt-5 mb-3 text-muted">Redesign with Dorayaki Store</p>
    </form>
</body>
</html>