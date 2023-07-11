<?php
    session_start();
    include ('../backend/database.php');
    include ('../html/header.php');
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)) {
            $sql = "INSERT INTO users(username,email,password) 
            VALUES('$username','$email','" . md5($password) ."')";
            if(mysqli_query($conn,$sql)) {
                $_SESSION['username'] = $username;
                header('location: ../auth/login.php');
            } else {
                echo 'Error' . mysqli_error($conn);
            }
        } 
    }
?>
    <div class="container col-4 mt-4">
        <div class="card p-3">
            <form action="" method="post">
                <h3 class="card-header text-center">Register Employee</h3>
                <div class="card-body">
                    <div class="form-group">
                        <input  type="text" 
                                name="username" 
                                id="Username"
                                placeholder="Please enter your username!"
                                class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <input  type="email" 
                                name="email" 
                                id="Email"
                                placeholder="Please enter your email!"
                                class="form-control" required />
                    </div>
                    <div class="form-group">
                        <input  type="password" 
                                name="password" 
                                id="Password"
                                placeholder="Please enter your password!"
                                class="form-control" required />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-info" name="register">Register</button>
                    </div>
                    <div class="form-group">
                        <span class="float-right">
                            Already have an account ? <a href="./login.php">Login Here  &#128072;</a>
                        </span>
                    </a>
                    </div>
                </div>
            </form>
        </div>
    </div>




</body>
</html>