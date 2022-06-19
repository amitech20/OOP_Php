<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../assets/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="all">
        <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="navbar-brand" href="#"><h2>PHP STUDENTS PORTAL</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item f-right">
                <a class="nav-link " href="login.php">Login</a>
            </li>
            </ul></div></nav>

        <form class="form-control w-50" method="POST" action="../action.php">
            <h1 class="form-group">Reset Password</h1>
            <hr>
            <div class="form-row flex justify-content-center">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="reset">Reset</button>
                </div>

                <div class="form-group">
                    <p>Go back to Login!: <br><a href="login.php">Login page</a></p>
                </div>
            </div>
            
      </form>
   
    
</div>
    </div>
    
</body>
</html>