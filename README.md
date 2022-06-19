# DESCRIPTION
You have been provided with drive link with some code skeleton here
It has the following
## MAIN FOLDER: UserAuthOOPMYSQL

### `index.php` 
  which is the landing page having links to register and sign in
### `dashboard.php` 
  is the landing page after successful login
### `action.php`
  this innitialises the all the classes for you, note that none of this is functional yet and you will need to implement all the classes initialised for this to function properly
## DIR(FOLDER): forms>
  - #### `login.php` 
      which is the login page whose form actions is action.php
  - #### `register.php`
      which is register page whose form action is action.php
  - #### `resetpassword.php`
     which is the reset password page whose form action is action
## DIR(FOLDER) `classes` >
  - #### `Dbh.php` 
    This is the database class which handles connection to the database
  - #### `Route.php` 
    this file contains a class called formController which routes the various user interaction to the targetted classes and methods
  - #### `UserAuth.php` 
    This is the main logic unit of the application

# TASK:
 With the provided code skeleton inside userAuthMySQL folder, your task is to complete the following files
- ## `database`
  You are going the work on the database your had in the previous task called zuriphp which contains the following columns
   - ` Id`
   - `Full_names`
   - `Country`
   - `Email`,
   - `Gender`
  - `password`
 - import the sql file called users.sql to have some initial users in your database for testin `this is incase you had not done that before`

- ## Task `1` Database Connection
  Inside the classes folder and the `Dbh` file, 
  - create a class called `Dbh.php` with the following properties
    - `hostname`
    - `username`
    - `password`
    - `dbname`

    All of the above should have initial values set which are the default credentials of your database for [hostname, username, password and databasename respectively]
  - create a method called `connect()` which is set to protected visibilty and creates a connection to the database  and returns the connection
- ## Task `2` UserAuthentication Logic Class
  Inside the classes Folder In the `UserAuth.php` file
  - import the `Dbh` class
  - Create a classes called UserAuth which has the following
    - Extends (Inherits from) the Dbh class
    - Contains the following properties by name
      - db [set to Private]
    - Has a contructor as such
      ```
      public function __construct(){
        $this->db = new Dbh();
      }
      ```
    - Has the following methods
      - `validatePassword($password, $confirmPassword)`: Takes in the two passwords passed from the form and checks if they are equal(If equal return true) else returns false

      - `checkEmailExist($email)`
        Checks if User Exist by email, this will be user later by the register method, returns true if user with email=$email exist, else returns false

      - `register($fullname, $email, $password, $confirmPassword, $country, $gender)` : Register the User based on the `fullnames, email, country, gender and password`. 

      - `login($email, $password)`
        Takes in the email and passwords and logs the user in if credentials are correct, if so, set Session to `email ` and redirect the user to the dashboard else it redirects the user back to the login page

      - `updateUser($username, $password)` Updates User Password (This will first called the checkEmailExist method). if useremailExist then update the password and redirect to the login page, else redirect to password reset page

      - `deleteUser($email)` Deletes A User By the email.this method deletes the user with the given email from the button on the front-end (the button name is ‘email’ you can access it within the post array when the button is pressed

      - `getAllUsers()` `ALREADY IMPLEMENTED` gets and displays all users from the database, paste the following code 

      ```
      public function getAllUsers(){
        $conn = $this->db->connect();
        $sql = "SELECT * FROM Students";
        $result = $conn->query($sql);
        echo"<html>
        <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
        </head>
        <body>
        <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
        <table class='table table-bordered' border='0.5' style='width: 80%; background-color: smoke; border-style: none'; >
        <tr style='height: 40px'>
            <thead class='thead-dark'> <th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th>
        </thead></tr>";
        if($result->num_rows > 0){
            while($data = mysqli_fetch_assoc($result)){
                //show data
                echo "<tr style='height: 20px'>".
                    "<td style='width: 50px; background: gray'>" . $data['id'] . "</td>
                    <td style='width: 150px'>" . $data['full_names'] .
                    "</td> <td style='width: 150px'>" . $data['email'] .
                    "</td> <td style='width: 150px'>" . $data['gender'] . 
                    "</td> <td style='width: 150px'>" . $data['country'] . 
                    "</td>
                    <td style='width: 150px'> 
                    <form action='action.php' method='post'>
                    <input type='hidden' name='id'" .
                     "value=" . $data['id'] . ">".
                    "<button class='btn btn-danger' type='submit', name='delete'> DELETE </button> </form> </td>".
                    "</tr>";
            }
            echo "</table></table></center></body></html>";
        }
    }
      ```

      NOTE: this method might look a litle messy becuase it has some html code embedded in, its just for understanding purposes, also take a good look at it as it might help you in the others
      ```


- ## Task `3` Router Logic File
  Inside the classes folder the the `Route.php` file
  - create a class called `FormController` which extends the `UserAuth` class with the following properties
    -  `fullname;`
    -  `email`;
    -  `password;`
    -  `confirmPassword;`
    -  `country;`
    -  `gender;`

  - create a constructor that instantiates a new Dbh class (same a constructor created earlier)

  - create a method called handle form and paste in the following code

  ```
  switch(true) {
            case isset($_POST['register']):
                //unpack all data for registering
                $this->fullname = $_POST['fullnames'];
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->confirmPassword = $_POST['confirmPassword'];
                $this->gender = $_POST['gender'];
                $this->country = $_POST['country'];
                $this->register($this->fullname, $this->email, $this->password, $this->confirmPassword, $this->country, $this->gender);
                break;
            case isset($_POST['login']):
                //unpack all data for login
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->login($this->email, $this->password);
                break;
            case isset($_POST['logout']):
                //unpack all data for logout
                $this->email = $_POST['email'];
                $this->logout($this->email);
                break;
            case isset($_POST['delete']):
                //unpack all data for deleting
                $this->email = $_POST['email'];
                $this->deleteUser($this->email);
                break;
            case isset($_POST['reset']):
                //unpack all data for updating password
                $this->email = $_POST['email'];
                $this->password = $_POST['password'];
                $this->updateUser($this->email, $this->password);
                break;
            case isset($_POST['all']):
                //unpack all data for getting all users
                $this->getAllUsers();
                break;
            default:
                echo 'No form was submitted';
                break;
        }
    }
  ```

  This simplifies the routing for you so that you concentrate on the other tasks above,
  Take Your time, read the task over and over till your understand it before attempting, you are free to create meets to discus this.

  good luck
  


