<?php
include_once 'Dbh.php';
session_start();

class UserAuth extends Dbh{
    private static $db;

    public function __construct(){
        $this->db = new Dbh();

    }

    public function validatePassword($password,$confirmPassword) 
    {
        $this->password = $password;
        $this->confirmpassword = $confirmPassword;

        if ($this->password == $this->confirmPassword) 
            {
                return TRUE;
            }
        
        else
             {
                return FALSE;
            }
            
    }


    public function checkEmailExist($email)
    {
        $conn = $this->db->connect();
        $this->email = $email;
        $sql = "SELECT * FROM Students WHERE email='$this->email'";
        $result = $this->db->connect()->query($sql);

        if($result->num_rows > 0)
            {
                return TRUE;
            }

        else 
            {
                return FALSE;
            }

    }


    public function checkPassword($password)
    {
        $this->password = $password;
        $conn = $this->db->connect();
        $sql = "SELECT * FROM Students WHERE password = '$this->password'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0)
            {
                return TRUE;
            } 
        else 
            {
            return FALSE;
            }
    }



    public function register($fullname, $email, $password, $confirmPassword, $country, $gender)
    {
        $conn = $this->db->connect();

        if($this->validatePassword($password, $confirmPassword))
            {
                if (($this->checkEmailExist($email)) == FALSE) 
                    {
                        $sql = "INSERT INTO Students (`full_names`, `email`, `password`, `country`, `gender`) VALUES ('$fullname','$email', '$password', '$country', '$gender')";
                        if($conn->query($sql))
                            {
                                echo "<script>alert('Registration was successful');
                                         window.location = './forms/login.php'; </script>";
                            } 
                    }
                else   
                    {
                        echo "<script>alert('Email already Exist');
                        window.location = './forms/register.php'; </script>";
                    }
            }
            
        else 
            {
                echo "<script>alert('Password does not match');
                        window.location = './forms/register.php'; </script>". $conn->error;
            }

        
    }

    public function login($email, $password){
        $conn = $this->db->connect();

        if ($this->checkEmailExist($email) == TRUE) 
        {
            if ($this->checkPassword($password) == TRUE) 
                {
                    $_SESSION['email'] = $email;
                    $this->email = $_SESSION['email'];
                    echo "<script>alert('You logged in successfully');
                        window.location = './dashboard.php'; </script>";
                }

            else 
                {
                    echo "<script>alert('Either your Email or password is wrong');
                        window.location = './forms/login.php'; </script>";
                }
        }
        else 
        {
            echo "<script>alert('Either your Email or password is wrong');
            window.location = './forms/login.php'; </script>";
        }
    }



    

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
            while($data = $result->fetch_assoc()){
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

   

    public function updateUser($email, $password)
    {
        $conn = $this->db->connect();
        $result = $this->checkEmailExist($email);

        if ($result) 
            {
                $sql = "UPDATE Students SET password = '$password' WHERE email = '$email'";
                    if($conn->query($sql) === TRUE)
                        {
                                echo "<script>alert('Password has been changed');
                                window.location = 'forms/login.php'; </script>";
                        } 
        
            }
        else 
            {
                    echo "<script>alert('Email does not exist');
                    window.location = 'forms/resetpassword.php'; </script>";
        
            }
    }



    public function deleteUser($id){
        $conn = $this->db->connect();
        $sql_one = "SELECT * FROM Students WHERE id = '$id'";
        $result = $conn->query($sql_one);
            if($result->num_rows > 0 )
                {
                        $sql_two = "DELETE FROM Students WHERE id = '$id'";
                    if($conn->query($sql_two) == TRUE)
                        {
                            echo "<script>alert('Deleted the record');
                            window.location = 'dashboard.php'; </script>";  
                        } 
                    else 
                        {
                            echo "<script>alert('Could not delete this record');
                            window.location = 'dashboard.php'; </script>";  
                            // header("refresh:0.5; url=action.php?all=?message=Error");
                        }
                }
    }

    

    public function logout($email)
    {
        $this->email = $_SESSION['email'];
        if ($this->email) 
            {
                session_unset();
                session_destroy();
                header('Location: ./forms/login.php');
            }
        
    }



    // public function getUser($email){
    //     $conn = $this->db->connect();
    //     session_start();
    //     $this->email = $_SESSION['email']; 
    //     $sql = "SELECT * FROM users WHERE email = '$this->email'";
    //     $result = $conn->query($sql);
    //     if($result->num_rows > 0){
    //         return $result->fetch_assoc();
    //     } else {
    //         return false;
    //     }
    // }



    // public function confirmPasswordMatch($password, $confirmPassword){
    //     if($password === $confirmPassword){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    // public function getUserByUsername($username){
    //     $conn = $this->db->connect();
    //     $sql = "SELECT * FROM students WHERE username = '$username'";
    //     $result = $conn->query($sql);
    //     if($result->num_rows > 0){
    //         return $result->fetch_assoc();
    //     } else {
    //         return false;
    //     }
    // }
}
