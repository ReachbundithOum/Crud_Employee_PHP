<?php
session_start();
include '../backend/database.php';
include '../html/header.php';

if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = md5($password);

    if (!empty($username) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['username'] = $username;
            header('location: ../index.php');
        } else {
            echo "Error: The username & password is incorrect!" . mysqli_error($conn);
        }
    } else {
        echo 'Error. All field are required!';
    }
}


?>

<div class="container col-4 mt-4">
    <div class="card p-3">
        <form action="" method="post">
            <h3 class="card-header text-center">Crud Employee</h3>
                <div class="card-body">
                    <div class="form-group">
                        <input  type="text" 
                                name="username" 
                                id="Username"
                                placeholder="Please enter your username!"
                                class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <input  type="password" 
                                name="password" 
                                id="Password"
                                placeholder="Please enter your password!"
                                class="form-control" required />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block"
                            name="loginBtn">Login
                        </button>
                    </div>
                    <div class="form-group">
                        <span class="float-right">
                            Dont have an account yet? <a href="../auth/register.php" class="text-decoration-none">Register Here &#128072;</a>
                        </span>
                    </div>
                </div>
            </form>
        </div>

</div>