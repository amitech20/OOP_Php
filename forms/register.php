<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
</head>
    <body>
        <div class="all">
            <!-- Image and text -->
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="../index.php"><h2>PHP STUDENTS PORTAL</h2></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item f-right">
                    <a class="nav-link " href="login.php">Login</a>
                </li>
    </div>
    </nav>

        <form class="form-control w-50" method="POST" action="../action.php">
            <h1 class="form-group">Register</h1>
            <hr>
            <div class="form-row flex justify-content-center">
                <div class="form-group">
                    <label for="fullnames">Full Names</label>
                    <input type="text" class="form-control" id="fullnames" placeholder="Full Names" name="fullnames" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="country">Country</label>
                    <select type="text" class="form-control" id="country" name="country" placeholder="Country" required>
                        <option >Select Country</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Kenya">Kenya</option>
                        <option value="South Africa">South Africa</option>
                        <option value="Congo">Congo</option>
                        <option value="Morrocco">Morrocco</option>
                        <option value="Central Africa">Central Africa</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select type="text" class="form-control" id="gender" name="gender" required>
                        <option >Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        </select>
                </div>

                <div class="row">
                     <div class="form-group col-md-5">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="cpassword">Confirm Password</label>
                    <input type="password" class="form-control" id="cpassword" placeholder="Password" name="confirmPassword" required>
                </div>
                </div>
               
                <div class="form-group">
        1            <button type="submit" class="btn btn-primary" name="register">Register</button>
                    <a href="resetpassword.php" style="margin-left: 10%">Reset Password</a>
                </div>
            </div>
            
      </form>
   
    
`   </div>
</div>
</html>